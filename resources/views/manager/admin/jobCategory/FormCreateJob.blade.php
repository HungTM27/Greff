<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Thêm Nghề</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<!-- Modal body -->
<div class="modal-body">
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <form action="{{ url('/admin/job-category') }}" method="post" id="main_form" data-url="{{ url('/admin/job-category') }}">
        @csrf
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent_id</label>
            <select class="form-select" aria-label="Default select example" name="parent_id">
                <option value="0" selected>select parent</option>
                @php
                \App\Models\Career::showCategories($jobcategory)
                    @endphp
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Career name</label>
            <input type="text" class="form-control" name="career_name" id="career_name" aria-describedby="emailHelp">
            <span class="text-danger error-text career_name_error"></span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">descride</label>
            <input type="text" class="form-control" name="describe" id="describe">
            <span class="text-danger error-text describe_error"></span>
        </div>

        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    </form>
</div>
<?php
//function showCategories($jobcategory, $parent_id = 0, $char = '')
//{
//    foreach ($jobcategory as $key => $item)
//    {
//        // Nếu là chuyên mục con thì hiển thị
//        if ($item['parent_id'] == $parent_id)
//        {
//            echo '<option value="'.$item->id.'">'.$char.$item->career_name.'</option>';
//            unset($jobcategory[$key]);
//            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
//            showCategories($jobcategory, $item->id, $char.'&nbsp&nbsp&nbsp&nbsp');
//        }
//    }
//}
//?>
