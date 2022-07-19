
<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Confirmation</h4>
</div>

<!-- Modal body -->
<div class="modal-body">
    <div class="row" id="image_preview_confirm">
        @if(isset($image_occupation))
            @foreach($image_occupation as $key=>$val)
                <div class='col-md-4 delete-image-cl' id='cf_image{{$key+1}}' onclick='deleteimagecf(this)'>
                    <div>
                        <img class='me-3' src='{{asset("uploads/$val->name")}}' alt=''  width='150' height='90' id='img_confirm_{{$key+1}}'>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div class="row mb-2">
    <div class="col-4">
        Job category
    </div>
    <div class="col-8" id="job_category_confirm">

    </div>
</div>

<div class="row mb-2">
    <div class="col-4">
        Title
    </div>
    <div class="col-8" id="title_confirm">

    </div>
</div>

<div class="row mb-2">
    <div class="col-4">
        Description
    </div>
    <div class="col-8" id="description_confirm">

    </div>
</div>

<div class="row mb-2">
    <div class="col-4" >
        Speciality
    </div>
    <div class="col-8" id="speciality_confirm">

    </div>
</div>

<div class="row mb-2">
    <div class="col-4">
        Note
    </div>
    <div class="col-8" id="note_confirm">

    </div>
</div>

<div class="row mb-2">
    <div class="col-4">
        Bring items
    </div>
    <div class="col-8" id="bring_item_confirm">

    </div>
</div>

<div class="row mb-2">
    <div class="col-4">
        Required
    </div>
    <div class="col-8" id="required_confirm">

    </div>
</div>


<!-- Modal footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
    <button  type="submit" class="btn btn-primary" id="submitform" data-bs-dismiss="modal">SAVE</button>
    <button type="button" class="btn bg-warning text-white" data-bs-dismiss="modal" onclick="$('#submitform').click()">
        CREATE JOB NOW</button>
</div>

