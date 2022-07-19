@extends('manager.layouts.app')
@section('title', 'Stores')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <form method="get" action="{{ route('formManagementStore') }}">
                    @csrf
                    <div class="card-body pb-5">
                        <div class="d-flex justify-content-between">
                            <p class="card-title" style="font-size:20px"> List Store </p>
                            <a type="button" class="btn bg-info" href="{{ route('formAddStore') }}"><i class="ti-plus text-white"></i></a>
                        </div>
                        <input type="text" class="form-control col-md-4 px-2 mb-3" placeholder="Search by keyword" id="search" name="search">
                        <div class="d-flex justify-content-between my-3">
                            <b> Total: {{ $count }} </b>
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
                                    <th> Store name </th>
                                    <th> Person in charge </th>
                                    <th> Address </th>
                                    <th> Status </th>
                                    <th> Created date </th>
                                    <th>  </th>
                                </tr>
                                </thead>
                                @foreach($stores as $store)
                                    <tbody class="alldata">
                                    @if($store['status'] == 0)
                                        <tr style="background-color: rgba(232,231,231,0.76)">
                                    @else
                                    <tr>
                                    @endif
                                        <td> {{ $store['id'] }} </td>
                                        <td> {{ $store['store_name'] }} </td>
                                        <td> Name: {{ $store['contact_name'] }} <br>
                                            Phone: {{ $store['phone_number'] }} <br>
                                            Email: {{ $store['email'] }}
                                        </td>
                                        <td> {{ $store['address'] }} </td>
                                        <td> @if($store['status'] == 1) Enable @else Disable @endif </td>
                                        <td> {{ $store['created_at'] }} </td>
                                        <td style="text-align:center">
                                            <a type="button" class="btn border-0 p-0" href="{{url('company/editStore', $store->id)}}">
                                                <i class="mdi mdi-pencil-box" style="font-size: 25px"></i>
                                            </a>
                                            <input type="button" id="deleteAccount" hidden="true">
                                            <a class="btn border-0 p-1" onclick="$('#deleteAccount').click()">
                                                <i class="mdi mdi-delete" style="font-size: 25px; color:red"></i>
                                            </a>
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
                url: '{{URL::to('searchStore')}}',
                data: {'search':$value},
                success:function(data){
                    console.log(data);
                    $('#content').html(data);
                }
            });
        });
        $('table').on('click', 'input[type="button"]', function(e){
            $(this).closest('tr').remove()
        })
    </script>
@endpush
