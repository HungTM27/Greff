@extends('manager.layouts.app')
@section('title','Create RecruitJob')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-5">
                    <div class="hero">
                        <div class="form-box">
                            <div class="border-bottom row">
                                <div class="col-md-3 bg-white ml-2 py-2" id="title1"><h4> Create job </h4></div>
                            </div>
                            <div class="m-4" id="pills-tabContent">
                                <div class="tab-pane show active" id="general_information">
                                    <form action="{{route('ConfirmAddCreateJob')}}" method="POST">
                                        @csrf
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-12 pr-1 pl-0">
                                                <lable for="occupation">Select occupation</lable>
                                                <select name="occupation" class="form-select form-select-sm"
                                                        aria-label=".form-select-sm example">
                                                    @foreach($occupation as $key => $occupation_item)
                                                        @if($occupation2->id == $occupation_item->id)
                                                            <option selected value="{{$occupation2->id}}">{{$occupation2->title}}</option>
                                                        @else
                                                        <option value="{{$occupation_item->id}}">{{$occupation_item->title}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span
                                                    class="text text-danger">@error('occupation'){{$message}}@enderror</span>
{{--                                                {{$occupation2->id}}--}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Work Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="date"
                                                           class="form-control form-control-md border-0 px-2"
                                                          value="{{old('work_date')}}"  name="work_date" placeholder="Enter work_time ...">
                                                </div>
                                                <span
                                                    class="text text-danger">@error('work_date'){{$message}}@enderror</span>
                                            </div>
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Work Time <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="text"
                                                           class="form-control form-control-md border-0  px-2"
                                                           value="{{old('work_time')}}" name="work_time">
                                                </div>
                                                <span
                                                    class="text text-danger">@error('work_time'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1  pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Working-time <span
                                                        class="text-danger">*</span></label>
                                                <select id="work_time_start" name="work_time_start" class="form-select form-select-sm p-2">
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

                                            <div class="col-md-6  pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"></label>
                                                <select id="work_time_end"  class="form-select  px-2 mb-0 form-select-sm p-2"
                                                        aria-label=".form-select-sm example"
                                                        name="work_time_end">
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
                                                    <input type="text"
                                                           class="form-control form-control-md border-0 px-2"
                                                           value="{{old('break_time')}}"   name="break_time">
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
                                                           name="people" value="{{old('people')}}">
                                                </div>
                                                <span
                                                    class="text text-danger">@error('people'){{$message}}@enderror</span>
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
                                                           name="salary_hour" value="{{old('salary_hour')}}">
                                                </div>
                                                <span
                                                    class="text text-danger">@error('salary_hour'){{$message}}@enderror</span>
                                            </div>
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"> Travels fees <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="text"
                                                           class="form-control form-control-md border-0  px-2" value="{{old('travel_fees')}}"
                                                           name="travel_fees">
                                                </div>
                                                <span
                                                    class="text text-danger">@error('travel_fees'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0">Dealine to
                                                    apply</label>
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <input type="date" class="form-control form-control-md border-0 "
                                                           name="dealine_day" value="{{old('dealine_day')}}">

                                                </div>
                                                <span
                                                    class="text text-danger">@error('dealine_day'){{$message}}@enderror</span>

                                            </div>
                                            <div class="col-md-6  pr-1 pl-0">
                                                <label class="control-label text-black-50 px-2 mb-0"></label>
                                                <select style="padding-bottom: 18px !important;"
                                                        class="form-select  px-2 mb-0 form-select-sm p-2"
                                                        aria-label=".form-select-sm example"
                                                        name="dealine_time">

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
                                                    <input checked type="radio"
                                                           name="status" id="flexRadioDefault1" value="0">
                                                    <label>Hiring</label>
                                                </div>
                                                <div class="mx-3">
                                                    <input value="1" type="radio"
                                                           name="status" id="flexRadioDefault1">
                                                    <label>Disable</label>
                                                </div>
                                                <div class="mx-3">
                                                    <input value="2" type="radio"
                                                           name="status" id="flexRadioDefault1">
                                                    <label>Finish</label>
                                                </div>
                                                <div class="mx-3">
                                                    <input value="3" type="radio"
                                                           name="status" id="flexRadioDefault1">
                                                    <label>Cancel</label>
                                                </div>
                                            </div>
                                            <span class="text text-danger">@error('status'){{$message}}@enderror</span>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end pr-1 pl-0">
                                                <a href="{{route('RecruitJobs')}}"
                                                   class="btn mr-3 btn-secondary">CANCEL</a>
                                                <input type="submit" data-toggle="modal" data-target="#myModal"
                                                       class="btn btn-info" value="SAVE">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection

