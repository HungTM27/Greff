@extends('manager.layouts.app')
@section('title', 'Detail Job')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Detail Jobs</h3>
                        </div>
                        <div class="col-md-8">
                          <a style="width: 120px" class="m-3 btn btn-secondary" href="{{route('RecruitJobs')}}">CANCEL</a>
                            <a style="width: 120px" class="m-3 btn btn-outline-secondary" href=""><i style="color:#3c3c3c;margin-right:4px" class="fas fa-file"></i> COPPY</a>
                            <a style="width: 120px" class="m-3 btn btn-info" href="{{route('FormEditRecruitJob',$detailJob->id)}}">EDIT</a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Status</h5>
                        </div>
                        @if(  $detailJob->status == 0)
                        <div class="col-md-8">
                           hiring
                        </div>
                         @endif
                        @if(  $detailJob->status == 1)
                            <div class="col-md-8">
                               disable
                            </div>
                        @endif
                        @if(  $detailJob->status == 2)
                            <div class="col-md-8">
                                finish
                            </div>
                        @endif
                        @if(  $detailJob->status == 3)
                            <div class="col-md-8">
                              Cancel
                            </div>
                        @endif
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Title</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->job->title}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Work time</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->work_date}} , {{$detailJob->work_time_start}} - {{$detailJob->work_time_end}} (break time {{$detailJob->break_time}} minutes)
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Dealine</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->dealine_day}} ,   {{$detailJob->dealine_time}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>People</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->people}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Salary/hour</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->salary_hour}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Travel fees</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->travel_fees}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Total amount</h5>
                        </div>
                        <div class="col-md-8">
                           {{($detailJob->salary_hour*$detailJob->work_time)+ $detailJob->travel_fees}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Description</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->job->description}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Work address</h5>
                        </div>
                        <div class="col-md-8">
                            {{$detailJob->job->work_address}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Access address</h5>
                        </div>
                        <div class="col-md-8">
                               {{$detailJob->job->access_address}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Photos</h5>
                        </div>
                        <div class="col-md-8">
                            @foreach($image_job as $row)
                                @if($detailJob->id_occupation == $row->id_occupation)
                                    <img style="margin-right: 16px" src="{{ url('/uploads/',$row->name)}}" alt="error image" width="200" height="160">

                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

