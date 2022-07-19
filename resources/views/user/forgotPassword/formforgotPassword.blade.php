<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/client/SGportal_design_VN.css')}}">
    <link rel="stylesheet" href="{{asset('css/client/detail/detailcss.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/client/vendorf944.css')}}">
    <link rel="stylesheet" href="{{asset('css/client/worker-layout-blankef50.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/client/loginworker/login.css') }}">
    <title>forgotpassword</title>
</head>
<body>
<div class="breadcrumb-list">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{Route('formLogin')}}">TOP</a></li>
                <li class="breadcrumb-item active" aria-current="page">パスワード再設定</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container register-set-password-content register-content">
    <div class="register-block">
        <div class="register-title">パスワード再設定</div>
    </div>
    <div class="register-area">
        <div class="register-title">
            登録時に使用した電話番号を入力してください。 パスワード再設定用のSMSをお送りします。
        </div>
        <form action="{{route('ShowResetLink')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="phone">電話番号</label>
                <input type="text" name="phone" class="form-control convert-halfwidth" id="phone" placeholder="09012345678(半角)">
                @if ($errors->any())
                    <small class="checkFieldError" style="color: red">{{ $errors->first() }}</small>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">送信する</button>
        </form>
        <div class="row end-footer">
            <div class="col-xl-12 text-center text-end-footer">
                Copyright © Ltd All Rights Reserved.
            </div>
        </div>
    </div>
</div>
</body>
</html>

