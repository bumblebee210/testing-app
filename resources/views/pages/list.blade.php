@extends('layout.master')
@section('title', 'List')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Table- <span style="color:green">List</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
  <a href="{{route('addlist')}}">
    <button class="btn btn-primary"><i class="fa-solid fa-plus ml-5"></i> Add List</button>
  </a> 
    <table id="example" class="table table-striped mt-3">
      <thead>
        <tr>
          <th  style="text-align:center;">#</th>
          <th  style="text-align:center;">Name</th>
          <th  style="text-align:center;">Content</th>
          <th  style="text-align:center;">permission_level</th>
          <th  style="text-align:center;">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($list as $item)
        <tr  style="text-align:center;">
          <th  style="text-align:center;">{{$loop->iteration}}</th>
          <td>{{$item->name}}</td>
          <td>{{$item->content}}</td>
          <td>{{$item->permission_level}}</td>
          <td style="text-align:center;">
            <a href="{{route('detaillists', $item->id)}}" style="text-decoration: none;">
              <botton class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></botton>
            </a>
            <a href="{{route('updateList', $item->id)}}" style="text-decoration: none;">
            <botton class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></botton>
            </a>
            <a href="{{route('delist', $item->id)}}" style="text-decoration: none;">
            <botton class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></botton>
            </a>
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