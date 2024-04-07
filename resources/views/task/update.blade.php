@extends('layout.master')
@section('title', 'Tasks')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Update- <span style="color:green">Tasks</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form action="{{route('simpan_task', $tasks->id)}} " method="POST">
      @csrf
      @method('PUT')
      <input type="text" class="form-control" name="id" style="background:#f5f5f5;" value="{{$tasks->id}}" readonly hidden>

      <label for="" class="mb-2">Tasks ID:</label>
      <input type="text" class="form-control" name="id_tasks" style="background:#f5f5f5;" value="{{$tasks->id_tasks}}" readonly>

      <label for="" class="mb-2 mt-2">Name Task:</label>
      <input type="text" class="form-control" name="input_name" value="{{$tasks->name}}" required>

      <label for="" class="mb-2 mt-2">Description:</label>
      <input type="text" class="form-control" name="text_content" value="{{$tasks->text_content}}" required>

     <!--  <label for="" class="mb-2 mt-2">Description Content:</label>
      <input type="text" class="form-control" name="description" value="{{$tasks->description}}" required> -->


      <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection