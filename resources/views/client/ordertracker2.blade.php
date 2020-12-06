<html lang="en">
    <head>
        <title>XYT | Order Tracker</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
        @extends('frames.cnavbar')
        {{$pending=0,$ship=0,$receive=0,$completed=0}}
        @foreach ($data as $item)
          @if($item->status==='pending' && $item->active===1){
            {{$pending = $pending + 1}}
          @elseif($item->status==='processing' && $item->active===1){
            {{$ship = $ship + 1}}
          @elseif($item->status==='receiving' && $item->active===1){
            {{$receive = $receive + 1}}
          @elseif($item->status==='completed' && $item->active===0){
            {{$completed = $completed + 1}}
          @endif
        @endforeach
        <br><br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title"><span class="mdi mdi-list-status"></span> To Process <span class="badge badge-pill badge-success">{{$pending}}</span></h5>
                        </div>
                      </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><span class="mdi mdi-truck"></span> To Ship <span class="badge badge-pill badge-success">{{$ship}}</span></h5>
                        </div>
                      </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><span class="mdi mdi-package"></span> To Receive <span class="badge badge-pill badge-success">{{$receive}}</span></h5>
                        </div>
                      </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><span class="mdi mdi-check-all"></span> Completed <span class="badge badge-pill badge-success">{{$completed}}</span></h5>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <br><hr><br>
        <div class="container">
          <div class="row">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Tracking Number</th>
                  <th scope="col">Name</th>
                  <th scope="col">Total Amount</th>
                  <th scope="col">Payment Method</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                  <td>{{$item->trackingID}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->price}}</td>
                  <td>{{$item->paymentmethod}}</td>
                  <td>{{$item->status}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>  
          </div>
        </div>


        @extends('frames.footer')
        @extends('includes.bootstrapscript')
    </body>

</html>