@extends('layout.master')
@section('title', 'Tasks')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Table- <span style="color:green">Tasks</span></h5>
  </div>
  <!-- bagian card -->
  <div class="card-body">
    <a href="{{route('add')}}">
    <button class="btn btn-primary"><i class="fa-solid fa-plus ml-5"></i> Add Tasks</button>
    </a>
    <table id="example"class="table table-striped mt-3">
      <thead>
        <tr>
          <th  style="text-align:center;">#</th>
          <th  style="text-align:center;">Tasks Id</th>
          <th  style="text-align:center;">Name Tasks</th>
          <th  style="text-align:center;">Description</th>
<!--           <th  style="text-align:center;">Markdown Description</th> -->
          <th  style="text-align:center;">Status</th>
          <th  style="text-align:center;">Orderindex</th>
          <th  style="text-align:center;">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($tasks as $item)
        <tr style="text-align:center;">
          <th style="text-align:center;">{{$loop->iteration}}</th>
          <td style="text-align:center;">{{$item->id_tasks}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->text_content}}</td>
         <!--  <td>{{$item->description}}</td> -->
          <td style="text-align:center;">{{$item->status}}</td>
          <td style="text-align:center;">{{$item->orderindex}}</td>
          <td>
            <a href="{{route('detailtasks', $item->id)}}" style="text-decoration: none;">
              <botton class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></botton>
            </a>
            <a href="{{route('updateTask', $item->id)}}" style="text-decoration: none;">
              <botton class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></botton>
            </a>
            <a href="{{route('deltasks', $item->id)}}" style="text-decoration: none;">
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