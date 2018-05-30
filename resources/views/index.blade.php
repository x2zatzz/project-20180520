@extends('layouts.base')

@section('body')

  <main class="container">

    @isset($role)
      @if($role === 'staff')
      <div class="row">
        <h2>Welcome {{$username}}</h2>
        <h2>Today's Outgoing Transactions:</h2>
        <button>CREATE TRANSACTION</button>
      </div>
      @elseif($role === 'manager')
      <div class="row">
        <h2>Welcome {{$username}}</h2>
        <h2>Today's Transactions</h2>
        <button>CREATE TRANSACTION</button>
      </div>
      @endif
      <div class="row">
        <div class="col" id="index-in">
          <h2>Inbound transactions</h2>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Product name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Account</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{dd($data[0])}} --}}
              @foreach($data[0] as $items)
                <tr>
                  <td>{{$items['updated_at']}}</td>
                  <td>{{$data[2]->where('id',$items['item_id'])->first()->name}}</td>
                  <td>{{$items['quantity']}}</td>
                  <td>{{$data[3]->find($items['user_id'])->username}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="col" id="index-out">
          <h2>Outbound transactions</h2>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Product name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Account</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data[1] as $items)
                <tr>
                  <td>{{$items['updated_at']}}</td>
                  <td>{{$data[2]->where('id',$items['item_id'])->first()->name}}</td>
                  <td>{{$items['quantity']}}</td>
                  <td>{{$data[3]->find($items['user_id'])->username}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
      <div class="row" id="index-sum">
        <h2>Current inventory</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product name</th>
              <th scope="col">Current inventory</th>
              <th scope="col">In</th>
              <th scope="col">Out</th>
            </tr>
          </thead>
          <tbody>
            {{-- {{dd($data[2]->get()->name)}} --}}
            {{-- {{-- @foreach($data[2]->get()->toArray() as $items) --}}
            @foreach($data[2]->toArray() as $item)
              <tr>
                <td>{{$item['name']}}</td>
                <td>{{$item['name']}}</td>
                @if(isset($data[6][$item['id']]['quantity']))
                  <td>{{$data[6][$item['id']]['quantity']}}</td>
                @else
                  <td>0</td>
                @endif
                @if(isset($data[7][$item['id']]['quantity']))
                  <td>{{$data[7][$item['id']]['quantity']}}</td>
                @else
                  <td>0</td>
                @endif

              </tr>

            @endforeach

            {{-- {{dd($data[5])}} --}}
            {{-- @foreach($data[5] as $value)
              <tr>
                <td>{{$data[2]->where('id',array_keys($value)[0])->first()->name}}</td>
                <td>{{array_keys($value)[0]}}</td>
                <td>{{array_keys($value)[0]}}</td>
                <td>{{array_keys($value)[0]}}</td>
              </tr>

            @endforeach --}}
          </tbody>

        </table>
      </div>

    @endisset

    @empty($role)
      <h2>Welcome guest</h2>
      <h2>Today's Statistics</h2>
    @endempty

  </main>
@endsection