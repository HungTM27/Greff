<!DOCTYPE html>
<html lang="en">
<head>
    <title> Add User </title>
    @include('partials.head')
</head>
<body>
<div class="container">
    <form method="post" action="{{ route('createCareer') }}">
        @csrf
        <div class="row">
            <div class="col-xl-7 col-lg-8 col-md-9 col-sm-9 mx-auto mb-5" >
                <div class="m-5">
                    <div class="row">
                        @if(Session::get('success'))
                        <span class="alert alert-success">
                             {{ Session::get('success') }}
                        </span>
                            @endif
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 mt-3">
                            <div class="form-group mb-3">
                                <label for="name"> Career name <span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control validate mt-1" value="{{ old('name') }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="katakana_name"> katakana_name <span class="text-danger">*</span></label>
                                <input name="katakana_name" type="text" class="form-control validate mt-1" value="{{ old('katakana_name') }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kanji_name"> kanji_name <span class="text-danger">*</span></label>
                                <input name="kanji_name" type="text" class="form-control validate mt-1" value="{{ old('kanji_name') }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="level"> level <span class="text-danger">*</span></label>
                                <input name="level" type="text" class="form-control validate mt-1" value="{{ old('level') }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="parent_id"> parent_id <span class="text-danger">*</span></label>
                                <input name="parent_id" type="text" class="form-control validate mt-1" value="{{ old('parent_id') }}"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-warning text-uppercase col-md-12" name="add"> Add Career </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>

