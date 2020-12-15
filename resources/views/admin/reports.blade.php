<html>
    <head>
        <title>XYT | Sales Report</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
    @extends('frames.navbar')
    {{$total=0}}
    <br><br><br>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Tracking Number</th>
                <th scope="col">Client Name</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                <tr>
                    <td>{{$item->trackingID}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->paymentmethod}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->created_at}}</td>
                    <input type="hidden" value="{{$total += $item->price}}">
                </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          <hr>
          <h5>Sales Report from <strong>{{session('datefrom')}}</strong> to <strong>{{session('dateto')}}</strong></h5>
          <hr>
          <div class="row">
                <div class="col-sm-2"> </div>

                <div class="col-sm-4">
                    <div class="card" style="width:17rem;">
                        <div class="card-header bg-dark text-white">
                            <strong>Total Sales</strong>
                        </div>
                        <div class="card-body">
                            <h2><strong> PHP {{$total}} </strong></h2>
                        </div>
                    </div>
                </div>
            
                <div class="col-sm-3 m-5">
                    <input type="button" class="btn btn-outline-success" onclick="window.print()" value="Print Generated Sales Report">
                </div>
          </div>
    </div>
      
     
    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>