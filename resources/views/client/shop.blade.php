<html lang="en">
    <head>
        <title>XYT | Shop</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
        @extends('frames.cnavbar')
        <br><br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="md-form col-sm-7">
                    <input class="form-control" name="itemsearch" type="text/submit" placeholder="Search" aria-label="Search" required>
                </div>
                <div class="col-sm-3">
                    @if (session('msgerr'))
                        <script>
                            alert("Cart is empty")
                        </script>
                    @endif
                </div> 
            </div>
            <br>
            <div class="row">
                @foreach ($data as $item)
                <form action="/addtocart" method="post">
                <!-- Modal -->
                <div class="modal fade" id="viewitem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$item->product_name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="itemid" value="{{$item->id}}">
                            <input type="hidden" name="productname" value="{{$item->product_name}}">
                            <input type="hidden" name="price" value="{{$item->price}}">
                            <p>Category: {{$item->category_name}}</p>
                            <p>Supplier: {{$item->supplier_name}}</p>
                            <p>Price: {{$item->price}}</p>
                            <p>Stocks: {{$item->stocks}}</p>
                            <hr>
                            <div class="row">  
                                <div class="col-sm-2">Quantity:</div>
                                <div class="col-sm-3"><input type="number" value="1" class="form-control" name="quantity"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-cart-arrow-down"></span>Add to Cart</button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>

                <div class="col-sm-2 m-2">
                    <div class="card" style="width: 17rem;">
                        <div class="card-header bg-dark text-white">
                            <strong>{{$item->product_name}}</strong>
                        </div>
                        <div class="card-body">
                            <input type="hidden" value="{{$item->id}}">
                            <p class="card-text text-success">₱ {{$item->price}}</p>
                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#viewitem{{$item->id}}"><span class="mdi mdi-cart-plus"></span> View Item</button>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            
        </div>
        @extends('frames.footer')
        @extends('includes.bootstrapscript')
    </body>

</html>