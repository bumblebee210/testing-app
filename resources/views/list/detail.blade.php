@extends('layout.master')
@section('title', 'Detail-List')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Detail- <span style="color:green">Lists</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form>
      @csrf
      <label for=""class="mt-2 mb-2">List ID:</label>
      <input type="text" class="form-control" name="input_name" value="{{$list->id}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Name:</label>
      <input type="text" class="form-control" name="input_name" value="{{$list->name}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">OrderIndex:</label>
      <input type="text" class="form-control" name="input_name" value="{{$list->orderindex}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Content:</label>
      <input type="text" class="form-control" name="input_name" value="{{$list->content}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Permission Level:</label>
      <input type="text" class="form-control" name="input_name" value="{{$list->permission_level}}" style="background-color: #ebebeb;" readonly>
      <a href="{{route('list')}}">
        <button type="button" class="btn btn-primary mt-3 float-end col-3">Kembali</button>
      </a>
      
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection