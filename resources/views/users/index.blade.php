
@section('title', 'Users')
@extends('layouts.app')
@section('content')
    <h1 class="text-center">This is users page and they are ({{$count_user}})</h1>


    @if (session('success'))
      <div class='alert alert-success text-center w-50 mx-auto ' role="alert" id='success_5sec'>
        {{session('success')}}
      </div>
    @endif
    <div class="container">
        <table class="table table-dark text-center">
            <thead class="thead-color">
                <tr >
                  <th scope="col">#Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Countrry</th>
                  <th scope="col">Email</th>
                  <th scope="col">Show</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                  {{-- <th scope="col">delete</th> --}}
                </tr>
              </thead>
              @foreach($my_users as $users)
              <tbody>
                <tr>
                 
                  <th scope="row">{{$users['id']}}</th>
                  <td>{{$users['name']}}</td>
                  <td>{{$users['country']}}</td>
                  <td>{{$users['email']}}</td>
                  <td><a class="btn btn-primary"href="{{ route('users.show',$users['id'] ) }}" >Show</a></td>
                  <td><a class="btn btn-secondary"href="{{ route('users.edit',$users->id ) }}" >Edit</a></td>
                  <td> 
                      <form action="{{ route('users.destroy',$users->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <input class="btn btn-danger btn-delete"  type="submit" value="Delete">
                      </form>
                 
                  </td>                  
                </tr>
              </tbody>
              @endforeach
          </table>
          <a class="btn btn-success"href="{{ route('users.create') }}" >+Create New User</a>
    </div>
    
@endsection