@extends('layout.master')
@section('title', 'WorkSpace')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Table- <span style="color:green">Work Space</span></h5>

  </div>
  <div class="card-body">
    <a href="{{route('getspace')}}"><button class="btn btn-primary"><img src="{{asset('Icon/Hi-Fi/uil_sync.svg')}}" alt=""> Get Workspace</button></a>
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th  style="text-align:center;">#</th>
          <th  style="text-align:center;">Name</th>
          <th  style="text-align:center;">Color</th>
          <!-- <th scope="col">Avatar</th> -->
          <th  style="text-align:center;">Members</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($teams as $team)
        <tr style="text-align:center;">
          <td  style="text-align:center;">{{$loop->iteration}}</td>
          <td>{{$team->name}}</td>
          <td>{{$team->color}}</td>
         <!--  <td style="max-width: 500px;">{{$team->avatar}}</td> -->
          <td  style="text-align:center;">{{$team->members}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection