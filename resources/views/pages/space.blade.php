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
    <a href="{{route('add')}}"><button class="btn btn-primary"><i class="fa-solid fa-plus ml-5"></i> Add Space</button></a>
    
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Private</th>
          <th scope="col">Status</th>
          <th scope="col">Type</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach ($spaces as $item)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->private}}</td>
          <td>{{$item->statuses}}</td>
          <td>{{$item->statuses}}</td>
          <td>
            <a href=""> <botton class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></botton></a>
            <a href="{{route('editspace', $item->spacesId)}}"><botton class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></botton></a>
            <botton class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></botton>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection