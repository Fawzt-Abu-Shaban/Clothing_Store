@extends('admin.master')

@section('content')

<h2>Update Discount : <b class="text-primary">{{ $discount->name }}</b></h2>

@include('admin.error')

<form action="{{ route('admin.discounts.update',$discount->id) }}" method="POST">
    @csrf
    @method('put')
<div class="mb-3">
    <input type="text" name="name" class="form-control"
    value="{{ old('name' , $discount->name) }}" placeholder="Name discount">
    @error('name')
            <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="datetime-local" name="start_date" class="form-control"
    value="{{ old('start_date' , date('Y-m-d\TH:i', strtotime($discount->start_date))
    ) }}" placeholder="Start Date">
    @error('start_date')
            <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="datetime-local" name="end_date" class="form-control"
    value="{{ old('end_date' , date('Y-m-d\TH:i', strtotime($discount->end_date))
    ) }}" placeholder="End Date">
    @error('end_date')
            <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="percentage" class="form-control"
    value="{{ old('percentage' , $discount->percentage) }}" placeholder="Percentage">
    @error('percentage')
            <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <input type="text" name="customers" class="form-control"
    value="{{ old('customers' , $discount->customers) }}" placeholder="Customers">
</div>
<button class="btn btn-primary">Update</button>
</form>

@endsection
