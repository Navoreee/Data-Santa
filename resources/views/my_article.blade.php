@extends('layouts.dashboard')
@section('content')
    <div class="container py-5" style="max-width: 700px">
        <div class="row py-2">
            <div class="col">
                <h2><u>My Articles</u></h2>
            </div>
            <div class="col text-right">
                <a href="/article" class="btn btn-primary">+ Create new article</a>
            </div>
        </div>
        @forelse($articles as $article)
            <div class="row p-2">
                <div class="card w-100 rounded-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <a href="{{route('posts.show', $article->id)}}" class="stretched-link"><h5 class="card-title"><b>{{ $article->title }}</b></h5></a>
                            </div>
                            <div class="col-3 text-right">
                                
                                @if ($article->status_id == 2)
                                    <p class="text-primary">{{ $article->status->name }}</p>
                                @elseif ($article->status_id == 3)
                                    <p class="text-warning">{{ $article->status->name }}</p>
                                @else
                                    <p>{{ $article->status->name }}</p>
                                @endif
                            </div>
                        </div>
                        <p class="card-text">{{ date('j F, Y', strtotime($article->created_at)) }}</p>
                        <div class="col p-0 text-truncate">
                            {{ $article->content }}
                        </div>
                    </div>
                </div>
            </div>
            
        @empty
            <p>You haven't made any articles yet!</p>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
@endsection