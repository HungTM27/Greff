@extends('manager.layouts.app')
@section('title', 'Edit company')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-5">
                    <div class="hero">
                        <div class="form-box">
                            <div class="border-bottom row">
                                <div class="col-md-3 bg-white ml-2 py-2" id="title1"><h3> General Information </h3></div>
                                <div class="col-md-3 bg-white py-2" id="title2"><h3> Login account </h3></div>
                            </div>
                            <div class="m-4" id="pills-tabContent">
                                <div class="tab-pane show active" id="general_information">
                                    <form action="{{ url('/updateCompany',$company['id']) }}" method="POST">
                                        @csrf
                                        <div class="status mb-2">
                                            <b>Status</b>
                                        </div>
                                        <div class="col-md-12 mb-2 d-flex justify-content-start pl-0">
                                            <div class="form-check form-check-inline pl-0">
                                                <input type="radio" name="status" id="inlineRadio1" value="1" @if($company['status'] == 1) checked @endif>
                                                <label for="inlineRadio1"> Enable </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status" id="inlineRadio2" value="0" @if($company['status'] == 0) checked @endif>
                                                <label for="inlineRadio2"> Disable </label>
                                            </div>
                                        </div>
                                        <div class="information mb-2">
                                            <b>Company information</b>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Company name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="company_name" value="{{ $company['company_name'] }}">
                                                </div>
                                                <span class="fw-light text-danger"> @error('company_name') {{ $message }}@enderror </span>
                                            </div>
                                            <div class="col-md-6 pr-0 pl-1">
                                                <div class="form-group border border-secondary bg-white pl-0">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Company name (kana) </label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="company_name_kana" value="{{ $company['company_name(kana)'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Register name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="registed_name" value="{{ $company['registed_name'] }}">
                                                </div>
                                                <span class="fw-light text-danger"> @error('registed_name') {{ $message }}@enderror </span>
                                            </div>
                                            <div class="col-md-6 pr-0 pl-1">
                                                <div class="form-group border border-secondary bg-white pl-0">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Register name (kana) </label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="registed_name_kana" value="{{ $company['registed_name(kana)'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> City <span class="text-danger">*</span></label>
                                                    <select class="form-control px-2 " name="city" id="city">
                                                    <label class="control-label text-black-50 px-2 mb-0 "> Area intends to recuit <span class="text-danger">*</span></label>
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
                                            <div class="col-md-6 pr-1 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Room </label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="room" value="{{ $company['room'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0 pl-1">
                                                <div class="form-group border border-secondary bg-white pl-0">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Building </label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="building" value="{{ $company['building'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Zipcode <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="zipcode" value="{{ $company['zipcode'] }}">
                                                </div>
                                                <span class="fw-light text-danger"> @error('zipcode') {{ $message }}@enderror </span>
                                            </div>
                                            <div class="col-md-6 pr-0 pl-1">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> HP URL <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="hp_url" value="{{ $company['hp_url'] }}">
                                                </div>
                                                <span class="fw-light text-danger"> @error('hp_url') {{ $message }}@enderror </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pr-1 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1" >
                                                    <label class="control-label text-black-50 px-2 mb-0"> Area intends to recuit <span class="text-danger">*</span></label>
                                                    <select class="form-control " multiple name="area[]" id="area">
                                                        @foreach($areas as $area)
                                                            <option value="{{ $area['name'] }}"> {{ $area['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span class="fw-light text-danger"> @error('area') {{ $message }}@enderror </span>
                                            </div>
                                            <div class="col-md-6 pr-0 pl-1">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Career <span class="text-danger">*</span></label>
                                                    <select class="form-control" multiple name="career[]" id="career">
                                                        @foreach($careers as $career)
                                                            <option value="{{ $career['career_name'] }}"> {{ $career['career_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span class="fw-light text-danger"> @error('career') {{ $message }}@enderror </span>
                                            </div>
                                        </div>
                                        <div class="information mb-2">
                                            <b> Contact information </b>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-4 pr-1 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Contact name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="contact_name" value="{{ $company['contact_name'] }}">
                                                </div>
                                                <span class="fw-light text-danger"> @error('contact_name') {{ $message }}@enderror </span>
                                            </div>
                                            <div class="col-md-4 pr-1 pl-1">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Phone <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="phone_number" value="{{ $company['phone_number'] }}">
                                                </div>
                                                <span class="fw-light text-danger"> @error('phone_number') {{ $message }}@enderror </span>
                                            </div>
                                            <div class="col-md-4 pr-0 pl-1">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> Email <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-md border-0 px-2" name="email" value="{{ $company['email'] }}">
                                                </div>
                                                <span class="fw-light text-danger"> @error('email') {{ $message }}@enderror </span>
                                            </div>
                                        </div>
                                        <div class="information mb-2">
                                            <b> Other </b>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-6 pl-0">
                                                <div class="form-group border border-secondary bg-white pl-0 mb-1">
                                                    <label class="control-label text-black-50 px-2 mb-0"> The reason for knowing Greff</label>
                                                    <select class="form-control px-2 " name="other" id="other">
                                                        <option> </option>
                                                        @foreach($others as $other)
                                                            <option value="{{ $other['id'] }}"> {{ $other['content'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <div class="col-md-12 form-group border border-secondary bg-white pl-0 mb-1">
                                                <label class="control-label text-black-50 px-2 mb-0"> Note </label>
                                                <textarea type="text" class="form-control form-control-md border-0 px-2" name="note" value="{{ $company['note'] }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-end">
                                            <div class="col-md-3 ml-0">
                                                <a class="btn btn-secondary text-light" href="{{ route('formManagementCompany') }}"> CANCEL </a>
                                                <button type="submit" class="btn btn-info ml-3 text-light"> SAVE </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                    <form action="{{ route('listAccounts') }}" method="get">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th > ID </th>
                                                    <th class="col-md-4"> Name </th>
                                                    <th class="col-md-4"> Email </th>
                                                    <th class="col-md-1"> Status </th>
                                                    <th class="col-md-2"> Created date </th>
                                                    <th>  </th>
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
                                                            <div class="btn border-0 p-1" id="deleteAccount" onclick="return confirm('Are you sure you want to delete this?')">
                                                                <i class="mdi mdi-delete" style="font-size: 25px; color:red"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                    <div class="modal fade" id="registerUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-0 border-dark">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalCenterTitle"> Register user </h3>
                                                    <div type="button" class="close" id="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style='font-size:30px'>&times;</span></div>
                                                </div>
                                                <form action="{{ url('/updateCompany/registerUser',$company['id']) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body mx-4">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                                                                <label class="control-label text-black-50 mb-0"> Name <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control form-control-md border-0 pl-0" name="name" value="{{ old('name') }}">
                                                            </div>
                                                            <span class="fw-light text-danger mb-1" id="nameError">  </span>
                                                            <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                                                                <label class="control-label text-black-50 mb-0"> Login email <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control form-control-md border-0 pl-0" name="login_email" value="{{ old('login_email') }}">
                                                            </div>
                                                            <span class="fw-light text-danger mb-1" id="login_emailError">  </span>
                                                            <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                                                                <label class="control-label text-black-50 mb-0"> Password <span class="text-danger">*</span> </label>
                                                                <input type="password" class="form-control form-control-md border-0 pl-0" name="password" value="">
                                                            </div>
                                                            <span class="fw-light text-danger mb-1" id="passwordlError">  </span>
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
        function showFormEditAccount(accId) {
            $.ajax({
                url: "{{ route('formEditAccount_Company') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: accId,
                },
                success: function (data) {
                    $('#editAccount').find('#content').html(data);
                },
            });
        }

        $('#title1').css({
            color: "#3b8f99",
            borderBottom: "4px solid #3b8f99"
        });
        $('#general_information').css({
            display: 'block'
        });
        $('#login_account').css({
            display: 'none'
        });
        $('#title1').on('click', function(){
            $('#title1').css({
                color: "#3b8f99",
                borderBottom: "4px solid #3b8f99"
            });
            $('#title2').css({
                color: "black",
                borderBottom: "none"
            });
            $('#general_information').css({
                display: 'block'
            });
            $('#login_account').css({
                display: 'none'
            });
        });
        $('#title2').on('click', function(){
            $('#title2').css({
                color: "#3b8f99",
                borderBottom: "4px solid #3b8f99"
            });
            $('#title1').css({
                color: "black",
                borderBottom: "none"
            });
            $('#general_information').css({
                display: 'none'
            });
            $('#login_account').css({
                display: 'block'
            });
        });

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
            $('#area').filterMultiSelect({
                selectAllText: 'Select all',
                placeholderText: ' ',
                filterText: 'Search',
                caseSensitive: true
            });
            $('#career').filterMultiSelect({
                selectAllText: 'Select all',
                placeholderText: ' ',
                filterText: 'Search',
                caseSensitive: true
            });
        });
        $('table').on('click', 'input[type="button"]', function(e){
            $(this).closest('tr').remove()
        })
    </script>
@endpush
