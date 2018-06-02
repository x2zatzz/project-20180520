@extends('layouts.base')

@section('body')
<main class="container-fluid col-4">
    <h2>Sign-in </h2>
  @if($role === 'guest')
    <form method="POST" action="authcheck">
      <fieldset>
        @csrf
        <div class="form-group">
          <label for="username">Username: </label>
          <input class="form-control" type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password: </label>
          <input class="form-control" type="password" id="password" name="password" required>
          </div>

        <input class="btn btn-primary" type="submit" value="Sign-in">
      </fieldset>
    </form>
  @endif
</main>
@endsection