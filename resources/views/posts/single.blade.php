@extends('outline')

@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h3>{{$post->title}}</h3>
                <small><i class="fas fa-clock"></i> {{date('d-m-Y', strtotime($post->created_at))}} by {{$post->user->name}}</small>
                <p>{!! $post->body !!}</p>
                
                
                <br> <br>

                @if(!Auth::guest())

                    @if(auth()->user()->id == $post->user_id)
                        {{-- Edit Post --}}
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                        <br>

                        {{-- Delete Post --}}
                        <form action="{{action('PostsController@destroy', ['id' => $post->id])}}" method="POST" id="deleteForm">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger" id="">
                            {{csrf_field()}}
                        </form>
                    @endif

                @endif

                <h2>{{ __('Share This Post..')}}</h2>
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_google_plus"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_copy_link"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card card-body text-white bg-primary">
                    <h4 class="text-center ">{{ __('Category') }} : {{$post->category}}</h4>
                    <p></p>
                </div>
            </div>
            
        </div>
        <div class="row">
            
            @foreach($posts as $spost)
                <div class="col-sm-12 col-md-4">
                    <div class="card card-body">
                        <h4>{{$spost->title}}</h4>
                    </div>
                </div>
            @endforeach
        
        </div>

    </div>

@endsection