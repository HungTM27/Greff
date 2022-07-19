<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" href="https://icons.getbootstrap.com/assets/img/icons-hero.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="main-content p-5">
            <h2>Edit Skill</h2>
            <form action="{{route('skill.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $skill->id }}">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input  class="form-control border border-2 text-dark" name="skil_name" value="{{ $skill->skil_name }}">
                    <label for="exampleFormControlInput1" class="form-label">Desciption</label>
                    <input type="text" class="form-control border border-2  text-dark" name="desciption" rows = "3" value="{{ $skill->desciption }}">
                </div>
                <button class="btn btn-md btn-success" name="update" >Update</button>
            </form>
        </div>
    </div>
</body>
</html>
