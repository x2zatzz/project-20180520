@extends('layouts.base')

@section('body')

<main class="container">

  @isset($role)
    @if($role === 'staff')
    <div class="row">
      <h2>Welcome {{$username}}</h2>
    </div>
    @elseif($role === 'manager')
    <div class="row">
      <h2>Welcome {{$username}}</h2>
    </div>
    @elseif($role === 'admin')
    <div class="row">
      <h2>Welcome admin!</h2>
    </div>
    @elseif($role === 'guest')
    <div class="row">
      <h2>Welcome guest!</h2>
    </div>
    @else
    <div class="row">
      <h2><i>Account database is empty</i></h2>
    </div>
    @endif

    <div class="row" id="index-sum">
      <h2 class="">Current inventory</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Product name</th>
            <th scope="col">Model name</th>
            <th scope="col">Brand name</th>
            <th scope="col">Current inventory</th>
            <th scope="col">In</th>
            <th scope="col">Out</th>
            <th scope="col">Last transaction</th>
          </tr>
        </thead>
        <tbody>
          @if(empty(count($data[1])))
            <tr><td><i>Inventory database is empty</i></td></tr>
          @else
            @foreach($data[1]->sortBy('name')->toArray() as $item)
            <tr>
              @if($role === 'manager')
              <td><a class="itemupdate" id="itemid-{{$item['id']}}" href="" data-toggle="modal" data-target="#modal-updateitem">{{$item['name']}}</a></td>

              @else
              <td>{{$item['name']}}</td>
              @endif

              <td>{{$item['model']}}</td>
              <td>{{$item['brand']}}</td>
              @if(($data[2]->where('item_id',$item['id'])->where('type', 'check-in')->sum('quantity'))-($data[2]->where('item_id',$item['id'])->where('type', 'check-out')->sum('quantity')) === 0)
                <td><b class="badge badge-pill badge-danger">EMPTY</b></td>
              @elseif(($data[2]->where('item_id',$item['id'])->where('type', 'check-in')->sum('quantity') > 0) && (($data[2]->where('item_id',$item['id'])->where('type', 'check-out')->sum('quantity')/($data[2]->where('item_id',$item['id'])->where('type', 'check-in')->sum('quantity'))) >= 0.9))
                <td>{{($data[2]->where('item_id',$item['id'])->where('type', 'check-in')->sum('quantity'))-($data[2]->where('item_id',$item['id'])->where('type', 'check-out')->sum('quantity'))}}&nbsp;<b class="badge badge-pill badge-warning">CRITICAL</b></td>
              @else
                <td>{{($data[2]->where('item_id',$item['id'])->where('type', 'check-in')->sum('quantity'))-($data[2]->where('item_id',$item['id'])->where('type', 'check-out')->sum('quantity'))}}</td>
              @endif
              <td>{{$data[2]->where('item_id',$item['id'])->where('type', 'check-in')->sum('quantity')}}</td>
              <td>{{$data[2]->where('item_id',$item['id'])->where('type', 'check-out')->sum('quantity')}}</td>
              <td>@if(isset($data[2]->firstWhere('item_id',$item['id'])->updated_at)){{$data[2]->firstWhere('item_id',$item['id'])->updated_at->diffForHumans()}}@else <i>no transaction record</i> @endif</td>
            </tr>
            @endforeach
          @endif

        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col" id="index-in">
        <h2 class="">Today's inbound transactions</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Time</th>
              <th scope="col">Product name</th>
              <th scope="col">Brand name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Account</th>
            </tr>
          </thead>
          <tbody>
            @if(empty(count($data[3])))
              <tr><td><i>No transactions today</i></td></tr>

            @else
              @foreach($data[3]->toArray() as $item)
              <tr>
                <td>{{date_format(date_create($item['updated_at']),'H:i:s')}}</td>
                <td>{{$data[1]->where('id',$item['item_id'])->first()->name}}</td>
                <td>{{$data[1]->where('id',$item['item_id'])->first()->brand}}</td>
                <td>{{$item['quantity']}}</td>
                <td>{{$data[0]->where('id',$item['user_id'])->first()->username}}</td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>

      <div class="col" id="index-out">
        <h2 class="">Today's outbound transactions</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Time</th>
              <th scope="col">Product name</th>
              <th scope="col">Brand name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Account</th>
            </tr>
          </thead>
          <tbody>
            @if(empty(count($data[4])))
              <tr><td><i>No transactions today</i></td></h2>
            @else
              @foreach($data[4]->toArray() as $item)
              <tr>
                <td>{{date_format(date_create($item['updated_at']),'H:i:s')}}</td>
                <td>{{$data[1]->where('id',$item['item_id'])->first()->name}}</td>
                <td>{{$data[1]->where('id',$item['item_id'])->first()->brand}}</td>
                <td>{{$item['quantity']}}</td>
                <td>{{$data[0]->where('id',$item['user_id'])->first()->username}}</td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>

  @endisset

  @empty($role)
    <h2>Welcome guest</h2>
    <h2>Today's Statistics</h2>
  @endempty

</main>
@endsection