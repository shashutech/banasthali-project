@extends('outline')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-10 mx-auto">
                <div class="card card-body">
                    <h3 class="text-center">Add Post</h3>
                    <form action="{{action('PostsController@store')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="text" name="category" class="form-control" placeholder="Category">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" placeholder="Enter Article" id="article-ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Cover Image</label>
                            <input type="file" class="form-control-file" name="coverImg">
                        </div>
                        <div class="form-group">
                            <input type="text" name="metaTags" class="form-control" placeholder="Meta Tags" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="metaDescription" class="form-control" placeholder="Meta Description" >
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit Article</button>

                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection