
    <div class="container">
        <div class="main-content p-5">
            <h2>Create Skill</h2>
            <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input  class="form-control border border-2  text-dark" name="skil_name">
                        @error('skil_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    <br>
                    <label for="exampleFormControlInput1" class="form-label">Desciption</label>
                    <input type="text" class="form-control border border-2  text-dark" name="desciption" rows = "3">
                        @error('desciption')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <button type="submit" class="btn btn-md btn-success" name="create"><i class="fa fa-user-plus"></i>Create</button>
            </form>
        </div>
    </div>
    {{-- <script>
        $(function () {
            $("#newModalForm").validate({
                rules: {
                    pName: {
                        required: true,
                        minlength: 8
                    },
                    action: "required"
                },
                messages: {
                    pName: {
                        required: "Please enter some data",
                        minlength: "Your data must be at least 8 characters"
                    },
                    action: "Please provide some data"
                }
            });
            });
    </script> --}}
