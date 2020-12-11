<html lang="en">
    <head>
        <title>XYT | Cart</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
        @extends('frames.cnavbar')
        <br><br><br><input type="hidden" value="{{$total = 0}}">
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                    <tbody>
                       @foreach ($data as $item)
                       <tr>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$subtotal = ($item->price) * ($item->quantity)}}</td>
                            <input type="hidden" value="{{$total += $subtotal}}">
                            <form action="/cartremove" method="post">
                                @csrf
                                <input type="hidden" name="itemid" value="{{$item->item_id}}">
                                <input type="hidden" name="quantity" value="{{$item->quantity}}">
                                <td><button class="btn btn-outline-danger" name="item" value="{{$item->id}}"><span class="mdi mdi-cart-remove"></span> Remove</button></td>
                            </form>
                        </tr>
                       @endforeach
                    </tbody>
              </table>
              <br><hr>
              <div class="row">
                <div class="col-sm-1">
                    <h3>Total:</h3>
                </div>
                <div class="col-sm-2">
                    <input type="number" name="total" id="total" value="{{$total}}" class="form-control" readonly>
                </div>
                <div class="col-sm-2 ml-auto">
                    <button class="btn btn-outline-warning" data-toggle="modal" data-target="#paymentmethod"><span class="mdi mdi-cart-outline"></span> Checkout</button>
                </div>
              </div>

              <form action="/checkout" method="post">
                <!-- Modal -->
                <div class="modal fade" id="paymentmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @csrf
                        <div class="modal-body">
                            <h4>Payment Method:</h4>
                            <select name="paymethod" id="paymethod" class="form-control">
                                <option value="COD">COD</option>
                                <option value="Visa (Paid)">Visa</option>
                                <option value="PayPal (Paid)">PayPal</option>
                                <option value="Master Card (Paid)">Master Card</option>
                            </select>
                            <hr>
                            @if (session('age') >= 60)
                            <div class="row">
                                <div class="col-sm-3 m-2">
                                    <h5>Subtotal:</h5>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" name="subtotal" value="{{$total}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 m-2">
                                    <h5>Discount:</h5>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" name="discount" value="{{$total * .10}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 m-2">
                                    <h5>Total:</h5>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" name="total" value="{{$total - ($total * .10)}}" class="form-control" readonly>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-sm-3 m-2">
                                    <h5>Total:</h5>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" name="total" value="{{$total}}" class="form-control" readonly>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-cart-outline"></span>Purchase</button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>


        </div>
        @extends('frames.footer')
        @extends('includes.bootstrapscript')
    </body>

</html>