@extends('layouts.app')

@section('content')
    <div
        class="container-fluid bg-primary"
        style="s
            min-height: 300px;
            background-repeat: no-repeat;
            background-position: center;
        "
    >
        <div class="h-100 py-5 d-flex justify-content-center">
            <div class="row justify-content-left" style="width: 1450px">
                <div class="col">
                    <h1 class="text-left text-dark">{{ $post->title }}</h1>
                    <br>
                    <p class="text-left text-white" style="font-size: 20px">By {{ $post->user->name }} - <i>{{ date('j F, Y', strtotime($post->created_at)) }}</i></p>
                    <p class="text-left text-white">Category: {{ $post->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
    @if(isset(Auth::user()->id) && (Auth::user()->role == 1))
        @if ($post->status_id == 1)
            <div class="alert alert-danger text-center" role="alert">
                <h4>Please verify this article.</h4>
                <form action="/admin/verification/{{ $post->id }}" method="POST">
                    @csrf
                    <input type="hidden" name='action' value=2>
                    <button class="btn btn-secondary" type="submit">Accept</button>
                </form>
                <form action="/admin/verification/{{ $post->id }}" method="POST">
                    @csrf
                    <input type="hidden" name='action' value=3>
                    <button class="btn btn-secondary" type="submit">Reject</button>
                </form>
            </div>
        @endif
    @endif
    <br>
    <div class="d-flex justify-content-center py-4">
        <div class="row w-100" style="max-width: 1450px">
            <div class="col-7">
                <iframe class="shadow-sm" width="100%" height="100%" src="{{ $post->tableau_link }}" frameborder="1" allowfullscreen></iframe>
            </div>
            <div class="col-5">
                <textarea class="form-control rounded-0 border-0" style="resize: none; font-size:16px" rows="20" readonly>{{ $post->content }}</textarea>
            </div>
        </div>
    </div>
@endsection