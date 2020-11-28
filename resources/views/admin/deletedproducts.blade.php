<html>
    <head>
        <title>XYT | Products</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
    @extends('frames.navbar')
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <h2>Products <span class="mdi mdi-arrow-right"></span> Deleted <span class="mdi mdi-package"></span></h2>
        <br> 
        <div class="row">
        </div>
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Product Name</th>
              <th>Supplier</th>
              <th>Stocks</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->product_name}}</td>
                <td>{{$item->supplier_name}}</td>
                <td>{{$item->stocks}}</td>
                <form action="/product/delete" method="get">
                    @csrf
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <td><a class="btn btn-outline-warning" href="/product/restore/{{$item->id}}"><span class="mdi mdi-delete-restore"></span> Restore</a></td>
                </form>
            </tr>  
            @endforeach
          </tbody>
        </table>
        <a href="/products" class="btn btn-outline-success"><span class="mdi mdi-reply"></span> Back</a>
      </div>
      
    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>