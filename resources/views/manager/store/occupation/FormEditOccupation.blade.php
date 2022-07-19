@extends('manager.layouts.app')
@section('title', 'Companies')
@section('linkcss')
    <link rel="stylesheet" href="https://iqbalfn.github.io/bootstrap-image-checkbox/css/bootstrap-image-checkbox.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
    <style>
        textarea {
            overflow-y: scroll;
        }
        .error{
            color:red;
            display:block;
        }
    </style>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-5">
                    <div class="container">
                        <form action="{{ url("/store/formUpdateOccupation",$occupation->id) }}" enctype="multipart/form-data" id="formOccupation" method="POST">
                            @csrf
                            <div class="fs-3">Detail Occupation</div>
                            <div class="mb-3">
                                <label for="jobcategory" class=" col-sm-12 p-0 mt-3" >Select job category <span class="text-danger">*</span></label>
                                <select class="col-6 m-0" name="id_job_category" id="jobcategory">
                                    <option value="" class="grayy" selected disabled hidden>Select parent</option>
                                    <?php showCategories($jobcategory,$occupation) ?>
                                </select>
                                @error('jobcategory')
                                <div class="text-danger d-block mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Occupation title<span class="text-danger">*</span></label>
                                <input type="textbox" class="form-control" id="title" name="title" value="{{ $occupation->title }}">
                                @error('title')
                                <div class="text-danger d-block mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label p-0">Description<span class="text-danger">*</span></label>
                                <textarea class="form-label col-12" name="description" id="description" rows="3" >{{ $occupation->description }}</textarea>
                                @error('description')
                                <div class="text-danger d-block mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label col-12 p-0">Station</label>
                                <select class="js-example-basic-single col-12" name="station[]" id="station" >
                                    @php
                                        \App\Models\Station::showStation($station)
                                    @endphp
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="work_address" class="form-label col-12 p-0">Work address<span class="text-danger">*</span></label>
                                <input class="col-12" type="textbox" name="work_address" id="work_address" value="{{ $occupation->work_address }}">
                                @error('work_address')
                                <div class="text-danger d-block mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="access_address" class="form-label col-12 p-0">Access address<span class="text-danger">*</span></label>
                                <textarea class="form-label col-12" name="access_address" id="access_address" rows="3">{{ $occupation->access_address }}</textarea>
                                @error('access_address')
                                <div class="text-danger d-block mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <label for="photo" class="">Photo <span class="form-text" style="display: inline"> (please upload at least 3 photos with ratio is 16:9) </span><span class="text-danger">*</span></label>
                                </div>
                                <div class="row" id="image_preview">
                                    @foreach($image_occupation as $key=>$val)
                                        <div class='col-md-3 delete-image-cl' style='position: relative'>
                                            <div class='custom-control custom-checkbox image-checkbox'>
                                                <input type='checkbox' data-stt='{{$key}}' data-count='{{$key+1}}' class='custom-control-input' id='ck1a{{$key+1}}'>
                                                <label class='custom-control-label' for='ck1a{{$key+1}}'>
                                                    <img src='{{asset("uploads/$val->name")}}' alt=''  width='240' height='135'  id='img_{{$key+1}}'>
                                                </label>
                                                <button class='' type='button' style='position: absolute;bottom: 30px;right:20px'>
                                                    <i class='bi bi-pencil-fill'></i>
                                                </button> <button class='' style='position: absolute;bottom: 0px;right:20px' onclick='deleteimage(this,{{$key+1}},{{$key}})'><i class='bi bi-trash-fill'></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="textbox" hidden name="stt_image_delete" id="stt_image_delete">
                                <input type="file" hidden id="upload_file" name="file[]" onchange="preview_image()" multiple >
                                <div>
                                    <button type="button" class="btn btn-success"  onclick="$('#upload_file').click()"><i class="bi bi-upload"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteselectedimg()">X</button>
                                </div>
                                @if(Session::has('file_error'))
                                    <span class="text-danger">
                                 {{Session::get('file_error')}}
                                </span>
                                @endif
                                @error('file')
                                <div class="text-danger d-block mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="speciality" class="form-label col-12 p-0">Speciality</label>
                                <select name="speciality[]" id="speciality" class="js-example-basic-single col-12" >
                                    <option value="即採用">即採用</option>
                                    <option value="残業なし">残業なし</option>
                                    <option value="お祝い金">お祝い金</option>
                                    <option value="まかない">まかない</option>
                                    <option value="高時給">高時給</option>
                                    <option value="駅近">駅近</option>
                                    <option value="服装自由">服装自由</option>
                                    <option value="髪型・カラー自由">髪型・カラー自由</option>
                                    <option value="交通費支給">交通費支給</option>
                                    <option value="バイク通勤OK">バイク通勤OK</option>
                                    <option value="自転車通勤OK">自転車通勤OK</option>
                                    <option value="車通勤OK">車通勤OK</option>
                                    <option value="未経験者歓迎">未経験者歓迎</option>
                                    <option value="正社員登用有">正社員登用有</option>
                                    <option value="長期登用有">長期登用有</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label col-12 p-0">Note</label>
                                <textarea class="form-label col-12" name="note" id="note" rows="3">{{ $occupation->note }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="bring_item" class="form-label col-12 p-0">Bring items</label>
                                <textarea class="form-label col-12" name="bring_item" id="bring_item" rows="3">{{ $occupation->bring_item }}</textarea>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="id_skill_required" class="form-label col-12 p-0">Skill required</label>
                                        <div class="form-group">
                                            <input class="form-label col-12 w-50" type="text" name="id_skill_required[]" id="id_skill_required_0" value="{{isset($skill_required_occuption[0]->text)?$skill_required_occuption[0]->text:""}}">
                                        </div>
                                        <div id="addtextnow">
                                            @foreach($skill_required_occuption as $key=>$row)
                                                @if($key!=0)
                                                    <div class="form-group">
                                                        <input class="form-label col-12 w-50" type="text" name="id_skill_required[]" id="id_skill_required_{{$key+1}}" value="{{$row->text}}">
                                                        <buton type="button" class="btn btn-danger btn-sm" id="delete" onclick="deletetext(this)">X</buton>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <buton type="button" class="btn btn-primary" id="create" onclick="addBox()">+</buton>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 ms-4">
                                    <input class="form-check-input" type="radio" value="1" name="status" id="status1" {{ $occupation->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label p-0 m-0" for="status1">
                                        Enable
                                    </label>
                                </div>
                                <div class="col-6">
                                    <input class="form-check-input" type="radio" value="0" name="status" id="status2" {{ $occupation->status == 0 ? 'checked' : '' }} checked>
                                    <label class="form-check-label m-0" for="status2">
                                        Disable
                                    </label>
                                </div>
                            </div>
                            <div class="d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary text-light me-md-2 col-1"><a href="/store/showCreateOccupation" style="text-decoration: none;color: white;">Cancel</a></button>
                                <button type="button" class="btn btn-primary col-1" data-bs-toggle="modal" data-bs-target="#myModal" onclick="showformcomfirm()">Save</button>
                            </div>
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        @include('manager.store.occupation.formConfirm')
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    function showCategories($jobcategory,$job, $parent_id = 0, $char = '')
    {
        foreach ($jobcategory as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id)
            {
                $selected='';
                if($item->id==$job->id_job_category){
                    $selected='selected';
                }
                echo '<option value="'.$item->id.'"'.$selected.'  >'.$char.$item->career_name.'</option>';
                unset($jobcategory[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($jobcategory,$job, $item->id, $char.'&nbsp&nbsp&nbsp&nbsp');
            }
        }
    }
    ?>
@endsection
@push('scripts-custom')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset("js/jquery.validate.min.js") }}"></script>
    <script>
        @foreach($station_Occuption as $row)
            console.log("{{ $row->name }}")
        @endforeach
    </script>
    @include('manager.store.occupation.script')
@endpush
