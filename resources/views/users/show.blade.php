
@section('title','show user')
@extends('layouts.app')
@section('content')
    <h1 class="text-center">this is show page</h1>

    <ul>    
    
        <div class="container">
            <li><strong>ID:</strong> {{ $userShow->id }}</li>
            <li><strong>Name:</strong> {{ $userShow->name }}</li>
            <li><strong>Email:</strong> {{ $userShow->email }}</li>
            <li><strong>Country:</strong> {{ $userShow->country }}</li>       
        </div>
       
    </ul>
@endsection