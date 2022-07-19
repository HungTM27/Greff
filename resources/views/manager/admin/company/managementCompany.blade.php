@extends('manager.layouts.app')
@section('title', 'Companies')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <form method="get" action="{{ route('formManagementCompany') }}">
                @csrf
                <div class="card-body pb-5">
                    <div class="d-flex justify-content-between">
                        <p class="card-title" style="font-size:20px"> List Company </p>
                        <a type="button" class="btn bg-info" href="{{ route('formAddCompany') }}"><i class="ti-plus text-white"></i></a>
                    </div>
                    <input type="text" class="form-control col-md-4 px-2 mb-3" placeholder="Search by keyword" id="search" name="search">
                    <div class="d-flex justify-content-between my-3">
                        <b> Total: {{ $count }} </b>
                        <a type="button" class="text-decoration-none" href="{{ route('exportIntoCSV') }}"><b class="text-info"> Export list company </b></a>
                    </div>
                    @if(Session::get('success'))
                        <div class="col-md-12 alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th> ID </th>
                                <th> Company name </th>
                                <th> HP URL </th>
                                <th> Contact infor </th>
                                <th> Address </th>
                                <th> Status </th>
                                <th> Created date </th>
                                <th>  </th>
                                <th> File uploaded </th>
                            </tr>
                            </thead>
                            @foreach($companies as $company)
                                <tbody class="alldata">
                                @if($company['status'] == 0)
                                    <tr style="background-color: rgba(232,231,231,0.76)">
                                @else
                                    <tr>
                                @endif
                                    <td> {{ $company['id'] }} </td>
                                    <td> {{ $company['company_name'] }} </td>
                                    <td><a href="{{ $company['hp_url'] }}"> {{ $company['hp_url'] }} </a></td>
                                    <td> Name: {{ $company['contact_name'] }} <br>
                                        Phone: {{ $company['phone_number'] }} <br>
                                        Email: {{ $company['email'] }}
                                    </td>
                                    <td>
                                        @foreach($areas as $area)
                                            @if($area['id'] == $company['id_city'])
                                                {{ $area['name'] }}
                                            @endif
                                        @endforeach
                                        @foreach($areas as $area)
                                            @if($area['id'] == $company['id_district'])
                                                {{ $area['katakana_name'] }}
                                            @endif
                                        @endforeach
                                        {{ $company['room'] }}
                                        {{ $company['building'] }}
                                    </td>
                                    <td> @if($company['status'] == 1) Enable @else Disable @endif </td>
                                    <td> {{ $company['created_at'] }} </td>
                                    <td>
                                        <a type="button" class="btn border-0 p-0" href="{{url('editCompany', $company->id)}}">
                                            <i class="mdi mdi-pencil-box" style="font-size: 25px"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div>
                                                <div class="col-md-12" style="text-align: center">
                                                    <input type="file" hidden id="upload_file" name="file">
                                                    <div id="choose_file"><button class="btn border-0 p-0" type="button" onclick="$('#upload_file').click()"><i class="ti-upload"></i></button></div>
{{--                                                    <a class="btn btn-google p-0" href="{{ route('') }}"> a </a>--}}
                                                </div>
                                                <div class="col-md-12" style="text-align: center">
                                                    <select name="file_uploaded" id="file_uploaded">
                                                        <option value="volvo"> File uploaded </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tbody id="content" class="searchdata">
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts-custom')
    <script type="text/javascript">
        $('#search').on('keyup', function(){
            $value = $(this).val();
            if($value){
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }
            $.ajax({
                type: 'GET',
                url: '{{URL::to('search')}}',
                data: {'search':$value},

                success:function(data){
                    console.log(data);
                    $('#content').html(data);
                }
            });
        });

    </script>
@endpush
