@extends('admin.master')

@section('content')

<h2>Update Category : <b class="text-primary">{{ $category->name }}</b></h2>

@include('admin.error')

<form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
    @csrf
    @method('put')
<div class="mb-3">
    <input type="text" name="name" class="form-control"
    value="{{ old('name' , $category->name) }}" placeholder="Name Category">
    @error('name')
            <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<button class="btn btn-primary">Update</button>
</form>

@endsection
