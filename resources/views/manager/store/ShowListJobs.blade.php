@extends('manager.layouts.app')
@section('title','Recruit Jobs')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="get" action="{{route('SearchJob')}}">
                    @csrf
                    <div class="card-body ">
                        <div class="d-flex justify-content-between">
                            <p class="card-title" style="font-size:20px"> List jobs </p>
                            <a type="button" class="btn bg-info" href="{{route('occupation.show')}}"><i
                                    class="ti-plus text-white"></i></a>

                        </div>
                        <div style="display: flex" class="listJob-header">
                            <input type="text" class="form-control col-md-4 px-2 mb-3" placeholder="Search by keyword"
                                   id="search" name="search">

                            <div style="align-self: center;margin-bottom: 8px;margin-left:16px" >
                                <input class="checkbox-status" type="checkbox" name="status" value="0">
                                <label >Hiring</label>
                            </div>
                            <div style="align-self: center;margin-bottom: 8px;margin-left:16px" class="checkbok-status">
                                <input class="checkbox-status" type="checkbox" name="status" value="1">
                                <label>Disable</label>
                            </div>
                            <div style="align-self: center;margin-bottom: 8px;margin-left:16px" class="checkbok-status">
                                <input class="checkbox-status" type="checkbox" name="status" value="2">
                                <label>Finish</label>
                            </div>
                            <div style="align-self: center;margin-bottom: 8px;margin-left:16px" class="checkbok-status">
                                <input class="checkbox-status"  type="checkbox" name="status" value="3">
                                <label>Cancel</label>
                            </div>
                        </div>



                    <div class="d-flex justify-content-between  ">
                        <b> Total: </b>
                    </div>
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th> ID</th>
                                <th> Status</th>
                                <th> Work time</th>
                                <th> Title Job</th>
                                <th> Number of title</th>
                                <th> Applided people</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            <tbody class="listjob">
                            @foreach($listJobs as $key => $jobs)
                                @if($jobs->status == 3)
                                    <tr style="display: none">
                                        <td>
                                    </tr>

                                @elseif($jobs->status == 2)
                                    <tr style="background-color: #f1d683">
                                        <td>{{++$key}}</td>
                                        <td>Finish</td>
                                        <td><p>{{$jobs->work_date}}</p>
                                            <p>{{$jobs->work_time_start}}~{{$jobs->work_time_end}}</p>
                                        </td>
                                        <td>{{$jobs->job->title}}</td>
                                        <td>{{$jobs->people}}</td>
                                        <td>{{$jobs->applied_people}}</td>
                                        <td>
                                            <a style="padding: 1px 5px; background-color: #f7dfbf;border: 1px solid #3c3c3c;color: black"
                                               href="{{route('DetailJob',$jobs->id)}}">
                                                <i style="margin-left: 3px" class="fa-solid fa-eye"></i>
                                            </a>
                                            <a style=" padding: 1px 7px;font-size: 14px;margin-left: 4px;color: #333;background-color: #f7dfbf;border: 1px solid #3c3c3c;"
                                               href="{{route('FormEditRecruitJob',$jobs->id)}}">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @elseif($jobs->status == 1)
                                    <tr style="background-color: #c8c8c8">
                                        <td>{{++$key}}</td>
                                        <td>Disable</td>
                                        <td><p>{{$jobs->work_date}}</p>
                                            <p>{{$jobs->work_time_start}}~{{$jobs->work_time_end}}</p>
                                        </td>
                                        <td>{{$jobs->job->title}}</td>
                                        <td>{{$jobs->people}}</td>
                                        <td>{{$jobs->applied_people}}</td>
                                        <td>
                                            <a style="padding: 1px 5px; background-color: #f7dfbf;border: 1px solid #3c3c3c;color: black"
                                               href="{{route('DetailJob',$jobs->id)}}">
                                                <i style="margin-left: 3px" class="fa-solid fa-eye"></i>
                                            </a>
                                            <a style=" padding: 1px 7px;font-size: 14px;margin-left: 4px;color: #333;background-color: #f7dfbf;border: 1px solid #3c3c3c;"
                                               href="{{route('FormEditRecruitJob',$jobs->id)}}">
                                                <i class="fas fa-pen"></i>
                                            </a>


                                        </td>
                                    </tr>
                                @else

                                    <tr>
                                        <td>{{++$key}}</td>
                                        @if($jobs->status == 0)
                                            <td>Hiring</td>
                                        @endif
                                        @if($jobs->status == 1)
                                            <td>Dissable</td>
                                        @endif
                                        @if($jobs->status == 2)
                                            <td>Finish</td>
                                        @endif

                                        <td><p>{{$jobs->work_date}}</p>
                                            <p>{{$jobs->work_time_start}}~{{$jobs->work_time_end}}</p>
                                        </td>
                                        <td>{{$jobs->job->title}}</td>
                                        <td>{{$jobs->people}}</td>
                                        <td>{{$jobs->applied_people}}</td>
                                        <td>
                                            <a style="padding: 1px 5px; background-color: #f7dfbf;border: 1px solid #3c3c3c;color: black"
                                               href="{{route('DetailJob',$jobs->id)}}">
                                                <i style="margin-left: 3px" class="fa-solid fa-eye"></i>
                                            </a>
                                            <a style=" padding: 1px 7px;font-size: 14px;margin-left: 4px;color: #333;background-color: #f7dfbf;border: 1px solid #3c3c3c;"
                                               href="{{route('FormEditRecruitJob',$jobs->id)}}">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tbody id="content" class="searchData">

                            </tbody>
                        </table>
                    </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>

@endsection
@push('scripts-custom')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                var query = $(this).val();
                let url = '{{route('SearchJob')}}';
                if (query) {
                    $('.listjob').hide();
                    $('.searchData').show();
                } else {
                    $('.listjob').show();
                    $('.searchData').hide();
                }
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {'search': query},
                    success: function (data) {
                        $('#content').html(data)
                    }

                });

            });

        });

        $(document).ready(function () {
            $("input[type='checkbox']").on('change', function () {

                var query = $(this).val();
                let url = '{{route('SearchJob')}}';
                if (query) {
                     $('.listjob').hide();
                    $('.searchData').show();
                } else {
                    $('.listjob').show();
                    $('.searchData').hide();
               }
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                       'status':query
                    },
                    success: function (data) {
                        console.log(data)
                        $('#content').html(data)
                    }

                });

            });
        });
    </script>
@endpush

