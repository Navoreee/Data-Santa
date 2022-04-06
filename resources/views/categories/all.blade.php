@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="container py-4">
            <div class="d-flex justify-content-center">
                <h2>Categories</h2>
            </div>
            <hr>
            <div class="row">
                @forelse ($categories as $key => $category)
                    <div class="col-sm-4 d-flex align-items-stretch">
                        <div class="card my-3 text-center bg-primary border-0 w-100 rounded-lg">
                
                            <div class="card-body">
                                <a href="/category/{{ $category->id }}" class="stretched-link"><h4 class="card-title"><b>{{ $category->name }}</b></h4></a>
                                <p class="card-text text-white">{{ $post_counts[$key] }} Posts</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h5>There is no category!</h5>
                @endforelse
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
@endsection