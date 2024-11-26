@section('title', 'Create User')
@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
    <div class='alert alert-danger text center' role="alert">
      @foreach($errors->all() as $error)
      {{$error}} <br>
      @endforeach
    </div>   
    @endif
    <form action={{route('users.store')}} method="POST" >
      @csrf
        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
              </div>
              <div class="mb-3 col-md-4">
                  <label for="exampleInputName" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control " id="examplename" value="{{old('name')}}" >
                </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="exampleInputCountry" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="exampleCountry" value="{{old('country')}}">
              </div>
            <div class="mb-3 col-md-4">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control " id="exampleInputPassword1">
            </div>
        </div>
        
      
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Accept our policy</label>
        </div>
        <button type="submit" class="btn btn-success">Create New User</button>
      </form>
</div>


@endsection