@extends('layouts.dashboard')
@section('content')
    <div class="container py-5" style="max-width: 700px">

        <div class="text-center">
            <h2><u>New Article</u></h2>
        </div>

        <div class="row p-2">
            <div class="card w-100 rounded-lg p-2">
                <div class="card-body">
                    <form action="/article" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                            @error('title')
                                <p class="text-warning">{{ $message}}</p>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="link">Tableau link:</label>
                            <input type="text" class="form-control" id="link" placeholder="Enter Link" name="link">
                            @error('link')
                                <p class="text-warning">{{ $message}}</p>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="content">Article content:</label>
                            <textarea class="form-control" rows="5" id="content" name = "content"></textarea>
                            @error('content')
                                <p class="text-warning">{{ $message}}</p>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name = "category" id = "category" class="form-control" >
                                @foreach ($category_data as $Category) 
                                    <option value="{{ $Category->id }}">  
                                        {{ $Category->name }}  
                                    </option> 
                                @endforeach 
                            </select>
                            @error('category')
                                <p class="text-warning">{{ $message}}</p>
                            @enderror
                        </div>
                
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label">Select a file to upload:</label>
                            <div class="col-md-6">
                                <input id="file" type="file" name="file" value="{{ old('file') }}">
                                @error('file')
                                    <p class="text-warning">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col text-right">
                                <a href="/my_articles" class="btn btn-secondary">Cancel</a>
                            </div>
                            <div class="col text-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection