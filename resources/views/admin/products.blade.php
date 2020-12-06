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
        <h2>Products <span class="mdi mdi-package"></span></h2>
        <br> 
        <div class="row">
            <div class="col-sm-8">
                <form action="/product/search" method="POST">
                  @csrf
                  <div class="md-form mt-0">
                    <input class="form-control" name="itemsearch" type="text/submit" placeholder="Search" aria-label="Search" required>
                  </div> 
                </form>
            </div>
            <div class="col-sm-1">
              <input type="hidden">
            </div>
            <div class="col-sm-3">
                <a href="/product/addproduct" class="btn btn-outline-primary"><span class="mdi mdi-package-up"></span> Add New Product</a>
            </div>
        </div><br />
        <table class="table">
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
                @if ($item->stocks <= 30)
                  <td class="text-danger">{{$item->product_name}}</td>
                  <td class="text-danger">{{$item->supplier_name}}</td>
                  <td class="text-danger">{{$item->stocks}}</td>                    
                @else
                  <td>{{$item->product_name}}</td>
                  <td>{{$item->supplier_name}}</td>
                  <td>{{$item->stocks}}</td>
                @endif
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete this item?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                              <form action="/product/delete" method="post">
                                @csrf
                                <input type="hidden" name="item_id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <td><a class="btn btn-outline-info" href="/product/edit/{{$item->id}}"><span class="mdi mdi-eye"></span> View</a> <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"><span class="mdi mdi-trash-can"></span> Delete</button></td>
            </tr>  
            @endforeach
          </tbody>
        </table>
        <a href="/products" class="btn btn-outline-success"><span class="mdi mdi-refresh"></span> Refresh</a>
        <a href="/deletedproducts" class="btn btn-outline-warning"><span class="mdi mdi-delete-alert-outline"></span> View Deleted Items</a>
      </div>
      <br><br><br><br><br>
    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>