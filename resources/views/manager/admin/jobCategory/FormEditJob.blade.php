<!-- Modal Header -->
<form action="{{ url('/admin/job-category-update',$job->id) }}" method="post" id="edit_form" data-url="{{ url('/admin/job-category-update',$job->id) }}">
    <div class="modal-header">
        <h4 class="modal-title">Sửa nghề</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        <div class="alert alert-danger print-error-msg-edit" style="display:none">
            <ul></ul>
        </div>
        @csrf
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent_id</label>
            <select class="form-select" aria-label="Default select example" name="parent_id_edit">
                <option value="0" selected>select parent</option>
                <?php showCategories($jobcategory,$job) ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Career name</label>
            <input type="text" class="form-control" name="career_name_edit" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $job->career_name }}" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">descride</label>
            <input type="textarea" class="form-control" name="describe_edit" id="describe" value="{{ $job->describe}}">
        </div>
        <button type="submit" class="btn btn-primary" onclick="">Submit</button>

    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    </div>
</form>
<?php
function showCategories($jobcategory,$job, $parent_id = 0, $char = '')
{
    foreach ($jobcategory as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            $selected='';
            if($item->id==$job->parent_id){
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
<script src="{{asset('js/main.js')}}">
</script>
