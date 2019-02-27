@extends('outline')

@section('content')

    <div class="container">
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="card card-body my-3">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="img-responsive index-post-coverImg" style="height: 200px;
                            width: 100%;">
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <h4><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h4>
                            <small><i class="fas fa-clock"></i> {{date('d-m-Y', strtotime($post->created_at))}} by {{$post->user->name}} </small>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            {{$posts->links()}}
        @else 
            <p>There are no blog posts !!!</p>
        @endif

    </div>

@endsection