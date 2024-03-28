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
    <button class="btn btn-primary"><i class="fa-solid fa-plus ml-5"></i> Add Space</button>
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Color</th>
          <th scope="col">Avatar</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
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