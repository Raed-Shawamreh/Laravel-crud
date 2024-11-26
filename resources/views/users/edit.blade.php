@section('title', 'Edit User')
@extends('layouts.app')
@section('content')
<h1 class="text-center">This is edit page</h1>
<div class="container">
    @if ($errors->any())
    <div class='alert alert-danger text center' role="alert">
      @foreach($errors->all() as $error)
      {{$error}} <br>
      @endforeach
    </div>   
    @endif
    <form action="{{route('users.update' ,['user' => $userEdit->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
              <div class="mb-3 col-md-4">
                  <label for="exampleInputName" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control " id="examplename" value="{{$userEdit->name}}" >
                </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="exampleInputCountry" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="exampleCountry" value="{{$userEdit->country}}">
              </div>
        </div>
        
    
        <button type="submit" class="btn btn-success">Edit</button>
      </form>
</div>
@endsection