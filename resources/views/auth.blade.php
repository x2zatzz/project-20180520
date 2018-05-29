@extends('layouts.base')

@section('body')
  @if($role === 'guest')
    <form method="POST" action="authcheck">
      <fieldset>
        @csrf
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Sign-in">
      </fieldset>
    </form>
  @endif

@endsection