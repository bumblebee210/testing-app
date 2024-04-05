@extends('layout.master')
@section('title', 'Update-Space')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Update- <span style="color:green">Space</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form action="{{route('updatespace', $spaces->id)}}" method="POST">
      @csrf
      @method('PUT')
      <label for="" class="mb-2">Space ID:</label>
      <input type="text" class="form-control" name="id" style="background:#f5f5f5;" value="{{$spaces->id}}" readonly>
      <label for="" class="mb-2">name:</label>
      <input type="text" class="form-control" name="input_name" value="{{$spaces->name}}" required>

      <label for="" class="mb-2">color:</label>
      <input type="text" class="form-control" name="input_color" value="{{$spaces->color}}" required>


      <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection