<html lang="en">
    <head>
        <title>XYT | Cart</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
        @extends('frames.cnavbar')
        <br><br><br>
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
                            <td>{{($item->price) * ($item->quantity)}}</td>
                            <form action="/cartremove" method="post">
                                @csrf
                                <td><button class="btn btn-outline-danger" name="item" value="{{$item->id}}"><span class="mdi mdi-cart-remove"></span> Remove</button></td>
                            </form>
                        </tr>
                       @endforeach
                    </tbody>
              </table>
        </div>




        @extends('frames.footer')
        @extends('includes.bootstrapscript')
    </body>

</html>