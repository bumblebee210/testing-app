@extends('layout.master')
@section('title', 'Space')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Table- <span style="color:green">Space</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form action="{{route('editspace', $spaces->spacesId)}}" method="POST">
      @csrf
      @method('PUT')
      <label for="">name:</label>
      <input type="text" class="form-control" name="input_name" required>

      <label for="">status:</label>
      <input type="text" class="form-control" name="input_status" required>
      <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection