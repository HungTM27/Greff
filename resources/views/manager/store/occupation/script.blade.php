<script>
    {{--select2--}}
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            multiple:true
        });

    });
    //show image
    var count=1
    var img_confirm=[];
    var id_images_delete="";
    console.log(id_images_delete);
    $("#stt_image_delete").val(id_images_delete);
    function preview_image()
    {
        id_images_delete="";
        var file=document.getElementById("upload_file").files;
        var total_file=document.getElementById("upload_file").files.length;
        img_confirm=file;


        $('.delete-image-cl').remove();
        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<div class='col-md-3 delete-image-cl' style='position: relative'><div class='custom-control custom-checkbox image-checkbox'> <input type='checkbox' data-stt='"+i+"' data-count='"+count+"' class='custom-control-input' id='ck1a"+count+"'> <label class='custom-control-label' for='ck1a"+count+"'> <img src='"+URL.createObjectURL(event.target.files[i])+"' alt=''  width='240' height='135'  id='img_"+count+"'> </label> <button class='' type='button' style='position: absolute;bottom: 30px;right:20px'><i class='bi bi-pencil-fill'></i></button> <button class='' style='position: absolute;bottom: 0px;right:20px' onclick='deleteimage(this,"+count+","+i+")'><i class='bi bi-trash-fill'></i></button> </div> </div>");

            $('#image_preview_confirm').append("<div class='col-md-4 delete-image-cl' id='cf_image"+count+"' onclick='deleteimagecf(this)'><div><img class='me-3' src='"+URL.createObjectURL(img_confirm[i])+"' alt=''  width='150' height='90' id='img_confirm_"+count+"'></div></div>");

            count++;
        }
        console.log(id_images_delete);
        $("#stt_image_delete").val(id_images_delete);
    }
    function deleteimage(dele,count,i){
        id_images_delete+=i;
        dele.parentNode.parentNode.remove();
        $("#cf_image"+count).click();
        console.log(id_images_delete);
        $("#stt_image_delete").val(id_images_delete);
    }
    function deleteimagecf(dele){
        dele.remove();
    }
    function deleteselectedimg(){
        $('#image_preview input:checked').each(function() {
            let x = document.getElementById($(this).attr('id'));
            let count=$(this).data("count");
            let stt=$(this).data("stt");
            $("#cf_image"+count).click();
            x.parentNode.parentNode.remove();
            id_images_delete+=stt;
            console.log(id_images_delete);
            $("#stt_image_delete").val(id_images_delete);
        });
    }

    //show form comfirm
    function showformcomfirm(){
        var job_category=$('#jobcategory option:selected').text();
        var title=$('#title').val();
        var description=$("#description").val();
        var speciality = $('#speciality').select2('data');
        // console.log(speciality[1]);
        $("#speciality_confirm").text('');
        $.each(speciality, function(key, value) {
            $("#speciality_confirm").append(value['text']+" ");
        });

        var note=$("#note").val();
        var bring_item=$("#bring_item").val();
        $("#required_confirm").text(" ");
        $("input[type='text']").each(function () {
            $("#required_confirm").append($(this).val(),"</br>");
        })
        $("#job_category_confirm").text(job_category);
        $("#title_confirm").text(title);
        $("#description_confirm").text(description);

        $("#note_confirm").text(note);
        $("#bring_item_confirm").text(bring_item);

        // console.log(data);


    }


    //add and remove textbox
    var counter=1;
    var textBox="";
    var add=document.getElementById('addtextnow')
    function addBox(){
        var div=document.createElement('div');
        div.setAttribute("class","form-group");
        div.setAttribute("id","box_"+counter);

        textBox ='<input class="form-label col-12 w-50" type="text" name="id_skill_required[]" id="id_skill_required_'+counter+'"><buton type="button" class="btn btn-danger btn-sm" id="delete" onclick="deletetext(this)">X</buton>';
        div.innerHTML=textBox;

        add.appendChild(div);
        counter++;
    }
    function deletetext(ele)
    {
        ele.parentNode.remove();
    }


    // validate form on keyup and submit
    // function  validateOccupation(){
    //     $("#formOccupation").validate({
    //         rules: {
    //             title: "required",
                // jobcategory: "required",
                // description: {
                //     required: true,
                // },
                // access_address: "required",
                // work_address: "required",
                // file: {
                //     required: true,
                //     minlength: 3
                // },
                // confirm_password: {
                //     required: true,
                //     minlength: 5,
                //     equalTo: "#password"
                // },
                // email: {
                //     required: true,
                //     email: true
                // },
                // topic: {
                //     required: "#newsletter:checked",
                //     minlength: 2
                // },
                // agree: "required"
            // },
            // messages: {
            //     title: "Please enter title",
                // jobcategory: "Please select job category",
                // description: {
                //     required: "Please enter description",
                // },
                // access_address: "Please enter access address",
                // work_address: "Please enter work address",
                // file: {
                //     required: "Please provide a password",
                //     minlength: "Your password must be at least 5 characters long"
                // },
                // confirm_password: {
                //     required: "Please provide a password",
                //     minlength: "Your password must be at least 5 characters long",
                //     equalTo: "Please enter the same password as above"
                // },
                // email: "Please enter a valid email address",
                // agree: "Please accept our policy",
                // topic: "Please select at least 2 topics"
    //         }
    //     });
    // }


    //
    // function checker_modal() {
    //     validateOccupation();
    //     var error = $(".error").text();
    //     console.log(error);
    //     if (error = '') {
    //         $("#showmodal").onclick;
    //     }
    // }
</script>

