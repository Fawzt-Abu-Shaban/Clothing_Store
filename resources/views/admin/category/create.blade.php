@extends('admin.master')

@section('content')

<h2>Add New Category</h2>

@include('admin.error')

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
<div class="mb-3">
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name Category">
    @error('name')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<button class="btn btn-primary">Save</button>
</form>

@endsection
