@extends('layout.master')
@section('title', 'Detail-Space')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Detail- <span style="color:green">Space</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form>
      @csrf
      <label for=""class="mt-2 mb-2">Space ID:</label>
      <input type="text" class="form-control" name="input_name" value="{{$space->id}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Name:</label>
      <input type="text" class="form-control" name="input_name" value="{{$space->name}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Color:</label>
      <input type="text" class="form-control" name="input_name" value="{{$space->color}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Private:</label>
      <input type="text" class="form-control" name="input_name" value="{{$space->private}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Status:</label>
      <input type="text" class="form-control" name="input_name" value="{{$space->statuses}}" style="background-color: #ebebeb;" readonly>
      <a href="{{route('space')}}">
        <button type="button" class="btn btn-primary mt-3 float-end col-3">Kembali</button>
      </a>
      
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection