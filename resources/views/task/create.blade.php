@extends('layout.master')
@section('title', 'Add Task')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>ADD- <span style="color:green">Tasks</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form action="{{route('createtask')}}" method="POST">
      @csrf
      <label for=""class="mb-2">Name:</label>
      <input type="text" class="form-control" name="input_name" required>
      <label for=""class="mb-2">Description:</label>
      <input type="text" class="form-control" name="input_descrip" required>
      <label for=""class="mb-2">Markdwon Description:</label>
      <input type="text" class="form-control" name="input_mark" required>
      <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection