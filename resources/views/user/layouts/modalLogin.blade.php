<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <a href="css/client/loginworker/loginworker.css" ></a>
    <title>Document</title>
</head>
<body>
<div class="modal" id="modal_login_worker">
    <div class="modal-dialog" style="width:450px">
        <div class="modal-content"  >
            <div class="modal-body  ">
                @if ($errors->any())
                    <small class="checkFieldError" style="color: red">{{ $errors->first() }}</small>
                @endif
                <form action="{{route('formLogin')}}" method="POST">
                    @csrf
                    <div class="container">
                        <h4 class="login-form text-center"> 会員登録／ログイン </h4>
                        <div class="form-group bg-white  mt-3 mx-3">
                            <label class="phone">電話番号</label>
                            <input type="text" value="" class="form-control form-control-md py-2 " name="phone" placeholder="09012345678(半角)">
                        </div>
                        @if ($errors->any())
                            <small class="checkFieldError" style="color: red">{{ $errors->first() }}</small>
                        @endif
                        <div class="form-group  bg-white mt-3 mx-3">
                            <label class="password"> パスワード </label>
                            <input type="password" value="" class="form-control form-control-md py-2 " name="password" placeholder="パスワード">
                        </div>
                        @if ($errors->any())
                            <small class="checkFieldError" style="color: red">{{ $errors->first() }}</small>
                        @endif
                        <div class="login form-group mt-2 mx-3 ">
                            <input type="submit" value="ログインする" class="form-control form-control-md py-2 border border-primary" style="color: #0EAFFF">
                        </div>
                        <div class="d-flex mx-3 my-3 justify-content-center">
                            <a href="{{route('formForgot')}}" class="auth-link text-center text-primary">パスワードを忘れた方はこちら</a>
                        </div>
                        <div class="d-flex mx-3 ">
                            <hr class="col-4 bg-danger border-2 border-top border-secondary">
                            <div class="col-4 text-center">または</div>
                            <hr class="col-4 bg-danger border-2 border-top border-secondary">
                        </div>
                        <div class="row" style="background-color: #F5F9FE">
                            <div class="register form-group mt-2" >
                                <div class="register_label text-center">会員登録がまだの方はこちら</div>
                                <button type="submit" style="background-color:#0EAFFF" class="form-control   text-white mb-5  ">会員登録する(無料)</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

