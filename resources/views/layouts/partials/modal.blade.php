
@switch(true)

@case($role === 'staff' || $role === 'manager')
<div class="modal fade" id="modal-checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check-out Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="checkout">
          @csrf
          <div class="form-group">
            <label for="item_name">Item Name</label>
            <select class="form-control" id="item_name" name="item_name">
              @foreach($data[1]->toArray() as $items)
                <option>{{$items['namebrand']}}  </option>
              @endforeach
            </select>
          </div>

          <div class="form-group" hidden>
            <label for="item_id">Item ID</label>
            <input type="text" class="form-control" id="item_id" name="item_id" disabled value="">
          </div>
          <div class="form-group">
            <label for="user_name">Account Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" readonly value="{{Auth::user()->username}}">
          </div>
          <div class="form-group">
            <label for="checkoutdate">Check-out Date</label>
            <input type="date" class="form-control" id="checkoutdate" name="checkoutdate" readonly value="{{date('Y-m-d')}}">
          </div>
          <div class="form-group">
            <label for="checkouttime">Check-out Time</label>
            <input type="time" class="form-control" id="checkouttime" name="checkouttime" readonly value="{{date('H:i:s')}}">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
          </div>

          <div class="form-group">
            <label for="soldprice">Sold Price</label>
            <input type="number" class="form-control" id="soldprice" name="soldprice" step="0.01" min="0" value="0000.00">
          </div>

          <div class="form-group">
            <label for="salesinvoice">Sales Invoice</label>
            <input type="text" class="form-control" id="salesinvoice" name="salesinvoice" value="">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@break

@default

@endswitch
