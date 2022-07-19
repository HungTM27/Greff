@extends('manager.layouts.app')
@section('title','Edit Recruit Job')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-5">
                    <div class="hero">
                        <div class="form-box">
                            <div class="border-bottom row">
                                <div class="col-md-3 bg-white ml-2 py-2" id="title1"><h4> Update jobs </h4></div>

                            </div>
                            <div class="m-4" id="pills-tabContent">
                                <div class="tab-pane show active" id="general_information">
                                    <form action="{{route('ConfirmEditJob',$edit->id)}}" method="POST">
                                        @csrf
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-12 pr-1 pl-0">
                                                <lable for="occupation">Select occupation</lable>
                                                <select name="occupation" class="form-select form-select-sm"
                                                        aria-label=".form-select-sm example">
                                                    @foreach($occupation as $key => $occupation_item)
                                                        <option {{$occupation_item->id == $edit->id_occupation ? 'selected': '' }} value="{{$occupation_item->id}}">{{$occupation_item->title}}</option>
                                                    @endforeach

                                                </select>
                                                <span class="text text-danger">@error('occupation'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Work Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="date"
                                                           class="form-control form-control-md border-0 px-2"
                                                           name="work_date" value="{{$edit->work_date}}">

                                                </div>

                                            </div>
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Work Time <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="text"
                                                           class="form-control form-control-md border-0  px-2"
                                                           name="work_time" value="{{$edit->work_time}}">
                                                </div>
                                                <span class="text text-danger">@error('work_time'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Working-time <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select  px-2 mb-0 form-select-sm p-2"
                                                        aria-label=".form-select-sm example"
                                                        name="work_time_start">
                                                    <option selected value="{{$edit->work_time_start}}">{{$edit->work_time_start}}</option>
                                                    <option value="00:00">00:00</option>
                                                    <option value="00:30">00:30</option>
                                                    <option value="01:00">01:00</option>
                                                    <option value="01:30">01:30</option>
                                                    <option value="02:00">02:00</option>
                                                    <option value="02:30">02:30</option>
                                                    <option value="03:00">03:00</option>
                                                    <option value="03:30">03:30</option>
                                                    <option value="04:00">04:00</option>
                                                    <option value="04:30">04:30</option>
                                                    <option value="05:00">05:00</option>
                                                    <option value="05:30">05:30</option>
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                    <option value="22:30">22:30</option>
                                                    <option value="23:00">23:00</option>
                                                    <option value="23:30">23:30</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"></label>
                                                <select class="form-select  px-2 mb-0 form-select-sm p-2"
                                                        aria-label=".form-select-sm example"
                                                        name="work_time_end">
                                                    <option selected value="{{$edit->work_time_end}}">{{$edit->work_time_end}}</option>
                                                    <option value="00:00">00:00</option>
                                                    <option value="00:30">00:30</option>
                                                    <option value="01:00">01:00</option>
                                                    <option value="01:30">01:30</option>
                                                    <option value="02:00">02:00</option>
                                                    <option value="02:30">02:30</option>
                                                    <option value="03:00">03:00</option>
                                                    <option value="03:30">03:30</option>
                                                    <option value="04:00">04:00</option>
                                                    <option value="04:30">04:30</option>
                                                    <option value="05:00">05:00</option>
                                                    <option value="05:30">05:30</option>
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                    <option value="22:30">22:30</option>
                                                    <option value="23:00">23:00</option>
                                                    <option value="23:30">23:30</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0">Break
                                                    time(minutes)</label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input  type="text"
                                                           class="form-control form-control-md border-0 px-2"
                                                           name="break_time" value="{{$edit->break_time}}">
                                                </div>
                                                <span class="text text-danger">@error('break_time'){{$message}}@enderror</span>

                                            </div>
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Number of people
                                                    <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="text"
                                                           class="form-control form-control-md border-0  px-2"
                                                           name="people" value="{{$edit->people}}">
                                                </div>
                                                <span class="text text-danger">@error('people'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0">Salary per
                                                    hours<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="text"
                                                           class="form-control form-control-md border-0 px-2"
                                                           name="salary_hour" value="{{$edit->salary_hour}}">
                                                    <span class="text text-danger">@error('salary_hour'){{$message}}@enderror</span>
                                                </div>

                                            </div>
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Travels fees <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="text"
                                                           class="form-control form-control-md border-0  px-2"
                                                           name="travel_fees" value="{{$edit->travel_fees}}">
                                                    <span class="text text-danger">@error('travel_fees'){{$message}}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0">Dealine to
                                                    apply</label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="date" class="form-control form-control-md border-0 "
                                                           name="dealine_day" value="{{$edit->dealine_day}}">
                                                </div>

                                            </div>
                                            <div class="col-md-6  pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"></label>
                                                <select style="padding-bottom: 16px!important;" class="form-select  px-2 mb-0 form-select-sm p-2"
                                                        aria-label=".form-select-sm example"
                                                        name="dealine_time">
                                                    <option selected value="{{$edit->dealine_time}}">{{$edit->dealine_time}}</option>
                                                    <option value="00:00">00:00</option>
                                                    <option value="00:30">00:30</option>
                                                    <option value="01:00">01:00</option>
                                                    <option value="01:30">01:30</option>
                                                    <option value="02:00">02:00</option>
                                                    <option value="02:30">02:30</option>
                                                    <option value="03:00">03:00</option>
                                                    <option value="03:30">03:30</option>
                                                    <option value="04:00">04:00</option>
                                                    <option value="04:30">04:30</option>
                                                    <option value="05:00">05:00</option>
                                                    <option value="05:30">05:30</option>
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                    <option value="22:30">22:30</option>
                                                    <option value="23:00">23:00</option>
                                                    <option value="23:30">23:30</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div style="display: flex" class="col-md-6 pr-1 pl-0">
                                                <div class="mx-3">

                                                    <input @if($edit->status == 0) checked @endif type="radio"
                                                           name="status" id="flexRadioDefault1" value="0">
                                                    <label>Hiring</label>

                                                </div>
                                                <div class="mx-3">

                                                    <input @if($edit->status == 1) checked @endif value="1"  type="radio"
                                                           name="status" id="flexRadioDefault1">
                                                    <label>Disable</label>

                                                </div>
                                                <div class="mx-3">

                                                    <input @if($edit->status == 2) checked @endif   type="radio" value="2"
                                                           name="status" id="flexRadioDefault1">
                                                    <label>Finish</label>

                                                </div>
                                                <div class="mx-3">

                                                    <input @if($edit->status == 3) checked @endif  type="radio" value="3"
                                                           name="status" id="flexRadioDefault1">
                                                    <label>Cancel</label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <input type="hidden" name="id" value="{{$edit->id}}">
                                            </div>

                                            <div class="col-md-6 d-flex justify-content-end pr-1 pl-0">
                                                <a href="{{route('RecruitJobs')}}"
                                                   class="btn mr-3 btn-secondary">CANCEL</a>
                                                <input type="submit" class="btn btn-info" value="EDIT">
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
@endsection
