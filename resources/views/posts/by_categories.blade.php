@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <br>
        <div class="d-flex justify-content-center">
            <h2>{{ $category->name }}</h2>
        </div>
        <hr>
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-sm-4 d-flex align-items-stretch">
                    <div class="card my-3 w-100 rounded-lg">
            
                        <div class="card-body">
                            <p class="card-text">{{ date('j F, Y', strtotime($post->created_at)) }}</p>
                            <a href="{{route('posts.show', $post->id)}}" class="stretched-link"><h5 class="card-title"><b>{{ $post->title }}</b></h5></a>
                            <p class="card-text">By {{ $post->user->name }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <h5>There are no articles!</h5>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection