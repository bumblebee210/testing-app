@extends('layout.master')
@section('title', 'WorkSpace')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Table- <span style="color:green">Work Space</span></h5>
  </div>
  <div class="card-body">
    <table class="table table-striped" >
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Color</th>
          <th scope="col">Avatar</th>
          <th scope="col">Members</th>
          
        </tr>
      </thead>
      <tbody style="max-width: 100px;">
        @foreach ($teams as $team)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$team->name}}</td>
          <td>{{$team->color}}</td>
          <td style="max-width: 500px;">{{$team->avatar}}</td>
          <td>{{$team->members}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection