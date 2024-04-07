@extends('layout.master')
@section('title', 'Detail-Tasks')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Detail- <span style="color:green">Tasks</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form>
      @csrf
      <label for=""class="mt-2 mb-2">Tasks ID:</label>
      <input type="text" class="form-control" name="input_name" value="{{$tasks->id_tasks}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Name Tasks:</label>
      <input type="text" class="form-control" name="input_name" value="{{$tasks->name}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Tasks Description:</label>
      <input type="text" class="form-control" name="input_name" value="{{$tasks->text_content}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Markdown Description:</label>
      <input type="text" class="form-control" name="input_name" value="{{$tasks->description}}" style="background-color: #ebebeb;" readonly>
      <label for=""class="mt-2 mb-2">Orderindex:</label>
      <input type="text" class="form-control" name="input_name" value="{{$tasks->orderindex}}" style="background-color: #ebebeb;" readonly>
      <a href="{{route('tasks')}}">
        <button type="button" class="btn btn-primary mt-3 float-end col-3">Kembali</button>
      </a>
      
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection