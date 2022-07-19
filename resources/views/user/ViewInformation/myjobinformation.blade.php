@extends('user.layouts.app')
@section('linkcss')

    <link rel="stylesheet" href="{{asset('css/client/mypageinformation/mypageinfor.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>

    </style>
@endsection
@section('content')
    <div class="container d-none d-lg-block">
        <div class="infor_link">バイトTOP > マイページTOP</div>
    </div>
    <div class="row border-top mt-2 d-none d-lg-block">

    </div>
<div class="container-lg mypageinfor-wap">
    <div class="row mt-5">
        {{--Left--}}
        @include("user/viewInformation/menuLeft")
        {{--Endleft--}}

        {{--right--}}
            <div class="col-7 d-lg-block d-none">
                <div class="col-12">マイページTOP</div>
                <div class="row m-2 text-danger p-2 pb-3">
                    <div class="col-12 h5">お知らせ</div>
                    <div class="col-12 mb-2"><i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2"  style="padding:2px 7px"></i>身分証明書をアップロードしてください。</div>
                    <div class="col-12"><i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2" style="padding:2px 7px"></i>給与振込口座が未登録です。</div>
                </div>
                <div class="row">
                    <div class="col-4 pt-4 ps-4">
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-6 text-center">
                                <div class="h2">0</div>
                                <div class="">合計稼働 時間</div>
                            </div>
                            <div class="col-6 text-center">
                                <div class=" h2">0</div>
                                <div class="">ペナルティ</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row border pe-4 ps-4 pb-3 mt-3" style="background: #0EAFFF 0% 0% no-repeat padding-box;">
                            <div class="col-12 text-light mt-3 mb-3">引き出し可能額</div>
                            <div class="col-6 text-light h1">￥10,900</div>
                            <div class="col-6 text-end mt-4"><span class="border rounded-pill ps-3 pe-3 pt-1 pb-1  bg-light">引き出す</span></div>
                        </div>
                    </div>
                </div>

            </div>

        {{--endright--}}
        <div class="col-8 d-lg-none">
            <div class="row  pt-4 pb-4 me-5 border-bottom">
                <div class="col-5">山田 太郎</div>
                <div class="col-7 text-end"><a class="text-decoration-none" href="updateProfile"><div class="border p-1" style="max-width:150px">ユーザー情報編集</div></a></div>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <div class="col-5 text-center">
                    <div class="w-75 h1">0</div>
                    <div class="w-75">合計稼働 時間</div>
                </div>
                <div class="col-5 text-center">
                    <div class="w-75 h1">0</div>
                    <div class="w-75">ペナルティ</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border pe-4 ps-4 pb-3 mt-3 d-lg-none" style="background: #0EAFFF 0% 0% no-repeat padding-box;">
        <div class="col-12 text-light mt-3 mb-3">引き出し可能額</div>
        <div class="col-6 text-light h1">￥10,900</div>
        <div class="col-6 text-end"><span class="border rounded-pill ps-3 pe-3 pt-1 pb-1  bg-light">引き出す</span></div>
    </div>
    <div class="row border border-danger m-2 text-danger p-2 pb-3 d-lg-none">
        <div class="col-12 h5">お知らせ</div>
        <div class="col-12 mb-2"><i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2"  style="padding:2px 7px"></i>身分証明書をアップロードしてください。</div>
        <div class="col-12"><i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2" style="padding:2px 7px"></i>給与振込口座が未登録です。</div>
    </div>
    <div class="row d-lg-none">
        <div class="card">
            <ul class="list-group list-group-flush" >
                <li class="list-group-item d-flex" style="background: #F5F9FE 0% 0% no-repeat padding-box;">
                    <a href="" class="w-100 text-dark text-decoration-none">
                        <div class="">
                            <i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2"  style="padding:2px 7px"></i>身分証明書アップロード </div>
                    </a>
                        <div class="">▶</div>
                </li>
                <li class="list-group-item d-flex" style="background: #F5F9FE 0% 0% no-repeat padding-box;">
                    <a href="" class="w-100 text-dark text-decoration-none">
                        <div class="w-100">資格証明書アップロード </div>
                    </a>
                    <div>▶</div>
                </li>
                <li class="list-group-item d-flex" style="background: #F5F9FE 0% 0% no-repeat padding-box;">
                    <a href="" class="w-100 text-dark text-decoration-none">
                    <div class="w-100">
                        <i class="fa-solid fa-exclamation text-light bg-danger rounded-circle me-2"  style="padding:2px 7px"></i>給与振込口座変更 </div>
                    </a>
                    <div>▶</div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@push('scripts-custom')
@endpush
