<!DOCTYPE html>
<html lang="en">
<head>
    <title> {{$title}} </title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row align-items-center auth my-5">
        <div class="col-md-4 mx-auto my-5 border border-secondary" style="background-color: #f2f2f2;">
            <div class="auth-form-light text-left pt-2 px-5">
                <h1 class="text-center"> Forgot password </h1>
                <form class="pt-3" method="post" action="{{route('forgot-password-link')}}">
                    @csrf

                   @if(Session::has('fail'))
                    <div class="mx-4 mt-3 px-2 py-2" style="background-color: #f1dfe1">
                        <span class="text-danger">
                         {{Session::get('fail')}}
                        </span>
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="mx-4 mt-3 px-2 py-2 text-center" style="background-color: #c6e6f4">
                        <span style="color: #287191">
                            {{Session::get('success')}}
                        </span>
                    </div>
                    @endif
                    <div class="form-group border border-secondary bg-white mx-4 mt-3 px-2">
                        <label class="col-sm-2 control-label text-black-50"> Email </label>
                        <input type="text" class="form-control form-control-md px-4 py-2 border-0" name="email" value="">
                    </div>
                    <span class="text-danger mx-4 mb-3"> @error('email'){{$message}}@enderror </span>

                    <div class="d-flex justify-content-end mx-4 my-3">
                        <a href="{{route('login')}}" class="auth-link text-dark"> Back to login screen </a>
                    </div>
                    <div class="form-group mt-2 mb-5 mx-4">
                        <button class="btn col-md-12 text-center text-light" style="background-color: #3f96c5;" name=login"> SEND EMAIL </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
