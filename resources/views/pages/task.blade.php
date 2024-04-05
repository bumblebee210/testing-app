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
          <th  style="text-align:center;">Name</th>
          <th  style="text-align:center;">Color</th>
          <th  style="text-align:center;">Avatar</th>
          <th  style="text-align:center;">Action</th>
          
        </tr>
      </thead>
      <tbody>
        <tr style="text-align:center;">
          <th scope="row"  style="text-align:center;">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>
            <botton class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></botton>
            <botton class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></botton>
            <botton class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></botton>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
<!-- tutup cards -->
</div>
</div>

@endsection