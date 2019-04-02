@extends('layouts.blog_master')

@section('content')
<div class='col-sm-8'>
    <h1>Login</h1>
    <form method="POST" action="/login">
        {{csrf_field()}}
        
        <div class='form-group'>
            <label for='email'>Email :</label>
            <input type='email' class='form-control' name='email' id='email' placeholder="Enter your email" required />
        </div>
        <div class='form-group'>
            <label for='password'>Password :</label>
            <input type='password' class='form-control' name='password' id='password' placeholder="Enter your password" required />
        </div>
        
        <div class='form-group'> 
            <button class="btn btn-primary" id='submit' name='submit' >Login</button>
        </div>
        <div class='form-group'> 
            @include('layouts.includes.errors')
        </div>
    </form>
</div>

@endsection