@extends('layouts.base')

@section('body')

  <main class="container-fluid">

    @isset($role)
      @if($role == 'staff')
        <h2>Welcome {{$username}}</h2>
        <h2>Today's Outgoing Transactions:</h2>
      @elseif($role == 'manager')
        <h2>Welcome {{$username}}</h2>
        <h2>Today's Transactions</h2>
      @endif
    @endisset

    @empty($role)
      <h2>Welcome guest</h2>
      <h2>Today's Statistics</h2>
    @endempty

  </main>
@endsection