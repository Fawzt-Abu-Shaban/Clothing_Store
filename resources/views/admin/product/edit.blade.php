@extends('admin.master')

@section('content')

<h2>Update Product : <b class="text-primary">{{ $product->name }}</b></h2>

@include('admin.error')

<form action="{{ route('admin.products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<div class="mb-3">
    <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control" placeholder="Name Product">
    @error('name')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="price" value="{{old('price' , $product->price)}}" class="form-control" placeholder="Price">
    @error('price')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    <img width="70" src=" {{ asset('images/'.
            $product->image) }} " alt="">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <label>Album</label>
    <input type="file" name="album[]" multiple class="form-control">
    <img width="70" src="{{ asset('images/'.$product->album) }}" alt="">
    @error('album')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="quantity" value="{{old('quantity' , $product->quantity)}}" class="form-control" placeholder="Quantity">
    @error('quantity')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="serial_number" value="{{old('serial_number',$product->serial_number)}}" class="form-control" placeholder="serial_number">
    @error('serial_number')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <textarea name="discription"  rows="5" class="form-control" placeholder="Discription">
        {{ old('discription' , $product->discription) }}
    </textarea>
    @error('discription')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <select class="form-control" name="categorie_id">
        <option value="{{ $product->categorie->id }}" selected disabled>{{ $product->categorie->name }}</option>
        @foreach ($categorie as $cat)
            <option value="{{ $cat->id }}">{{$cat->name }}</option>
        @endforeach
    </select>
    @error('categorie_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<h3>Discount</h3>

<div class="mb-3">
    <select name="discount_id" class="form-control">
        <option value=""> Select Discount</option>
        @foreach ($discount as $dis)
            <option value="{{ $dis->id }}">{{ $dis->percentage.'% '.$dis->name}}</option>
        @endforeach
     </select>
</div>
<div class="mb-3">
    <input type="number" name="old_price" value="{{old('old_price' , $product->old_price)}}" class="form-control" placeholder="old_price">
</div>

<button class="btn btn-primary">Update</button>
</form>

@endsection
