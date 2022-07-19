@extends('user.layouts.layoutRegister.app')
@section('title', '日払い求人サイト｜Greff（グレフ）')
@section('content')
    <div class="container register-content">
        <div class="register-block">
            <div class="register-title"> 会員登録 </div>
        </div>
        <div class="register-form-wrap">
            <form id="register-form" action="{{ route('registerWorker2') }}" method="post">
                @csrf
                <div class="table-regis">
                    <div class="tr row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                            <div class="row-header">
                                氏名
                                <span>必須</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap name-input">
                            <div class="row input-wrap">
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdr-4">
                                    <div class="text">姓</div>
                                    <input id="last_name" type="text" name="last_name" class="input-box form-control " placeholder="山田" value="{{ old('last_name') }}">
                                    <p class="error fw-lighter" for="last_name">@error('last_name') {{ $message }}@enderror</p>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdl-4">
                                    <div class="text">名</div>
                                    <input id="first_name" type="text" name="first_name" class="input-box form-control " placeholder="太郎" value="{{ old('first_name') }}">
                                    <p class="error fw-lighter" for="first_name">@error('first_name') {{ $message }}@enderror</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tr row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                            <div class="row-header"> フリガナ <span>必須</span></div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap name-input">
                            <div class="row input-wrap">
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdr-4">
                                    <div class="text">セイ</div>
                                    <input id="furigana_first_name" type="text" name="furigana_first_name" class="input-box form-control " placeholder="ヤマダ" value="{{ old('furigana_first_name') }}">
                                    <p class="error fw-lighter" for="furigana_first_name">@error('furigana_first_name') {{ $message }}@enderror</p>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 pdl-4">
                                    <div class="text">メイ</div>
                                    <input id="furigana_last_name" type="text" name="furigana_last_name" class="input-box form-control " placeholder="タロウ" value="{{ old('furigana_last_name') }}">
                                    <p class="error fw-lighter" for="furigana_last_name">@error('furigana_last_name') {{ $message }}@enderror</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tr row oneline-row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                            <div class="row-header"> 電話番号 <span>必須</span></div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap text-input">
                            <div class="row input-wrap">
                                <div class="col-xl-12">
                                    <input type="text" name="phone" class="input-box phone-box form-control  convert-halfwidth" placeholder="09012345678(半角)" value="{{ old('phone') }}">
                                    <p class="error fw-lighter" for="phone">@error('phone') {{ $message }}@enderror</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tr row multiline-row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                            <div class="row-header"> メールアドレス <span>必須</span></div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap text-input">
                            <div class="row input-wrap">
                                <div class="col-xl-12">
                                    <input id="email" type="email" name="email" class="col-xl-12 input-box phone-box form-control " placeholder="greff@example.jp" value="{{ old('email') }}">
                                    <p class="error fw-lighter" for="email">@error('email') {{ $message }}@enderror</p>
                                </div>
                                <div class="col-xl-12 text-caption mb-2">
                                    *メールの受信制限をされている方は、greff.jpからの受信を許可してください。<br>
                                    *入力間違いが多くなっておりますので、ご注意ください。
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tr row oneline-row not-required">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                            <div class="row-header"> 希望勤務地 <span style="background-color:#808080"> 任意 </span></div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap">
                            <div class="col-md-2 ps-0 input-date-wrap">
                                <div class="select-wrap">
                                    <select name="work_region">
                                        <option value=""> 選択 </option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area['katakana_name'] }}"> {{ $area['katakana_name'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-arrow">▼</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tr row multiline-row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 row-header-wrap">
                            <div class="row-header"> プッシュ通知 <span style="background-color:#808080">任意</span></div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 row-input-wrap name-input">
                            <div class="row input-wrap input-checkbox-wrap">
                                <label class="checkbox-wrap checkbox-input mt-0"><b> 許可する </b>
                                    <input type="checkbox" name="receive_notification" value="1">
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
                    <a href="" class="text-link" target="'_blank"> 利用規約 </a> と <a href="" class="text-link" target="'_blank">プライバシーポリシー </a> に
                    <br><button type="submit" class="button-submit btn-submit-step-2 border-0">
                        次のステップへ進む
                        <span> ▶ </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts-custom')

@endpush


