@extends('user.layouts.app')
@section('title', '日払い求人サイト｜Greff（グレフ）')
@section('linkcss')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
{{-- start content detail--}}
<div class="container">
    <div class="text-detail d-none d-lg-block">
        バイトTOP > 東京 > 渋谷区 > 求人情報(Y0059KC6)
    </div>
</div>
    {{-- silde --}}
    <div class="owl-carousel owl-theme">
        @foreach($slide as $row)
            <div class="item"><img class="image-item" src="{{asset("uploads/$row->name")}}" alt=""></div>
        @endforeach
    </div>
    {{-- end slide--}}
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-12 col-lg-4 calendar-detail">
                    <div class="calendar-detail-text ps-4 ps-lg-4">
                        @php
                        $date=$data->work_date;
                        $month = date("m",strtotime($date));
                        $day = date("d",strtotime($date));
                            @endphp
                        {{$month}}月{{$day}}日（金）
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xl-7 mt-3 mt-lg-0">
                    <div class="row">
                        <div class="col-5 tau-background me-4">
                            <div class="tau-detail">
                                <span class="tau-detail-text text-left ms-4">
                                    @foreach($station_Occuption as $row)
                                        {{$row->name." "}}
                                    @endforeach
                                </span>
                            </div>
                        </div>
                        <div class="col-5 clock-background me-4 ">
                            <div class="clock-detail">
                                <span class="tau-detail-text text-left ms-4">
                                    @php
                                        $work_time_start=strtotime("$data->work_time_start");
                                        $work_time_end=strtotime("$data->work_time_end");
                                        @endphp
                                    {{date("H:i", $work_time_start)}}-{{date("H:i", $work_time_end)}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 d-none d-lg-block">
            <div class="text-thoi-han">あと<span class="fw-bolder"><span class="hours"></span>時間<span class="minutes"></span>分</span>で募集締め切り</div>
        </div>
    </div>

    <div class="row border-bottom pb-5">
        <div class="col-12 col-lg-6 mt-3">
            <div class="row">
                <div class="col-12 description-detail-text-suport">
{{--                    空いた時間で働ける！アシスタントタッフ--}}
                    {{$occupation->title}}
                </div>
                <div class="col-12 description-detail-text-salary mb-4">
{{--                    ￥4,950--}}
                    ￥{{$data->salary_hour}}
                </div>
                <div class="col-12 description-detail-text-description mb-4">
{{--                    食券だから接客時間は短め、ご提供もマニュアル通りでOK。スグに覚えられちゃうんです！さらに1日2h～とスキマ時間で働けるので、学校との両立もラクラクですよ♪--}}
                    {{$occupation->description}}
                </div>
                <div class="col-12 description-detail-text-icon">

                </div>
            </div>
        </div>
        <div class="col-6 d-none d-lg-block">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-4 apply-detail me-3" onclick="$('#show_modal').click()">
                    <div class="apply-detail-text">
                        このお仕事を申し込む
                    </div>
                </div>
                <div class="col-xl-2 star-detail-border " onclick="job_favorite()">
                    <div class="star-detail-img job_favorite_{{$data->id}}"></div>
                    <div class="star-detail-text">キープする</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 detail-job-detail">求人詳細</div>
        <div class="col-12 col-lg-6">
            <div class="row mt-4">
                <div class="col-4 col-md-3 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/clock.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">勤務日時</span>
                </div>
                <div class="col-8 col-md-9">
                    <div class="detail-job-detail-content">{{$month}}月{{$day}}日（金） {{date("H:i", $work_time_start)}}-{{date("H:i", $work_time_end)}}</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4  col-md-3">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/977_mo_h.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">時給</span>
                </div>
                <div class="col-8 col-md-9">
                    <div class="detail-job-detail-content">{{$data->salary_hour}}円</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4 col-md-3 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/電車、駅のフリーアイコン.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">交通費</span>
                </div>
                <div class="col-8 col-md-9">
                    <div class="detail-job-detail-content">一部支給 上限 {{$data->travel_fees}}円まで</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4 col-md-3 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/coffe.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">休憩時間</span>
                </div>
                <div class="col-8 col-md-9">
                    <div class="detail-job-detail-content">{{$data->break_time}}分</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4 col-md-3 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/folder-regular.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">業種</span>
                </div>
                <div class="col-8 col-md-9">
                    <div class="detail-job-detail-content">{{$career->career_name}}</div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-6 ">
            <div class="row mt-4">
                <div class="col-md-3 col-4 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/award.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">応募資格</span>
                </div>
                <div class="col-md-9 col-8">
                    @foreach($skill_required as $row)
                    <div class="detail-job-detail-content">{{$row->text}}</div>
                        @endforeach
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3 col-4 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/briefcase.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">持ち物</span>
                </div>
                <div class="col-md-9 col-8">
{{--                    @foreach($speciality as $row)--}}
{{--                    <div class="detail-job-detail-content">{{$row->content}}</div>--}}
{{--                        @endforeach--}}
                        <div class="detail-job-detail-content">{{$occupation->bring_item}}</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3 col-4 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/map-pin.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">勤務地</span>
                </div>
                <div class="col-md-9 col-8">
                    <div class="detail-job-detail-content mb-3">{{$occupation->work_address}}</div>
{{--                    <div class="detail-job-detail-content mb-3">表参道駅A5出口から徒歩5分</div>--}}
                    <div class="detail-job-detail-button">
                        <div class="detail-job-detail-gg text-center">Google Map <img src="{{ asset('css/client/detail/img/external-link.png') }}" class="detail-job-detail-gg-img pb-1 ps-1 "></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3 col-4 ">
                    <span class="detail-job-detail-icon"><img src="{{ asset('css/client/detail/img/alert-circle.png') }}" alt=""></span>
                    <span class="detail-job-detail-text ms-3">応募資格</span>
                </div>
                <div class="col-md-9 col-8">
                    <div class="detail-job-detail-content">{{$occupation->note}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row detail-above-footer mt-5 ">
    <div class="row d-flex justify-content-center pt-2">
        <div class="text-thoi-han col-12 mt-4 mb-3 ">あと<span class="fw-bolder"><span class="hours"></span>時間<span class="minutes"></span>分</span>で募集締め切り</div>
        <div class="row d-flex justify-content-center">
            <div class="col-6 col-md-4 col-lg-2 apply-detail me-3">
                <div class="apply-detail-text">
                    このお仕事を申し込む
                </div>
            </div>
            <div class="col-4 col-md-2 col-lg-1 star-detail-border" onclick="job_favorite()">
                <div class="star-detail-img job_favorite_{{$data->id}}"></div>
                <div class="star-detail-text">キープする</div>
            </div>
        </div>
    </div>

</div>
<div class="under-above-footer"></div>

<div class="container mt-3 d-none">
    <button type="button" id="show_modal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Open modal
    </button>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                応募するため、プロフィールの必要な情報をご設定ください.
                マイページですぐ設定する
            </div>
        </div>
    </div>
</div>
{{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.376014562382!2d105.77880701485425!3d21.017635586004484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ab30540137%3A0x35ac90387f094f93!2zU8O0bmcgxJDDoCBUb3dlcg!5e0!3m2!1sen!2s!4v1655652625234!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
{{-- end content detail --}}
@endsection

@push('scripts-custom')
@include('user/pageTop/script')
@endpush
