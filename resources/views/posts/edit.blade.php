@extends('outline')

@section('title', 'Edit Page')
@section('description', 'This is the edit page for editing your blog posts')
@section('keywords', 'edit post, editing')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-10 mx-auto">
                <div class="card card-body">
                    <h3 class="text-center">Edit Post</h3>
                    
                    <form action="{{action('PostsController@update', ['id' => $post->id])}}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="category" class="form-control" placeholder="Category" value="{{$post->category}}">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" placeholder="Enter Article" id="article-ckeditor">{{$post->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Cover Image</label>
                            <input type="file" class="form-control-file" name="coverImg">
                        </div>
                        <div class="form-group">
                            <input type="text" name="metaTags" class="form-control" placeholder="Meta Tags" value="{{$post->meta_tags}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="metaDescription" class="form-control" placeholder="Meta Description" value="{{$post->meta_description}}">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit Article</button>

                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection