@extends('layouts.base')

@section('body')
<main class="container">
  <h2>User accounts</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Role</th>
        <th scope="col">Last transaction</th>
        <th scope="col">Action/s</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $value)
      <tr>
        <td>{{$value['username']}}</td>
        <td>{{$value['role']}}</td>
        @if(App\Transaction::all()->where('user_id',$value['id'])->sortByDesc('updated_at')->first() !== null)
          <td>{{App\Transaction::all()->where('user_id',$value['id'])->sortByDesc('updated_at')->first()->updated_at}}</td>
        @else
          <td><i>No transactions</i></td>
        @endif
        @if($value['role'] !== 'admin')
        <td><a href="">delete user</a></td>
        @endif
      </tr>
      @endforeach
    </tbody>

  </table>

</main>

@endsection
