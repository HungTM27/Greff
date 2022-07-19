@extends('manager.layouts.app')
@section('title', 'Job-category')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body pb-5">
                <div class="d-flex justify-content-between">
                    <p class="card-title" style="font-size:20px"> List Job Category </p>
                    <div class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="ti-plus text-white"></i></div>
                </div>
                <div class="">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <th class="col-md-3"> Job Category</th>
                        <th class="col-md-6"> Describe</th>
                        <th class="col-md-1"></th>
                        </thead>
                        <tbody>
                        @foreach($jobcategory as $row)
                            <tr>
                                <td>{{ $row->career_name }}</td>
                                <td>{{ $row->describe }}</td>
                                <td>
                                    <div class="btn " data-bs-toggle="modal"
                                         data-bs-target="#myModalEdit"
                                         onclick="showFormEditJob({{ $row->id }})"><i
                                            class="mdi mdi-pencil-box" style="font-size: 25px"></i>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal create -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('manager.admin.jobCategory.FormCreateJob')
        </div>
    </div>
</div>
<!-- The Modal edit -->
<div class="modal" id="myModalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
@endsection
@push('scripts-custom')
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- App scripts -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

        function showFormEditJob(jobId) {
            $.ajax({
                url: "{{route('formEdit') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    job_id: jobId,
                },
                success: function (data) {
                    $('#myModalEdit').find('.modal-content').html(data);

                }
            });
        }
    </script>
    <script src="{{asset('js/main.js')}}"></script>
@endpush

