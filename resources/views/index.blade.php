@extends('layouts.base')

@section('body')

  <main class="container">

    @isset($role)
      @if($role === 'staff')
      <div class="row">
        <h2>Welcome {{$username}}</h2>
        <button>CREATE TRANSACTION</button>
      </div>
      @elseif($role === 'manager')
      <div class="row">
        <h2>Welcome {{$username}}</h2>
        <button>CREATE TRANSACTION</button>
      </div>
      @endif
      <div class="row">
        <div class="col" id="index-in">
          <h2>Today's inbound transactions</h2>
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
          <h2>Today's outbound transactions</h2>
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
        <h2 class="">Current inventory</h2>
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


                @if(isset($data[6][$item['id']]['quantity']))
                  <td>
                    @php
                      if(isset($data[6][$item['id']]['quantity'])){
                        $a = $data[6][$item['id']]['quantity'];
                      } else{
                        $a = 0;
                      }
                      if(isset($data[7][$item['id']]['quantity'])){
                        $b = $data[7][$item['id']]['quantity'];
                      } else{
                        $b = 0;
                      }
                      echo ($a-$b);
                    @endphp

                  </td>
                @else
                  <td>0</td>
                @endif

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