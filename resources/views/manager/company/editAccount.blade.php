<div class="modal-header">
    <h3 class="modal-title" id="exampleModalCenterTitle"> Update user </h3>
    <div type="button" class="close" id="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style='font-size:30px'>&times;</span></div>
</div>
<form action="{{ url('company/updateAccount',$acc['id']) }}" method="post">
    @csrf
    <div class="modal-body mx-4">
        <div class="row">
            <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                <label class="control-label text-black-50 mb-0"> Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control form-control-md border-0 pl-0" name="name" value="{{ $acc['name'] }}">
            </div>
            <span class="fw-light text-danger mb-1"> @error('name') {{ $message }}@enderror </span>
            <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                <label class="control-label text-black-50 mb-0"> Login email <span class="text-danger">*</span> </label>
                <input type="text" class="form-control form-control-md border-0 pl-0" name="login_email" value="{{ $acc['email'] }}">
            </div>
            <span class="fw-light text-danger mb-1"> @error('email') {{ $message }}@enderror </span>
            <div class="col-md-12 form-group border border-secondary bg-white px-2 mb-2">
                <label class="control-label text-black-50 mb-0"> Password <span class="text-danger">*</span> </label>
                <input type="password" class="form-control form-control-md border-0 pl-0" name="password" value="">
            </div>
            <span class="fw-light text-danger mb-1"> @error('password') {{ $message }}@enderror </span>
            <div class="col-md-12 mb-2 d-flex justify-content-start pl-0">
                <div class="form-check form-check-inline pl-0">
                    <input type="radio" name="status" id="inlineRadio1" value="1" @if($acc['status'] == 1) checked @endif>
                    <label for="inlineRadio1"> Enable </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="status" id="inlineRadio2" value="0" @if($acc['status'] == 0) checked @endif>
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
