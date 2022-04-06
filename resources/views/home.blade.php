@extends('layouts.app')

@section('content')

<div
    class="container-fluid bg-primary"
    style="s
        min-height: 300px;
        background-image: url('{{ asset('storage/banner_img.svg') }}');
        background-repeat: no-repeat;
        background-position: center;
    "
>
    <div class="container h-100 py-5">
        <div class="row justify-content-center">
            <div class="col-7">
                <h1 class="text-center text-white">Welcome to Data Santa. To satisfy all your research needs.</h1>
            </div>
        </div>
        <div class="row justify-content-center pt-3">
            <a class="btn btn-info btn-lg" href="{{ route('latest') }}" role="button">View our articles</a>
        </div>
    </div>
</div>

<div class="container">
    <br>
    <div class="d-flex justify-content-center">
        <h2>Published Articles</h2>
    </div>
    <hr>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-sm-4 d-flex align-items-stretch">
                <div class="card my-3 rounded-lg w-100">
                    <div class="card-body">
                        <p class="card-text">{{ date('j F, Y', strtotime($post->created_at)) }}</p>
                        <a href="{{route('posts.show', $post->id)}}" class="stretched-link"><h4 class="card-title"><b>{{ $post->title }}</b></h4></a>
                        <p class="card-text">By {{ $post->user->name }}</p>
                    </div>
                </div>
            </div>
        @empty
            <h5>There are no articles!</h5>
        @endforelse
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <a href="{{ route('latest') }}" class="btn btn-info btn-lg">See all articles ></a>
    </div>
</div>
@endsection
