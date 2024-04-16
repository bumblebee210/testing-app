@extends('layout.master')
@section('title', 'Add Task')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>GET- <span style="color:green">Tasks</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <form>
      @csrf
      <label for=""class="mb-2">Team ID:</label>
      <input type="text" class="form-control" name="input_name" value="{{$work['id']}}" required>
      <label for=""class="mb-2">Name:</label>
      <input type="text" class="form-control" name="input_name" value="{{$work['name']}}" required>
      <label for=""class="mb-2">Color:</label>
      <input type="text" class="form-control" name="input_color" value="{{$work['color']}}" required>
      <label for=""class="mb-2">Avatar:</label>
      <input type="text" class="form-control" name="input_Avatar" value="{{$work['avatar']}}" required>
      
       <a href="{{route('tableWorkspace')}}"><button type="button" class="btn btn-primary mt-3">Back Workspace</button></a>
    </form>
    
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection