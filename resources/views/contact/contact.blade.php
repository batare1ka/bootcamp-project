@extends('layouts.app')
@section('content')
<div class="form">
    <form action="/api/send" method="POST">
        <h2>Login</h2>
<input type="text" name="username" placeholder="username"><br><br>
<input type="password" name="userpassword" placeholder="password"><br><br>
<input type="submit" name="send" value="SEND">
</form>
</div> 
@endsection