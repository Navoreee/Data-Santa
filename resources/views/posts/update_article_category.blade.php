@extends('layouts.dashboard')
@section('content')
    <div class="container py-5" style="max-width: 700px">

        <div class="text-center">
            <h2><u>Edit Article</u></h2>
        </div>

        <div class="row p-2">
            <div class="card w-100 rounded-lg p-2">
                <div class="card-body">
                    <form action="/admin/articles/category_update/{{$post->id}}" method="POST">
                        @csrf
                        <h5>Title: <span class="text-dark">{{$post->title}}</span></h5>
                        <br>
                        <p>Content:</p>
                        <textarea class="form-control rounded-0 border-0" style="resize: none;" rows="20" readonly>{{ $post->content }}</textarea>
                        <br>
                        <label for="category">Category:</label>
                        <select name = "category" id = "category" class="form-control">
                            <option value="{{$post->category_id}}">{{$post->category->name}}</option>
                            @foreach ($category_data as $category)
                                @if ($category->id != $post->category->id)
                                    <option value="{{ $category->id }}">  
                                    {{ $category->name }}  
                                    </option>
                                @endif 
                            @endforeach 
                        </select>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection