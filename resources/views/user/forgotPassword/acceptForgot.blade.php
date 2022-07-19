<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="css/client/forgotpassword/forgot.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="top-forgotpassword header-forgot">
    <div class="row row-forgot">
        <div class="col-1"></div>`
        <div class="col-2 logo">
            <p class="text-logo">LOGO</p>
        </div>
        <div class="col-5 title-top">
            <p class="solution">「1日単位で」「すぐに」「簡単に」働ける。</p>
        </div>
    </div>
</div>
<div class="top">
</div>
<div class="book-mark row row-forgot">
    <div class="col-1"></div>
    <div class="col-5">
        <h5 class="title-book-mark"><b>パスワード再設定了</b></h5>
    </div>
</div>
<div class="container">
    <div class="col-12">
        <h5 class="title">パスワードの再設定が完了しました。</h5>
    </div>
    <form  method="POST" class="form-forgot">
        @csrf
        <input type="hidden">
        @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <span>{{ Session::get('error')}}</span>
            </div>
        @endif
        <div class="text-center">
            <div id="send">
                <button type="submit" class="btn-send">パスワードを再設定する</button>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="footer">
        <p class="title-footer">Copyright © Ltd All Rights Reserved.</p>
    </div>
</div>
</body>
</html>
