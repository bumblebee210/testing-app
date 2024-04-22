@extends('layout.master')
@section('title', 'WorkSpace')
@section('content')
<div class="container-fluid">
  <div class="card mt-3">
  <div class="card-header">
    <h5>Table- <span style="color:green">Work Space</span></h5>

  </div>
  <div class="card-body">
    <a href="{{route('getspace')}}"><button class="btn btn-primary mb-2"><i class="fas fa-sync"></i> Get Workspace</button></a>
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
        <!-- resources/views/contoh.blade.php -->

        @if($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2 col" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                    @foreach($errors->all() as $error)
                      <span class="col-11">{{ $error }}</span>  
                    @endforeach
              <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


      </tbody>
    </table>
  </div>
</div>
</div>

@endsection