@extends('layouts.dashboard')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-center">
            <h2>Admin Dashboard</h2>
        </div>
        <div class="bg-white rounded my-2 p-4" style="max-width: 1450px">
            <div class="row border-between">
                <div class="col-2">
                    <div class="bg-primary rounded">
                        <a href="/admin/articles"><h5 class="p-2">Articles</h5></a>
                    </div>
                    <div>
                        <a href="/admin/categories"><h5 class="p-2">Categories</h5></a>
                    </div>
                </div>
                <div class="col-10 px-4">
                    <div class="d-flex justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @if ($status == 'published')
                                <a href="/admin/articles" class="btn btn-primary">Published</a>
                            @else
                                <a href="/admin/articles/published" class="btn btn-secondary">Published</a>
                            @endif
                            @if ($status == 'pending')
                                <a href="/admin/articles" class="btn btn-primary">Pending</a>
                            @else
                                <a href="/admin/articles/pending" class="btn btn-secondary">Pending</a> 
                            @endif
                            @if ($status == 'rejected')
                                <a href="/admin/articles" class="btn btn-primary">Rejected</a>
                            @else
                                <a href="/admin/articles/rejected" class="btn btn-secondary">Rejected</a>
                            @endif
                        </div>
                    </div>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width:15%">Author</th>
                                <th scope="col" style="width:45%">Title</th>
                                <th scope="col" style="width:15%">Category</th>
                                <th scope="col" style="width:15%">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        @if ($post->status_id == 2)
                                            <span class="text-primary">Published</span>
                                        @elseif ($post->status_id == 3)
                                            <span class="text-warning">Rejected</span>
                                        @else
                                            Pending
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if ($post->status_id == 1)
                                            <a href="{{route('posts.show', $post->id)}}">Verify</a>
                                        @elseif ($post->status_id == 2)
                                            <a href="/admin/articles/category_update/{{$post->id}}">Edit</a>
                                            <form action="/admin/deleteArticle/{{$post->id}}" method="POST">
                                                @csrf
                                                <button class="btn p-0 text-dark">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5">No articles.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection