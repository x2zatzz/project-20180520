
@switch(true)

@case($role === 'staff' || $role === 'manager' && $webheader !== 'user-management')

<div class="modal fade" id="modal-checkout" tabindex="-1" role="dialog" aria-labelledby="label-checkout" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label-checkout">Check-out Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="container row" id="form" method="POST" action="checkout">
          @csrf
          <fieldset class="col">
            <div class="form-group">
              <label for="item_name">Item Name</label>
              <select class="form-control" id="item_name" name="item_name">
                  <option></option>
                @foreach($data[1]->sortBy('name')->toArray() as $items)
                  @if(collect($data[5])->search($items['id']) !== false)
                  <option>{{$items['namebrand']}}  </option>
                  @endif
                @endforeach
              </select>
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

          </fieldset>
          <fieldset class="col">

            <div class="form-group" hidden>
              <label for="item_id">Item ID</label>
              <input type="text" class="form-control" id="item_id" name="item_id" disabled value="">
            </div>
            <div class="form-group">
              <label for="barcode">Barcode</label>
              <input type="text" class="form-control" id="barcode" name="barcode" disabled value="">
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
              <label for="user_name">Account Name</label>
              <input type="text" class="form-control" id="user_name" name="user_name" readonly value="{{Auth::user()->username}}">
            </div>
          </fieldset>
        </form>
        <div class="container-fluid row">
          <div class="mx-auto d-block">
            <img id="item-image" src="" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button form="form" type="submit" class="btn btn-primary">Check-out item/s</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  @if($role === 'manager')
  <div class="modal fade" id="modal-checkin" tabindex="-1" role="dialog" aria-labelledby="label-checkin" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="label-checkin">Check-in Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form class="container row" id="form1" method="POST" action="checkin">
            @csrf
            <fieldset class="col">
              <div class="form-group">
                <label for="item_name1">Item Name</label>
                <select class="form-control" id="item_name1" name="item_name" required>
                    <option></option>
                  @foreach($data[1]->sortBy('name')->toArray() as $items)
                    <option>{{$items['namebrand']}}  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="quantity1">Quantity</label>
                <input type="number" class="form-control" id="quantity1" name="quantity" min="1" value="1" required>
              </div>

              <div class="form-group">
                <label for="purchaseprice1">Purchase Value</label>
                <input type="number" class="form-control" id="purchaseprice1" name="purchaseprice" step="0.01" min="0" value="0000.00" required>
              </div>

              <div class="form-group">
                <label for="purchaseinvoice1">Purchase Invoice</label>
                <input type="text" class="form-control" id="purchaseinvoice1" name="purchaseinvoice" value="">
              </div>

            </fieldset>
            <fieldset class="col">

              <div class="form-group" hidden>
                <label for="item_id">Item ID</label>
                <input type="text" class="form-control" id="item_id1" name="item_id" disabled value="">
              </div>
              <div class="form-group">
                <label for="barcode1">Barcode</label>
                <input type="text" class="form-control" id="barcode1" name="barcode" disabled value="">
              </div>
              <div class="form-group">
                <label for="checkindate1">Check-in Date</label>
                <input type="date" class="form-control" id="checkindate1" name="checkindate" readonly value="{{date('Y-m-d')}}">
              </div>
              <div class="form-group">
                <label for="checkintime1">Check-in Time</label>
                <input type="time" class="form-control" id="checkintime1" name="checkintime" readonly value="{{date('H:i:s')}}">
              </div>

              <div class="form-group">
                <label for="user_name1">Account Name</label>
                <input type="text" class="form-control" id="user_name1" name="username" readonly value="{{Auth::user()->username}}">
              </div>
            </fieldset>
          </form>
          <div class="container-fluid row">
            <div class="mx-auto d-block">
              <img id="item-image1" src="" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button form="form1" type="submit" class="btn btn-primary">Check-in item/s</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-newitem" tabindex="-1" role="dialog" aria-labelledby="label-newitem" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="label-newitem">New Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form class="container row" id="form2" method="POST" action="newitem" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <fieldset class="col">
                <div class="form-group">
                  <label for="item_name2">Item Name</label>
                  <input type="text" class="form-control" id="item_name2" name="name" required>
                </div>
                <div class="form-group">
                  <label for="brand_name2">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name2" name="brand" required>
                </div>
                <div class="form-group">
                  <label for="model_name2">Model Name</label>
                  <input type="text" class="form-control" id="model_name2" name="model">
                </div>
                <div class="form-group">
                  <label for="description2">Description</label>
                  <textarea class="form-control" id="description2" name="description" required></textarea>
                </div>

                <div class="form-group">
                  <label for="retailprice2">Retail Price</label>
                  <input type="number" class="form-control" id="retailprice2" name="retailprice" step="0.01" min="1" value="0000.00" required>
                </div>
              </fieldset>
              <fieldset class="col">

                <div class="form-group" hidden>
                  <label for="localcode2">Local code</label>
                  <input type="text" class="form-control" id="localcode2" name="localcode">
                </div>
                <div class="form-group">
                  <label for="barcode2">Barcode</label>
                  <input type="text" class="form-control" id="barcode2" name="barcode">
                </div>
                <div class="form-group">
                  <label for="image2">Image (200x200)</label>
                  <input type="file" class="form-control" id="image2" name="image" accept="image/*">
                </div>

                <div class="form-group">
                  <label for="user_name2">Account Name</label>
                  <input type="text" class="form-control" id="user_name2" name="username" readonly value="{{Auth::user()->username}}">
                </div>

                <div class="mx-auto d-block">
                  <img id="item-image2" src="" alt="" class="img-fluid">
                </div>
              </fieldset>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button form="form2" type="submit" class="btn btn-primary">Register new item</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-updateitem" tabindex="-1" role="dialog" aria-labelledby="label-updateitem" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="label-updateitem">Update item information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form class="container row" id="form3" method="POST" action="updateitem" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <fieldset class="col">
                <div class="form-group">
                  <label for="item_name3">Item Name</label>
                  <input type="text" class="form-control" id="item_name3" name="name" required>
                </div>
                <div class="form-group">
                  <label for="brand_name3">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name3" name="brand" required>
                </div>
                <div class="form-group">
                  <label for="model_name3">Model Name</label>
                  <input type="text" class="form-control" id="model_name3" name="model">
                </div>
                <div class="form-group">
                  <label for="description3">Description</label>
                  <textarea class="form-control" id="description3" name="description" required></textarea>
                </div>

                <div class="form-group">
                  <label for="retailprice3">Retail Price</label>
                  <input type="number" class="form-control" id="retailprice3" name="retailprice" step="0.01" min="1" value="0000.00" required>
                </div>
              </fieldset>

              <fieldset class="col">
                <div class="form-group" hidden>
                  <label for="item_id3">Item ID</label>
                  <input type="text" class="form-control" id="item_id3" name="item_id" >
                </div>
                <div class="form-group" hidden>
                  <label for="localcode3">Local code</label>
                  <input type="text" class="form-control" id="localcode3" name="localcode">
                </div>
                <div class="form-group">
                  <label for="barcode3">Barcode</label>
                  <input type="text" class="form-control" id="barcode3" name="barcode">
                </div>
                <div class="form-group">
                  <label for="image3">Image (200x200)</label>
                  <input type="file" class="form-control" id="image3" name="image" accept="image/*">
                </div>

                <div class="form-group">
                  <label for="user_name3">Account Name</label>
                  <input type="text" class="form-control" id="user_name3" name="username" readonly value="{{Auth::user()->username}}">
                </div>

                <div class="mx-auto d-block">
                  <img id="item-image3" src="" alt="" class="img-fluid">
                </div>
              </fieldset>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button form="form3" type="submit" class="btn btn-primary">Update item information</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  @endif

@break

@default

@endswitch
