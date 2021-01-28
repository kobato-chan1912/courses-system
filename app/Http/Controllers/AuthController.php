<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Psy\Output\PassthruPager;


class AuthController extends Controller
{
    //
    public function authorization (Request $request){

        if (($request->session()->get("LoggedUser")["verify_id"]) == 1) //verified.
        {
            return redirect()->home();
        }
        else {

            $_token = str::random(32);
            User::where("id", $request->session()->get("LoggedUser")["id"])
                ->update(["token" => $_token]);

            // send mail here
            $details = [
                'url' => "http://localhost:8888/courses/public/confirm?token=$_token"
            ];
            $userEmail = $request->session()->get("LoggedUser")["email"];
            \Mail::to($userEmail)->send(new \App\Mail\MyTestMail($details)); //depend on.
            // return view authorize.
            return view('Auth.authorize');
        }
    }
    public function confirmAuthorize(Request $request){
        $userToken = User::select('token')->where('id',$request->session()->get("LoggedUser")["id"])->get()->first()["token"];
        if ($userToken == $request->token){
            // change verified_id to 1 and clear form in database.
            User::where("id", $request->session()->get("LoggedUser")["id"])
                ->update(["token" => "", "verify_id" => 1]); //update verify id and remove token.
            session("LoggedUser")["verify_id"] = 1; //update the current session.
            return view("Auth.authorizeSucess");
        }
        else {
            return view("Auth.authorizeFailed");
        }
    }

    public function GetLogin(Request $request){
        if ($request->session()->has("LoggedUser")) {
            return redirect(url()->previous());
        }
        else {
            $request->session()->put("previous", url()->previous());
            $request->session()->put("current", url()->current());
            return view('Auth.login');
        }
    }

    //
    public function Login(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if ($user){
            if (Hash::check($request->password, $user->password))
            {
                $request->session()->put('LoggedUser', $user); // Logged in.
                if (strpos(session("previous"), "register") !== false){

                }
                if (session("previous") != (session("current"))) {
                    if (strpos(session("previous"), "register") !== false){ //found register.
                        return redirect()->route('home');
                    }
                    else {
                        return redirect(session('previous'));
                    }
                }
                else {
                    return redirect()->route('home');
                }
            }
            else {
                return view('Auth.login', ["incorrect" => "Password is wrong."]);
            }
        }
        else {
            return view('Auth.login', ["message" => "Account not found."]);
        }
    }
    public function logout(Request $request){
        $request->session()->forget("LoggedUser");
        if ((url()->current()) == (url()->previous())){
            return redirect()->route('home');
        }
        else {
            return redirect(url()->previous());
        }
    }

    public function getRegister(Request $request){
        if ($request->session()->has("LoggedUser")) {
            return redirect(url()->previous());
        }
        return view('Auth.register');
    }
    public function register(Request $request){
        // validate request.
        $request->validate([
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users,phone_number',
            'name' => 'required',
            'password' => 'required',
            're_password' => 'required'
        ]);
        if ($request->password == $request->re_password) {
            $user = new User();
            $user->name = $request->name;
            $user->phone_number = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->avatar_img = "img/avatar/default.jpg";
            $user->verify_id = 2;
            $user->roles_id = 2;
            $user->token = '';
            $query = $user->save();
            return redirect()->route('login')->with(["success" => "Your account has been created. Please Log in."]);


        }
        else {
            return view("Auth.register", ["message_password" => "Password does not match"]);
        }

    }

    public function getForgot(){
        return view("Auth.forgot");
    }
    public function resetPassword(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if ($user){
            $_token = $request->_token;
            $email = $request->email;
            User::where("email", $request->email)
                ->update(["token" => $_token]);

            // send mail here.
            $details = [
                'url' => "http://localhost:8888/courses/public/reset?token=$_token"
            ];
            \Mail::to($email)->send(new \App\Mail\MyTestMail($details));
            // return view authorize.
            return view('Auth.forgotAuthorize');

        }
        else {
            return view("Auth.forgot", ["message" => "Account not found!"]);
        }
    }
    public function getReset(Request $request){
        $user = User::where('token', '=', $request->token)->first();
        if ($user){ //user detected.
            $random_password = Str::random(6);

            User::where('token', '=', $request->token)
                ->update(["password" => Hash::make($random_password), "token" => ""]); //reset password.
            // update password and token.

            //reset in Auth.

            return view("Auth.resetPassword", ["password" => $random_password]);
        }
        else{
            return view("Auth.authorizeFailed");
        }
    }


}
