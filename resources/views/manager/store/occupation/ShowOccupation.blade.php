@extends('manager.layouts.app')
@section('title', 'Occupation')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-5">
                    <div class="d-flex justify-content-between">
                        <p class="card-title" style="font-size:20px"> List Occupation </p>
                        <a class="btn btn-primary mb-2" href="{{ route('occupation.formCreate') }}">
                            <i class="ti-plus text-white"></i></a>
                    </div>
                    <div class="row row-cols-2 g-2">
                        @foreach($occupation as $row)
                            <div class="col border">
                                <div class="row">
                                    <div class="col-md-5">
                                        @foreach($image as $img)
                                            @if($row->id==$img->id_occupation)
                                                <img src="{{ url('/uploads/',$img->name)}}" alt="" width="200" height="135">
                                                @break(1)
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col  p-2">
                                        <div class="me-3">
                                            <div class="row fw-bolder">{{$row->getContentWith3Dots($row->title,40)}}</div>
                                            <div class="row" style="min-height:70px;">{{$row->getContentWith3Dots($row->description,130)}}</div>
                                            <div class="row">
                                                <a href="{{ route("occupation.delete",$row->id)}}" class="btn btn-danger text-center me-2" style="width:40px;line-height:30px;padding-bottom:2px;">X</a>
                                                <button  class="text-center me-2" style="width:40px;border-radius:20%;">
                                                    <a href="{{ url("/store/formEditOccupation/edit",$row->id) }}"><i class="bi bi-pencil-fill"></i></a></button>
                                                <button class="text-center bg-warning me-2" style="width:130px;border-radius:10px;"><a style="color:white;text-decoration:none" href="{{ route("FormCreateRecruitJob",$row->id) }}">Create job</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
