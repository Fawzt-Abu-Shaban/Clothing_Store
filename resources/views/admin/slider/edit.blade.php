@extends('admin.master')

@section('content')

<h2>Update Slider : <b class="text-primary">{{ $slider->name }}</b></h2>

@include('admin.error')

<form action="{{ route('admin.sliders.update' , $slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<div class="mb-3">
    <input type="text" name="name" value="{{old('name',$slider->name)}}" class="form-control" placeholder="Name Product">
    @error('name')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="price" value="{{old('price' , $slider->price)}}" class="form-control" placeholder="Price">
    @error('price')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    <img width="70" src=" {{ asset('slider/'.
            $slider->image) }} " alt="">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <textarea name="discription"  rows="5" class="form-control" placeholder="Discription">
        {{ old('discription' , $slider->discription) }}
    </textarea>
    @error('discription')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Discount</label>
    <select name="discount_id" class="form-control">
        <option value=""> Select Discount</option>
        @foreach ($discount as $dis)
            <option value="{{ $dis->id }}">{{ $dis->percentage.'% '.$dis->name}}</option>
        @endforeach
     </select>
</div>

<button class="btn btn-primary">Update</button>
</form>

@endsection
