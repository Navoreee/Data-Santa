@extends('layouts.dashboard')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-center">
            <h2>Admin Dashboard</h2>
        </div>
        <div class="bg-white rounded my-2 p-4" style="max-width: 1450px">
            <div class="row border-between">
                <div class="col-2">
                    <div>
                        <a href="/admin/articles"><h5 class="p-2">Articles</h5></a>
                    </div>
                    <div class="bg-primary rounded">
                        <a href="/admin/categories"><h5 class="p-2">Categories</h5></a>
                    </div>
                </div>
                <div class="col-10 px-4">
                    <div class="d-flex justify-content-center">
                        <a href="/admin/categories/create" class="btn btn-primary">+ Create new category</a>
                    </div>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Post Count</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $key => $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $post_counts[$key] }}</td>
                                    <td>
                                        <a href="/admin/categories/edit/{{$category->id}}">Edit</a>
                                        <form action="/admin/categories/delete/{{$category->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn p-0 text-dark">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3">No Categories.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection