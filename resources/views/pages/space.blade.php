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
    <a href="{{route('addspace')}}"><button class="btn btn-primary"><i class="fa-solid fa-plus ml-5"></i> Add Space</button></a>
    
    <table id="example" class="table table-striped mt-3">
      <thead>
        <tr>
          <th  style="text-align:center;">#</th>
          <th  style="text-align:center;">Name</th>
          <th  style="text-align:center;">Private</th>
          <th  style="text-align:center;">Color</th>
          <th  style="text-align:center;">Status</th>
          <th  style="text-align:center;">Type</th>
          <th  style="text-align:center;">Action</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach ($spaces as $item)
        <tr  style="text-align:center;">
          <td  style="text-align:center;">{{$loop->iteration}}</td>
          <td>{{$item->name}}</td>
          <td  style="text-align:center;">{{$item->private}}</td>
          <td>{{$item->color}}</td>
          <td  style="text-align:center;">{{$item->statuses}}</td>
          <td  style="text-align:center;">{{$item->statuses}}</td>
          <td style="text-align:center;">
            <a href="{{route('detailspace', $item->id)}}" style="text-decoration: none;"> 
              <botton class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></botton>
            </a>
            <a href="{{route('editspace', $item->id)}}" style="text-decoration: none;">
              <botton class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></botton>
            </a>
            <a href="{{route('hapusspace', $item->id)}}" style="text-decoration: none;">
              <botton class="btn btn-danger" ><i class="fa-solid fa-trash-can"></i></botton>
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