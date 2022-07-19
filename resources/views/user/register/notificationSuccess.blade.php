@extends('user.layouts.app')
@section('title', '日払い求人サイト｜Greff（グレフ）')
@section('linkcss')
    <link rel="stylesheet" href="{{ asset('css/client/register2.css') }}">
@endsection
@section('content')
    <style>
        #menu_footer_2,#menu_footer_1,#register{
            display: none !important;
        }
        .nav-right-text2{
            background: transparent url({{asset("images/client/log-in.png")}}) 27% 50% no-repeat padding-box;
        }
    </style>
    <div class="container register-set-password-content register-content">
        <div class="register-block">
            <div class="register-title"> 会員登録完了 </div>
        </div>
        <div class="register-area">
            <div class="register-title">
                山田 太郎様、登録いただきありがとうございます。 <br>
                登録メールアドレスへ確認のメールをお送りしました。 <br>
                万が一メールが届かない場合は、<a href="">マイページ</a>からメールアドレスが正しいかご確認ください。
            </div>
            <div class="action-submit">
                <button class="button-submit btn-submit-step-2 border-0 text-decoration-none">
                    さっそくお仕事を探す！
                    <span> ▶ </span>
                </button>
            </div>
        </div>
    </div>
@endsection
@push('scripts-custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $("#text2-login").text("マイページ");
        });
    </script>
@endpush
