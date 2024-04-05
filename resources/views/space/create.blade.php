@extends('layout.master')
@section('title', 'Add-Space')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>ADD- <span style="color:green">Space</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form action="{{route('create_space')}}" method="POST">
      @csrf
      <label for=""class="mb-2">Name:</label>
      <input type="text" class="form-control" name="input_name" required>
      <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection