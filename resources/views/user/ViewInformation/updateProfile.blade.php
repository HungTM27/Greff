@extends('user.layouts.app')
@section('title', '日払い求人サイト｜Greff（グレフ）')
@section('linkcss')
    <link rel="stylesheet" href="{{ asset('css/client/updateProfile.css') }}">
@endsection
@section('content')
    <style>
        #register{
            display: none !important;
        }
        .nav-right-text2{
            background: transparent url({{asset("images/client/log-in.png")}}) 27% 50% no-repeat padding-box;
        }
        .img-login-mobile{
            display: none !important;
        }
        .row>.select-wrap, .row>.text-date, .row>.checkbox-wrap{
            width: auto;
        }
    </style>
    <div class="row col-md-12 d-flex justify-content-center">
        <div class="col-md-3 me-2" style="margin-top: 42px">
            {{--Left--}}
            <div class="row">
                <div class="my_page_avatar text-center col-lg-12">
                    @if($worker['avatar'] == "")
                        <img id='avatar' width="130px" height="130px" src="{{ asset('images/client/upload.png') }}" style="border-radius: 65px; border:1px solid #D3D3D3">
                    @else
                        <img id='avatar' width="130px" height="130px" src="{{ asset('storage/images/worker/'.$worker["avatar"]) }}" style="border-radius: 65px; border:1px solid #D3D3D3">
                    @endif
                </div>
                <div class="col-12 d-lg-block d-none">
                    <div class="row  pt-4 pb-4 border-bottom">
                        <div class="col-12 text-center">山田 太郎</div>
                        <div class="col-12 text-end pb-3"><a class="text-decoration-none text-dark" href="update_profile"><div class="border p-1 m-auto mt-3"  style="max-width:150px">ユーザー情報編集</div></a></div>
                    </div>
                </div>
            </div>
            <div class="row d-lg-block d-none">
                <div class="card p-0 mt-3 border-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex border-0">
                            <a href="" class="w-100 text-dark text-decoration-none">
                                <div class="">
                                    <i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2"  style="padding:2px 7px"></i>身分証明書アップロード </div>
                            </a>
                            <div class="">▶</div>
                        </li>
                        <li class="list-group-item d-flex border-0" >
                            <a href="" class="w-100 text-dark text-decoration-none">
                                <div class="w-100">資格証明書アップロード </div>
                            </a>
                            <div>▶</div>
                        </li>
                        <li class="list-group-item d-flex border-0" >
                            <a href="" class="w-100 text-dark text-decoration-none">
                                <div class="w-100">
                                    <i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2"  style="padding:2px 7px"></i>給与振込口座変更 </div>
                            </a>
                            <div>▶</div>
                        </li>
                        <li class="list-group-item d-flex border-0" >
                            <a href="" class="w-100 text-dark text-decoration-none">
                                <div class="w-100">
                                    <i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2"  style="padding:2px 7px"></i> ログアウト
                                </div>
                            </a>
                            <div>▶</div>
                        </li>
                    </ul>
                </div>
            </div>
            {{--Endleft--}}
        </div>
        <div class="col-md-7">
            <div class="register-block">
                <div class="register-title"> ユーザー情報編集 </div>
            </div>
            <div class="register-form-wrap mx-0">
                @if(Session::get('success'))
                    <div class="col-md-12 alert text-info border-info">
                        <img src="{{ asset('images/client/tick.png')}}"> {{ Session::get('success') }}
                    </div>
                @endif
            </div>
            <div class="register-form-wrap">
                <form id="register-form" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-regis">
                        <div class="tr row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header">アイコン写真</div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap name-input">
                                <div class="row input-wrap pb-2 ps-2">
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdr-4" id="imgPreview">
                                        @if($worker['avatar'] == "")
                                            <img id='avatar' width="130px" height="130px" src="{{ asset('images/client/upload.png') }}" style="border-radius: 65px; border:1px solid #D3D3D3">
                                        @else
                                            <img id='avatar' width="130px" height="130px" src="{{ asset('storage/images/worker/'.$worker["avatar"]) }}" style="border-radius: 65px; border:1px solid #D3D3D3">
                                        @endif
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdl-4 pt-5">
                                        <input class="form-control form-control-sm" type="file" hidden="true" id="fileToUpload" name="avatar" />
                                        <div class="border border-gray-200 rounded shadow-sm bg-body d-flex justify-content-center p-2" stype="button" id="btn-uploadimg" onclick="$('#fileToUpload').click()"><span><img src="{{ asset('images/client/camera.png') }}"> 画像をアップロード </span></div>
                                        <p class="error fw-lighter" for="email">@error('avatar') {{ $message }}@enderror</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> 氏名 </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap name-input">
                                <div class="row input-wrap">
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdr-4">
                                        <div class="text">姓</div>
                                        <input id="last_name" type="text" name="last_name" class="input-box form-control " placeholder="山田" value="{{ $worker['last_name'] }}">
                                        <p class="error fw-lighter" for="last_name">@error('last_name') {{ $message }}@enderror</p>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdl-4">
                                        <div class="text">名</div>
                                        <input id="first_name" type="text" name="first_name" class="input-box form-control " placeholder="太郎" value="{{ $worker['first_name'] }}">
                                        <p class="error fw-lighter" for="first_name">@error('first_name') {{ $message }}@enderror</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> フリガナ </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap name-input">
                                <div class="row input-wrap">
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdr-4">
                                        <div class="text">セイ</div>
                                        <input id="furigana_first_name" type="text" name="furigana_first_name" class="input-box form-control " placeholder="ヤマダ" value="{{ $worker['furigana_first_name'] }}">
                                        <p class="error fw-lighter" for="furigana_first_name">@error('furigana_first_name') {{ $message }}@enderror</p>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdl-4">
                                        <div class="text">メイ</div>
                                        <input id="furigana_last_name" type="text" name="furigana_last_name" class="input-box form-control " placeholder="タロウ" value="{{ $worker['furigana_last_name'] }}">
                                        <p class="error fw-lighter" for="furigana_last_name">@error('furigana_last_name') {{ $message }}@enderror</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row oneline-row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> 性別 </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap">
                                <div class="row input-checkbox-wrap">
                                    <label class="checkbox-wrap">男性
                                        <input type="radio" name="gender" value="1" @if($worker['gender'] == 1) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="checkbox-wrap">女性
                                        <input type="radio" name="gender" value="0" @if($worker['gender'] == 0) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="tr row oneline-row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> 生年月日 </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap">
                                <div class="row input-date-wrap">
                                    <div class="select-wrap px-0">
                                        <select id="birth_year" name="birth_year" class="date-selector year-select responsive-birthday form-control">
                                            <option value="">選択</option>
                                            @for($i=date('Y'); $i >= 1901; $i--)
                                            <option value="{{ $i }}" @if($worker['birth_year'] == $i) selected @endif> {{ $i }} </option>
                                            @endfor
                                        </select>
                                        <div class="select-arrow birth_year">▼</div>
                                    </div>
                                    <div class="text-date px-0">年</div>
                                    <div class="select-wrap px-0">
                                        <select id="birth_month" name="birth_month" class="date-selector month-select responsive-birthday form-control">
                                            <option value="">選択</option>
                                            @for($i=1; $i <= 12; $i++)
                                                <option value="{{ $i }}" @if($worker['birth_month'] == $i) selected @endif>  {{ $i }} </option>
                                            @endfor
                                        </select>
                                        <div class="select-arrow birth_month">▼</div>
                                    </div>
                                    <div class="text-date px-0">月</div>
                                    <div class="select-wrap px-0">
                                        <select id="birth_day" name="birth_day" class="day-select responsive-birthday form-control">
                                            <option value="">選択</option>
                                        </select>
                                        <div class="select-arrow birth_day">▼</div>
                                        <input type="text" value="{{ $worker['birth_day'] }}" hidden="true" id="birth_day2">
                                    </div>
                                    <div class="text-date px-0">日</div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row oneline-row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> 電話番号 </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap text-input">
                                <div class="row input-wrap">
                                    <div class="col-xl-12">
                                        <input type="text" name="phone" class="input-box phone-box form-control  convert-halfwidth" placeholder="09012345678(半角)" value="{{ $worker['phone'] }}">
                                        <p class="error fw-lighter" for="phone">@error('phone') {{ $message }}@enderror</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row multiline-row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> メールアドレス </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap text-input">
                                <div class="row input-wrap">
                                    <div class="col-xl-12">
                                        <input id="email" type="email" name="email" class="col-xl-12 input-box phone-box form-control " placeholder="greff@example.jp" value="{{ $worker['email'] }}">
                                        <p class="error fw-lighter" for="email">@error('email') {{ $message }}@enderror</p>
                                    </div>
                                    <div class="col-xl-12 text-caption mb-2">
                                        *メールの受信制限をされている方は、greff.jpからの受信を許可してください。<br>
                                        *入力間違いが多くなっておりますので、ご注意ください。
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row oneline-row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> パスワード </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap text-input">
                                <div class="row input-wrap">
                                    <div class="col-xl-2">
                                        <b class="fs-4 fw-bold"> ........ </b>
                                        <input type="password" name="password" class="border-0" value="{{ $worker['password'] }}" hidden="true" id="password">
                                    </div>
                                    <div class="col-xl-8 text-caption pt-2">
                                        ※セキュリティのためパスワードは非表示となっています。
                                    </div>
                                    <div class="col-xl-2 pt-2">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                            变更
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row oneline-row not-required">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> 希望勤務地 </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap">
                                <div class="row input-date-wrap">
                                    <div class="select-wrap px-0">
                                        <select name="work_region" class="date-selector year-select responsive-birthday form-control">
                                            <option value=""> 選択 </option>
                                            @foreach($areas as $area)
                                                <option value="{{ $area['katakana_name'] }}" @if($worker['work_region'] == $area['katakana_name']) selected @endif> {{ $area['katakana_name'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">▼</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr row multiline-row">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                                <div class="row-header"> プッシュ通知 </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap name-input">
                                <div class="row input-wrap input-checkbox-wrap">
                                    <label class="checkbox-wrap checkbox-input mt-0"><b> 許可する </b>
                                        <input type="checkbox" name="push_notification" value="1" @if($worker['push_notification'] == 1) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <div class="col-xl-12 text-caption mt-0 ps-0">
                                        *新着求人やキャンペーンのお知らせがプッシュ通知にてすぐに届きます！
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="action-submit">
                        <button type="submit" class="button-submit btn-submit-step-2 border-0">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="background: #F5F9FE 0% 0% no-repeat padding-box; margin-top: 100px; left: 0px; width: 100%; height: 24px;"> </div>

    <!-- Modal -->
    <div class="modal fade custom-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body px-3">
                        <div class="py-3 fs-4 fw-bold"> Change password </div>
                        <form action="{{ route('changePassword') }}" method="post">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <td style="background-color: #F5F9FE">
                                        <div class="row-header"> Current password <span class="text-danger"> * </span></div>
                                    </td>
                                    <td>
                                        <input class="form-control" type="password" name="current_password" value="" id="current_password">
                                        <p class="error fw-lighter" for="current_password" id="error_current_password"> </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #F5F9FE">
                                        <div class="row-header"> New password <span class="text-danger"> * </span></div>
                                    </td>
                                    <td>
                                        <input class="form-control" type="password" name="new_password" value="" id="new_password">
                                        <div class="text-caption"> Please enter at least 6 characters for your password </div>
                                        <p class="error fw-lighter" for="new_password" id="error_new_password"> </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #F5F9FE">
                                        <div class="row-header"> Confirm new password <span class="text-danger"> * </span></div>
                                    </td>
                                    <td>
                                        <input class="form-control" type="password" name="cf_new_password" value="" id="cf_new_password">
                                        <p class="error fw-lighter" for="cf_new_password" id="error_cf_new_password"> </p>
                                    </td>
                                </tr>
                            </table>
                            <div class="action-submit mt-1 mb-3">
                                <button type="submit" class="button-submit btn-submit-step-2 border-0" id="update_password">
                                    UPDATE
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts-custom')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document ).ready(function() {
            $("#text2-login").text("マイページ");
        });

        fileToUpload.onchange = evt => {
            const [file] = fileToUpload.files;
            if (file) {
                avatar.src = URL.createObjectURL(file)
            }
            imgPreview.classList.remove("d-none");
        }
        $(document).ready(function () {
            $("#birth_year").on("change", function () {
                $("#birth_month").on("change", function () {
                    if($('#birth_year').val()%400 == 0 ||($('#birth_year').val()%4 == 0 && $('#birth_year').val()%100 != 0)) {
                        if ($('#birth_month').val() == '4' || $('#birth_month').val() == '6' || $('#birth_month').val() == '9' || $('#birth_month').val() == '11') {
                            $('#birth_day').find('option').remove();
                            $.each($('#birth_day'), function () {
                                for (var i = 1; i <= 30; i++) {
                                    var option = '<option value="' + i + '">' + i + '</option>';
                                    $('#birth_day').append(option);
                                }
                            });
                        } else if ($('#birth_month').val() == '1' || $('#birth_month').val() == '3' || $('#birth_month').val() == '5' || $('#birth_month').val() == '7' || $('#birth_month').val() == '8' || $('#birth_month').val() == '10' || $('#birth_month').val() == '12') {
                            $('#birth_day').find('option').remove();
                            $.each($('#birth_day'), function () {
                                for (var i = 1; i <= 31; i++) {
                                    var option = '<option value="' + i + '">' + i + '</option>';
                                    $('#birth_day').append(option);
                                }
                            });
                        } else if($('#birth_month').val() == '2'){
                            $('#birth_day').find('option').remove();
                            $.each($('#birth_day'), function () {
                                for (var i = 1; i <= 29; i++) {
                                    var option = '<option value="' + i + '">' + i + '</option>';
                                    $('#birth_day').append(option);
                                }
                            });
                        }
                    } else {
                        if ($('#birth_month').val() == '4' || $('#birth_month').val() == '6' || $('#birth_month').val() == '9' || $('#birth_month').val() == '11') {
                            $('#birth_day').find('option').remove();
                            $.each($('#birth_day'), function () {
                                for (var i = 1; i <= 30; i++) {
                                    var option = '<option value="' + i + '">' + i + '</option>';
                                    $('#birth_day').append(option);
                                }
                            });
                        } else if ($('#birth_month').val() == '1' || $('#birth_month').val() == '3' || $('#birth_month').val() == '5' || $('#birth_month').val() == '7' || $('#birth_month').val() == '8' || $('#birth_month').val() == '10' || $('#birth_month').val() == '12') {
                            $('#birth_day').find('option').remove();
                            $.each($('#birth_day'), function () {
                                for (var i = 1; i <= 31; i++) {
                                    var option = '<option value="' + i + '">' + i + '</option>';
                                    $('#birth_day').append(option);
                                }
                            });
                        } else if($('#birth_month').val() == '2'){
                            $('#birth_day').find('option').remove();
                            $.each($('#birth_day'), function () {
                                for (var i = 1; i <= 28; i++) {
                                    var option = '<option value="' + i + '">' + i + '</option>';
                                    $('#birth_day').append(option);
                                }
                            });
                        }
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#update_password').on('click', function () {
                $('#error_current_password').text('');
                $('#error_new_password').text('');
                $('#error_cf_new_password').text('');
                var current_password = $('#current_password').val();
                var new_password = $('#new_password').val();
                var cf_new_password = $('#cf_new_password').val();
                if(current_password == '') {
                    $('#error_current_password').text('必ず指定してください。');
                }
                if(new_password == '' ){
                    $('#error_new_password').text('必ず指定してください。');
                }
                if(cf_new_password == ''){
                    $('#error_cf_new_password').text('必ず指定してください。');
                }
                if(new_password == '' ){
                    $('#error_new_password').text('数字を指定してください。');
                }
            })
        });

    </script>
@endpush


