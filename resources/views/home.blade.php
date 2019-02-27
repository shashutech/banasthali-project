@extends('outline')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <th>Title</th>
                                <th>Published On</th>
                                <th></th>
                                <th></th>
                            </thead>
                            @foreach($posts->reverse() as $post)
                                <tbody>
                                    <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                                    <td>{{date('d/m/Y h:m:i a', strtotime($post->created_at))}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a></td>
                                    <td>
                                        <form action="{{action('PostsController@destroy', ['id' => $post->id])}}" method="POST" id="deleteForm">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete" class="btn btn-danger" id="">
                                                {{csrf_field()}}
                                        </form>
                                    </td>
                                </tbody>
                            @endforeach
                        </table>

                        @else
                            <p>{{__('You Have No Posts')}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
