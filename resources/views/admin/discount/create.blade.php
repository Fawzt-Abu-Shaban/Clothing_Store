@extends('admin.master')

@section('content')

<h2>Add New Discount</h2>

@include('admin.error')

<form action="{{ route('admin.discounts.store') }}" method="POST">
    @csrf
<div class="mb-3">
    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name Discount">
    @error('name')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="datetime-local" name="start_date" value="{{old('start_date')}}" class="form-control" placeholder="Start Date">
    @error('start_date')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="datetime-local" name="end_date" value="{{old('end_date')}}" class="form-control" placeholder="End Date">
    @error('end_date')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="percentage" value="{{old('percentage')}}" class="form-control" placeholder="Percentage">
    @error('percentage')
                <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="customers" value="{{old('customers')}}" class="form-control" placeholder="Customers">

</div>
<button class="btn btn-primary">Save</button>
</form>

@endsection
