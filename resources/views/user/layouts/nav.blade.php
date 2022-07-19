<nav class="navbar navbar-expand-lg navbar-light shadow-navbar d-block">
    <div class="row">
        <div class="row nav-container">
            <div class="col-2 col-lg-1">
                <a class="navbar-brand" href="https://greff.co.jp">
                    <div class="nav-logo fs-3">LOGO</div>
                </a>
            </div>

            <div class="col-8 col-lg-11">
                <div class="row d-flex flex-row-reverse flex-lg-row pe-lg-5 nav-relative-mobile">
                    <div class="col-3 pc-display d-none d-lg-block ">
                        <div class="nav-select-max-10">「1日単位で」「すぐに」「簡単に」働ける。</div>
                    </div>
                    <div class="col-4 col-lg-3 ">
                        <div class="nav-icon row">
                            <div class="col-6 nav-icon1 w-50">
                                <div class="nav-star-image position-relative">
                                    <div class=" count-star position-absolute">
                                        <div class="text-star">4</div>
                                    </div>
                                </div>
                                <div class="text1">
                                    キープリスト
                                </div>
                            </div>
                            <div class="col-6 d-none d-lg-block nav-icon2 border-start border-end w-50">
                                <div class="nav-clock-image position-relative">
                                    <div class=" count-star position-absolute">
                                        <div class="text-star">4</div>
                                    </div>
                                </div>
                                <div class="text2">
                                    閲覧履歴
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('worker'))

                        <div class="col-3 d-none d-lg-block ">
                            <div class="nav-right-text">
                                <div class="text pt-2"><a class="text-decoration-none text-light" href="{{ url("/userMyPageInfomation") }}">会員登録(無料)</a></div>
                            </div>
                        </div>
                    @else
                    <div class="col-3 d-none d-lg-block ">
                        <div class="nav-right-text">
                            <div class="text pt-2"><a class="text-decoration-none text-light" href="{{ route('formRegisterWorker1') }}">会員登録(無料)</a></div>
                        </div>
                    </div>


                    <div class="col-4 col-lg-3 nav-login-mobile">
                        <div class=" nav-right-text2 d-flex position-relative" data-bs-toggle="modal" data-bs-target="#modal_login_worker">
                            <div class="text2">
                                ログインする
                            </div>
                            <div class="image_log_in position-absolute" style="left:30%;top:10%">
                                <img class="img-login-mobile" src="{{asset("css/client/detail/img/log-in.png")}}" alt="">
                            </div>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class=" col-2 flex-direction-column justify-content-center mt-3 d-lg-none">
                <button class="navbar-toggler mx-0 px-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>

        <div class="collapse navbar-collapse header-menu" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link text-menu text-center text-light" aria-current="page" href="#">はじめての方へ</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-menu text-center text-light" href="#">はじめての方へ</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-menu text-center text-light" href="#">ヘルプ</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-menu text-center text-light" href="#">お問合せ</a>
                </li>
                <li class="nav-item d-sm-none">
                    <a class="nav-link text-menu text-center text-light" href="{{route('worker.logout')}}">ログアウト</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


