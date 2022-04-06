@extends('layouts.app')
@section('content')
    <div class="container py-5" style="max-width: 700px">
        <div class="d-flex justify-content-center">
            <h4>Showing results for "{{ $query }}"</h4>
        </div>
        <hr>
        @forelse($posts as $post)
            <div class="row p-2">
                <div class="card w-100 rounded-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{route('posts.show', $post->id)}}" class="stretched-link"><h5 class="card-title"><b>{{ $post->title }}</b></h5></a>
                            </div>
                        </div>
                        <p class="card-text">By {{ $post->user->name }} - {{ date('j F, Y', strtotime($post->created_at)) }}</p>
                        <div class="col p-0 text-truncate">
                            {{ $post->content }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No matches.</p>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection