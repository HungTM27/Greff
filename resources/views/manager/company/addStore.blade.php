@extends('manager.layouts.app')
@section('title', 'Add Store')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-5">
                    <div class="hero">
                        <div class="form-box">
                            <div class="border-bottom row">
                                @if(!Session::has('add_store'))
                                    <div class="col-md-3 bg-white ml-2 py-2" style="border-bottom: 4px solid #3b8f99; color: #3b8f99" id="title1"><h3> General Information </h3></div>
                                    <div class="col-md-3 bg-white py-2" id="title2"><h3> Login account </h3></div>
                                @else
                                    <div class="col-md-3 bg-white ml-2 py-2" id="title1"><h3> General Information </h3></div>
                                    <div class="col-md-3 bg-white py-2"  style="border-bottom: 4px solid #3b8f99; color: #3b8f99" id="title2"><h3> Login account </h3></div>
                                @endif
                            </div>
                            <div class="m-4" id="pills-tabContent">
                                @if(!Session::has('add_store'))
                                    <div class="tab-pane show active" id="general_information">
                                        <form action="{{ route('addStore') }}" method="POST">
                                            @csrf
                                            <div class="status mb-2">
                                                <b>Status</b>
                                            </div>
                                            <div class="col-md-12 mb-2 d-flex justify-content-start pl-0">
                                                <div class="form-check form-check-inline pl-0">
                                                    <input type="radio" name="status" id="inlineRadio1" value="1">
                                                    <label for="inlineRadio1"> Enable </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="status" id="inlineRadio2" value="0" checked>
                                                    <label for="inlineRadio2"> Disable </label>
                                                </div>
                                            </div>
                                            <div class="information mb-2">
                                                <b>Store information</b>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div class="col-md-6 pr-1 pl-0">
                                                    <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> Store name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-md border-0 px-2" name="store_name" value="{{ old('store_name') }}">
                                                    </div>
                                                    <span class="fw-light text-danger"> @error('store_name') {{ $message }}@enderror </span>
                                                </div>
                                                <div class="col-md-6 pr-0 pl-1">
                                                    <div class="form-group border border-secondary bg-white pl-0">
                                                        <label class="control-label text-black-50 px-2 mb-0"> Store name (kana) </label>
                                                        <input type="text" class="form-control form-control-md border-0 px-2" name="store_name_kana" value="{{ old('store_name_kana') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div class="col-md-6 pr-1 pl-0">
                                                    <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> City <span class="text-danger">*</span></label>
                                                        <select class="form-control px-2 " name="city" id="city">
                                                            <option></option>
                                                            @foreach($areas as $area)
                                                                <option value="{{ $area['id'] }}"> {{ $area['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <span class="fw-light text-danger"> @error('city') {{ $message }}@enderror </span>
                                                </div>
                                                <div class="col-md-6 pr-0 pl-1">
                                                    <div class="form-group border border-secondary bg-white pl-0  mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> District <span class="text-danger">*</span></label>
                                                        <select class="form-control px-2" name="district" id="district">
                                                        </select>
                                                    </div>
                                                    <span class="fw-light text-danger"> @error('district') {{ $message }}@enderror </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div class="col-md-12 form-group border border-secondary bg-white px-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Address </label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="address" value="{{ old('address') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div class="col-md-6 pr-1 pl-0">
                                                    <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> Station </label>
                                                        <select class="form-control " multiple name="station[]" id="station">
                                                            @php
                                                                \App\Models\Station::showStation($stations)
                                                            @endphp
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0 pl-1">
                                                    <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> HP URL </label>
                                                        <input type="text" class="form-control form-control-md border-0 px-2" name="hp_url" value="{{ old('hp_url') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="information mb-2">
                                                <b> Person in charge </b>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div class="col-md-4 pr-1 pl-0">
                                                    <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-md border-0 px-2" name="contact_name" value="{{ old('contact_name') }}">
                                                    </div>
                                                    <span class="fw-light text-danger"> @error('contact_name') {{ $message }}@enderror </span>
                                                </div>
                                                <div class="col-md-4 pr-1 pl-1">
                                                    <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> Phone <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-md border-0 px-2" name="phone_number" value="{{ old('phone_number') }}">
                                                    </div>
                                                    <span class="fw-light text-danger"> @error('phone_number') {{ $message }}@enderror </span>
                                                </div>
                                                <div class="col-md-4 pr-0 pl-1">
                                                    <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                        <label class="control-label text-black-50 px-2 mb-0"> Email <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-md border-0 px-2" name="email" value="{{ old('email') }}">
                                                    </div>
                                                    <span class="fw-light text-danger"> @error('email') {{ $message }}@enderror </span>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-end">
                                                <div class="col-md-3 ml-0">
                                                    <a class="btn btn-secondary text-light" href="{{ route('formManagementStore') }}"> CANCEL </a>
                                                    <button type="submit" class="btn btn-info ml-3 text-light"> SAVE </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="tab-pane show active" id="login_account">
                                        @if(Session::get('success'))
                                            <div class="col-md-12 alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif
                                        <div class="col-md-12 d-flex justify-content-end mb-3 pr-0">
                                            <button type="button" class="btn bg-info" id="addUser" data-bs-toggle="modal" data-bs-target="#registerUser">
                                                <i class="ti-plus text-white"></i>
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th > ID </th>
                                                    <th class="col-md-4"> Name </th>
                                                    <th class="col-md-4"> Email </th>
                                                    <th class="col-md-1"> Status </th>
                                                    <th class="col-md-2"> Created date </th>
                                                    <th >  </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($list_acc as $acc)
                                                    <tr>
                                                        <td class="py-1"> {{ $acc['id'] }} </td>
                                                        <td> {{ $acc['name'] }} </td>
                                                        <td> {{ $acc['email'] }} </td>
                                                        <td> @if($acc['status'] == 1) Enable @else Disable @endif </td>
                                                        <td> {{ $acc['created_at'] }}  </td>
                                                        <td>
                                                            <div class="btn border-0 p-1" data-bs-toggle="modal" data-bs-target="#editAccount" onclick="showFormEditAccount({{ $acc['id'] }})">
                                                                <i class="mdi mdi-pencil-box" style="font-size: 25px"></i>
                                                            </div>
                                                            <div class="btn border-0 p-1" id="deleteAccount">
                                                                <i class="mdi mdi-delete" style="font-size: 25px; color:red"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal fade" id="registerUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content rounded-0 border-dark">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalCenterTitle"> Register user </h3>
                                                        <div type="button" class="close" id="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style='font-size:30px'>&times;</span></div>
                                                    </div>
                                                    <form action="{{ route('registerUser') }}" method="post">
                                                        @csrf
                                                        <div class="modal-body mx-4">
                                                            <div class="row">
                                                                <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                                                                    <label class="control-label text-black-50 mb-0"> Name <span class="text-danger">*</span> </label>
                                                                    <input type="text" class="form-control form-control-md border-0 pl-0" name="name" value="{{ old('name') }}">
                                                                </div>
                                                                <span class="fw-light text-danger mb-1"> @error('name') {{ $message }}@enderror </span>
                                                                <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                                                                    <label class="control-label text-black-50 mb-0"> Login email <span class="text-danger">*</span> </label>
                                                                    <input type="text" class="form-control form-control-md border-0 pl-0" name="login_email" value="{{ old('login_email') }}">
                                                                </div>
                                                                <span class="fw-light text-danger mb-1"> @error('email') {{ $message }}@enderror </span>
                                                                <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                                                                    <label class="control-label text-black-50 mb-0"> Password <span class="text-danger">*</span> </label>
                                                                    <input type="password" class="form-control form-control-md border-0 pl-0" name="password" value="">
                                                                </div>
                                                                <span class="fw-light text-danger mb-1"> @error('password') {{ $message }}@enderror </span>
                                                                <div class="col-md-12 mb-2 d-flex justify-content-start pl-0">
                                                                    <div class="form-check form-check-inline pl-0">
                                                                        <input type="radio" name="status" id="inlineRadio1" value="1">
                                                                        <label for="inlineRadio1"> Enable </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="radio" name="status" id="inlineRadio2" value="0" checked>
                                                                        <label for="inlineRadio2"> Disable </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer pt-1">
                                                            <div class="btn btn-secondary text-light" data-bs-dismiss="modal" aria-label="Close"> CANCEL </div>
                                                            <button type="submit" class="btn btn-primary" id="save"> SAVE </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="editAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content rounded-0 border-dark" id="content">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts-custom')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="city"]').on('change',function(){
                var area_id = $(this).val();
                if(area_id){
                    $.ajax({
                        url:'/getDistrict/' + area_id,
                        type: 'GET',
                        dataType: 'json',
                        success:function(data){
                            $('select[name="district"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="district"]').append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                    });
                } else {
                    $('select[name="district"]').empty();
                }
            });
        });

        $(document).ready(function () {
            $('#station').filterMultiSelect({
                selectAllText: 'Select all',
                placeholderText: ' ',
                filterText: 'Search',
                caseSensitive: true
            });
        });


        function showFormEditAccount(accId) {
            $.ajax({
                url: "{{route('formEditAccount') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: accId,
                },
                success: function (data) {
                    $('#editAccount').find('#content').html(data);
                }
            });
        }

    </script>
@endpush
