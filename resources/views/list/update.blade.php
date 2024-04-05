@extends('layout.master')
@section('title', 'Space')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Update- <span style="color:green">Space</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form action="{{route('simpan_List', $list->id)}}" method="POST">
      @csrf
      @method('PUT')
      <label for="" class="mb-2">List ID:</label>
      <input type="text" class="form-control" name="id" style="background:#f5f5f5;" value="{{$list->id}}" readonly>
      <label for="" class="mb-2">name:</label>
      <input type="text" class="form-control" name="input_name" value="{{$list->name}}" required>

      <label for="" class="mb-2">content:</label>
      <input type="text" class="form-control" name="input_content" value="{{$list->content}}" required>


      <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection