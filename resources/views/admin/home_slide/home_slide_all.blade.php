@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <div class="page-content">
    <div class="container-fluid">

       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('update.slider')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{$homeslide->id}}">

                        <h4 class="card-title">Home Slider Option</h4>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="title" value="{{$homeslide->title}}" id="example-text-input">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="short_title" type="text" value="{{$homeslide->short_title}}" id="example-text-input">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="video_url" type="text" value="{{$homeslide->video_url}}" id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="home_slide" type="file" id="image">
                            </div>
                        </div>


                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="card-img-top img-fluid" src="{{(!empty($homeslide->home_slide)) ? url($homeslide->home_slide):url('upload/nophoto.jpg')}}" style="width: 200px" alt="Card image cap" id="showImage">
                            </div>
                        </div>

                        <input type="submit" value="Update Slider" class="btn btn-success">
                        <!-- end row -->
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
