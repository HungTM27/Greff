@extends('manager.layouts.app')
@section('title', 'Skills')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-5">
                    <h3>List Skill</h3>
                    <button type="button" class="btn btn-success" style="width:100px ;" data-toggle="modal"
                            data-target="#myModal">
                        <i class="fa fa-user-plus"></i> Create
                    </button>
                    @if(Session::has('success'))
                        <div class="alert mt-2 {{  Session::get('alert-class', 'alert-success') }}">
                            {{ session("success") }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <table class="table table-striped table-hover mt-3">

                            <tr>
                                <th>ID</th>
                                <th>Skill Name</th>
                                <th>Desciption</th>
                                <th></th>
                            </tr>
                            @foreach($skills as $skill)
                                <tr>
                                    <td>{{ $skill->id }}</td>
                                    <td>{{ $skill->skil_name }}</td>
                                    <td>{{ $skill->desciption}}</td>
                                    <td>
                                        <button class=" btn btn-primary" type="button" data-toggle="modal"
                                                data-target="#modalEdit{{$skill->id}}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <div class="modal" id="modalEdit{{$skill->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        @include('manager.admin.skills.editSkill')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{-- <div class="d-flex justify-content-center">{!!$skills->links()!!}</div> --}}
                    <div class="container">
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        @include('manager.admin.skills.createSkill')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                id="close">Close
                                        </button>
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
        $("#close").on('click', function () {
            document.getElementById("myModal").style.display = "none";
        });
    </script>
@endpush

