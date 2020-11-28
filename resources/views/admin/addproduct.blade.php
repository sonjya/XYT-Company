<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
        <title>XYT | Add Product</title>
    </head>

    <body>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Add Product</h2>
                <br>
                <form method="POST" action="/product/additem">
                    @csrf
                    <div class="form-group row">
                        <label for="productname" class="col-sm-2 col-form-label">Product Name:</label>
                        <div class="col-sm-10">
                          <input name="productname" type="text" class="form-control" id="productname" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category:</label>
                        <div class="col-sm-10">
                          <select name="category" type="email" class="form-control" required>
                            <option value="Motorcycle Parts">Motorcycle Parts</option>
                            <option value="Auto Parts">Auto Parts</option>
                            <option value="Furniture Supplies">Furniture Supplies</option>
                            <option value="Lightings">Lightings</option>
                            <option value="Plastic Wares">Plastic Wares</option>
                            <option value="Electronic Supplies">Electronic Supplies</option>
                            <option value="Hardware Supplies">Hardware Supplies</option>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="supplier" class="col-sm-2 col-form-label">Supplier: </label>
                        <div class="col-sm-10">
                          <select name="supplier" type="email" class="form-control" required>
                            @foreach ($data as $item)
                                <option value="{{$item->supplier_name}}">{{$item->supplier_name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price:</label>
                        <div class="col-sm-3">
                          <input name="price" type="number" step="any" class="form-control" id="stocks" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stocks" class="col-sm-2 col-form-label">Stocks:</label>
                        <div class="col-sm-3">
                          <input name="stocks" type="number" step="1" class="form-control" id="stocks" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-plus"></span> Add</button>
                            <a href="/products" class="btn btn-outline-danger"><span class="mdi mdi-cancel"></span> Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    @extends('includes.bootstrapscript')
    </body>

</html>