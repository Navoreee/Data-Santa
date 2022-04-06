@extends('layouts.dashboard')

@section('content')
    <div class="container py-5" style="max-width: 700px">

        <div class="text-center">
            <h2><u>Edit Category</u></h2>
        </div>

        <div class="row p-2">
            <div class="card w-100 rounded-lg p-2">
                <div class="card-body">
                    <form action="/admin/categories/edit/{{$data->id}}" method="POST">
                        {{-- csrf for validate sending request --}}
                        @csrf
                        {{-- Casting method to PUT --}}
                        @method("PUT")
                
                        <input class="form-control" type="text" name="name" value="{{$data->name}}">
                        @error('name')
                            <p class="text-warning">{{ $message}}</p>
                        @enderror
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