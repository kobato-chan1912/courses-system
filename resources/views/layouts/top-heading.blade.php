<header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
        <i class='uil uil-bars'></i>
    </button>
    <button id="collapse_menu" class="collapse_menu">
        <i class="uil uil-bars collapse_menu--icon "></i>
        <span class="collapse_menu--label"></span>
    </button>
    <div class="main_logo" id="logo">
        <a href="index.html"><img src="images/logo.svg" alt=""></a>
        <a href="index.html"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
    </div>
    <div class="search120">
        <div class="ui search">
            <div class="ui left icon input swdh10">
                <input class="prompt srch10" type="text" placeholder="Search for Tuts Videos, Tutors, Tests and more..">
                <i class='uil uil-search-alt icon icon1'></i>
            </div>
        </div>
    </div>
    <div class="header_right">
        <ul>
            @if(session("LoggedUser"))
            @else
            <li>
                <a href="{{route('login')}}" class="upload_btn">Đăng ký</a>
            </li>
                <li>
                    <a href="{{route('login')}}" class="upload_btn">Đăng nhập</a>
                </li>
            @endif

            @if(session("LoggedUser"))
            <li class="ui dropdown">
                <a href="#" class="opts_account">
                    <img src="images/hd_dp.jpg" alt="">
                </a>
                <div class="menu dropdown_account">
                    <div class="channel_my">
                        <div class="profile_link">
                            <img src="images/hd_dp.jpg" alt="">
                            <div class="pd_content">
                                <div class="rhte85">
                                    <h6>{{session("LoggedUser")["name"]}}</h6>
                                    @if(session("LoggedUser")["verify_id"]==1)
                                    <div class="mef78" title="Verify">
                                        <i class='uil uil-check-circle'></i>
                                    </div>
                                    @else
                                    @endif
                                </div>
                                <span>{{session("LoggedUser")["email"]}}</span>
                            </div>
                        </div>
                        <a href="my_instructor_profile_view.html" class="dp_link_12">Trang cá nhân</a>
                    </div>
                    <div class="night_mode_switch__btn">
                        <a href="#" id="night-mode" class="btn-night-mode">
                            <i class="uil uil-moon"></i> Chế độ tối
                            <span class="btn-night-mode-switch">
									<span class="uk-switch-button"></span>
								</span>
                        </a>
                    </div>
                    <a href="instructor_dashboard.html" class="item channel_item">Khoá học đã đăng ký</a>
{{--                    <a href="membership.html" class="item channel_item">Paid Memberships</a>--}}
{{--                    <a href="setting.html" class="item channel_item">Setting</a>--}}
{{--                    <a href="help.html" class="item channel_item">Help</a>--}}
{{--                    <a href="feedback.html" class="item channel_item">Send Feedback</a>--}}
                    <a href="{{route('logout')}}" class="item channel_item">Đăng xuất</a>
                </div>
            </li>
                @endif
        </ul>
    </div>
</header>
