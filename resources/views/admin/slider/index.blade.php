
@extends('admin.master')

@section('content')

<h2> All Sliders ({{ $slider->count() }})</h2>

@if (session('msg'))
<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
    {{ session('msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<table class="table table-bordered">
    <tr class="bg-dark text-white">
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>IMAGE</th>
        <th>DISCRIPTION</th>
        <th>CREATE AT</th>
        <th>ACTION</th>
    </tr>

    @forelse ($slider as $slid)
 <tr>
        {{-- <td>{{ $slid->id }}</td> --}}
        <td>{{ $loop->iteration }}</td>
        <td>{{ $slid->name }}</td>
        <td>{{ $slid->price }}</td>
        <td><img width="70" src=" {{ asset('slider/'.
            $slid->image) }} " alt=""></td>
        <td>{{ $slid->discription }}</td>
        <td>{{ $slid->created_at->diffForHumans() }}</td>
        <td>
            <a href="{{ route('admin.sliders.edit' , $slid->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form class="d-inline" action="{{ route('admin.sliders.destroy' , $slid->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm"
             onclick="return confirm('هل انت متاكد ي بني')">delete</button>
            </form>
        </td>
    </tr>
    @empty
        <tr>
            <td colspan="8">No Data</td>
        </tr>
    @endforelse


</table>

{{ $slider->links() }}

@endsection
