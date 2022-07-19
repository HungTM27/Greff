@extends('user.layouts.app')
@section('title','Recruit Jobs')
@section('content')

    {{-- <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModal">{{ __('Login') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">login</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row">
                        <h4 class="login-form text-center"> 会員登録／ログイン </h4>
                        <form class="pt-3" method="post" action="">
                            @csrf
                            <div class="form-group bg-white  mt-3 mx-3">
                                <label class="phone">電話番号</label>
                                <input type="text" value="" class="form-control form-control-md py-2 " name="sdt" placeholder="09012345678(半角)">
                            </div>
                            <div class="form-group  bg-white mt-3 mx-3">
                                <label class="password"> パスワード </label>
                                <input type="password" value="" class="form-control form-control-md py-2 " name="password" placeholder="パスワード">
                            </div>
                            <div class="login form-group mt-2 mx-3 ">
                                <input type="submit" value="ログインする" class="form-control form-control-md py-2 border border-primary" style="color: #0EAFFF">
                            </div>
                            <div class="d-flex mx-3 my-3 justify-content-center">
                                <a href="" class="auth-link text-center text-primary">パスワードを忘れた方はこちら</a>
                            </div>
                            <div class="d-flex mx-3 ">
                                <hr class="col-4 bg-danger border-2 border-top border-secondary">
                                <div class="col-4 text-center">または</div>
                                <hr class="col-4 bg-danger border-2 border-top border-secondary">
                            </div>
                        </form>
                    </div>
                    <div class="row" style="background-color: #F5F9FE">
                        <div class="register form-group mt-2" >
                            <div class="register_label">
                                会員登録がまだの方はこちら
                            </div>
                            <button type="submit" style="background-color:#0EAFFF" class="form-control   text-white mb-5  ">会員登録する(無料)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
