
@extends('admin.master')

@section('content')

<h2> All Discounts ({{ $discounts->count() }})</h2>

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
        <th>START DATE</th>
        <th>END DATE</th>
        <th>PERCENTAGE</th>
        <th>CUSTOMERS</th>
        <th>CREATE AT</th>
        <th>ACTION</th>
    </tr>

    @forelse ($discounts as $cat)
 <tr>
        {{-- <td>{{ $cat->id }}</td> --}}
        <td>{{ $loop->iteration }}</td>
        <td>{{ $cat->name }}</td>
        <td>{{ $cat->start_date }}</td>
        <td>{{ $cat->end_date }}</td>
        <td>{{ $cat->percentage }} %</td>
        <td>{{ $cat->customers }}</td>
        <td>{{ $cat->created_at->diffForHumans() }}</td>
        <td>
            <a href="{{ route('admin.discounts.edit' , $cat->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form class="d-inline" action="{{ route('admin.discounts.destroy' , $cat->id) }}" method="post">
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

{{ $discounts->render() }}


@endsection
