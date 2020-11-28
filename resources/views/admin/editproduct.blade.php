<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
        <title>XYT | Update Product</title>
    </head>

    <body>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Update Product <span class="mdi mdi-update"></span></h2>
                <br>
                <form method="POST" action="/product/update">
                    @csrf
                    @foreach ($data as $item)
                        
                    @endforeach
                    <div class="form-group row">
                        <label for="productname" class="col-sm-2 col-form-label">Product Name:</label>
                        <div class="col-sm-10">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input name="productname" value="{{$item->product_name}}" type="text" class="form-control" id="itemname" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category:</label>
                        <div class="col-sm-10">
                        <select name="category" type="email" class="form-control" readonly>
                            <option >{{$item->category_name}}</option> 
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="supplier" class="col-sm-2 col-form-label">Supplier: </label>
                        <div class="col-sm-10">
                          <select name="supplier" type="email" class="form-control" readonly>
                            <option>{{$item->supplier_name}}</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price:</label>
                        <div class="col-sm-3">
                        <input name="price" type="number" value="{{$item->price}}"step="any" class="form-control" id="stocks" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stocks" class="col-sm-2 col-form-label">Stocks:</label>
                        <div class="col-sm-3">
                        <input name="stocks" type="number" value="{{$item->stocks}}"class="form-control" id="stocks" required autocomplete="off">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="form-group row">
                        <label for="addedby" class="col-sm-2 col-form-label">Added By:</label>
                        <div class="col-sm-5">
                        <input name="addedby" type="text" value="{{$item->addedby}}"class="form-control" id="stocks" readonly autocomplete="off">
                        </div>
                        <label for="addedat" class="col-form-label"> on</label>
                        <div class="col-sm-4">
                            <input name="addedat" type="text" value="{{$item->created_at}}"class="form-control" id="stocks" readonly autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updatedby" class="col-sm-2 col-form-label">Updated By:</label>
                        <div class="col-sm-5">
                            <input name="updatedby" type="text" value="{{$item->updatedby}}"class="form-control" id="stocks" readonly autocomplete="off">
                        </div>
                        <label for="updatedat" class="col-form-label"> on</label>
                        <div class="col-sm-4">
                            <input name="updatedat" type="text" value="{{$item->updated_at}}"class="form-control" id="stocks" readonly autocomplete="off">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-outline-primary"><span class="mdi mdi-update"></span> Update</button>
                            <a href="/products" class="btn btn-outline-danger"><span class="mdi mdi-cancel"></span>Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    @extends('includes.bootstrapscript')
    </body>

</html>