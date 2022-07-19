@extends('manager.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Confirm </h3>
                        </div>

                    </div>
                    <form action="{{route('StoreEdit',$id)}}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Status</h5>
                            </div>
                            @if($status == 0)
                                <div class="col-md-8">
                                    <span> Hiring</span>
                                </div>
                            @endif
                            @if($status == 1)
                                <div class="col-md-8">
                                    <span style="background-color: #c8c8c8"> Disable</span>
                                </div>
                            @endif
                            @if($status == 2)
                                <div class="col-md-8">
                                    <span style="background-color: #f1d683"> Finish</span>
                                </div>
                            @endif
                            @if($status == 3)
                                <div class="col-md-8">
                                    <span>Cancel</span>
                                </div>
                            @endif
                            <input name="status" type="hidden" value="{{$status}}">
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Title</h5>
                            </div>
                            <div class="col-md-8">
                                {{$confirm[0]['title']}}
                            </div>
                            <input name="occupation" type="hidden" value="{{$occupation}}">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Work time</h5>
                            </div>
                            <div class="col-md-8">
                                {{$work_date}} : {{$work_time_start}} ~ {{$work_time_end}}
                                <input name="work_date" type="hidden" value="{{$work_date}}">
                                <input name="work_time" type="hidden" value="{{$work_time}}">
                                <input name="work_time_start" type="hidden" value="{{$work_time_start}}">
                                <input name="work_time_end" type="hidden" value="{{$work_time_end}}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Break time</h5>
                            </div>
                            <div class="col-md-8">
                                {{$break_time}} minute
                            </div>
                            <input name="break_time" type="hidden" value="{{$break_time}}">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Dealine</h5>
                            </div>
                            <div class="col-md-8">
                                {{$dealine_day}} : {{$dealine_time}}
                            </div>
                            <input name="dealine_day" type="hidden" value="{{$dealine_day}}">
                            <input name="dealine_time" type="hidden" value="{{$dealine_time}}">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>People</h5>
                            </div>
                            <div class="col-md-8">
                                {{$people}}
                            </div>
                            <input name="people" type="hidden" value="{{$people}}">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Salary/hour</h5>
                            </div>
                            <div class="col-md-8">
                                {{$salary_hour}}

                            </div>
                            <input name="salary_hour" type="hidden" value="{{$salary_hour}}">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Travel fees</h5>
                            </div>
                            <div class="col-md-8">
                                {{$travel_fees}}
                            </div>
                            <input name="travel_fees" type="hidden" value="{{$travel_fees}}">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Total amount</h5>
                            </div>
                            <div class="col-md-8">
                                {{($salary_hour * $work_time)+$travel_fees}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Description</h5>
                            </div>
                            <div class="col-md-8">
                                {{$confirm[0]['description']}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Work address</h5>
                            </div>
                            <div class="col-md-8">
                                {{$confirm[0]['work_address']}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Access address</h5>
                            </div>
                            <div class="col-md-8">
                                {{$confirm[0]['access_address']}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <h5>Photos</h5>
                            </div>
                            <div class="col-md-8">
                                @foreach($image_job as $row)
                                    @if($confirm[0]['id'] == $row->id_occupation)
                                        <img style="margin-right: 16px" src="{{ url('/uploads/',$row->name)}}" alt="error image" width="200" height="160">

                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$id}}">;
                        <div class="col-md-12 float-right">
                            <button type="submit" style="width: 120px" class="m-3 btn float-right btn-info text-white" >SAVE</button>
                            <a style="width: 120px" class="m-3 btn btn-secondary float-right" href="{{route('RecruitJobs')}}">CANCEL</a>

                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
