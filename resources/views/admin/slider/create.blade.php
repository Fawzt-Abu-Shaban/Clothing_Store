@extends('admin.master')

@section('content')

<h2>Add New Slider</h2>

@include('admin.error')

<form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="mb-3">
    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name Slider">
    @error('name')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="Price">
    @error('price')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <textarea name="discription"  rows="5" class="form-control" placeholder="Discription">
        {{ old('discription') }}
    </textarea>
    @error('discription')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Discount</label>
    <select name="discount_id" class="form-control">
        <option value="">Select Discount</option>
        @foreach ($discount as $dis)
            <option value="{{ $dis->id }}">{{ $dis->percentage.'% '.$dis->name}}</option>
        @endforeach
     </select>
</div>

<button class="btn btn-primary">Save</button>
</form>

@endsection
