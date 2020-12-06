<html>
    <head>
        <title>XYT | Transactions</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
    @extends('frames.navbar')
    <br><br><br>
    
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Tracking ID</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Total Amout</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Last Update</th>
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
                    <td>
                        @if ($item->active===0)
                            
                        @else
                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     
                                </button>
                                <div class="dropdown-menu">
                                @if ($item->status==='pending')
                                    <a class="dropdown-item" href="/transaction/processing/{{$item->id}}">Processing</a>
                                @elseif($item->status==='processing')
                                    <a class="dropdown-item" href="/transaction/pending/{{$item->id}}">Pending</a>
                                    <a class="dropdown-item" href="/transaction/receiving/{{$item->id}}">Receiving</a>
                                @elseif($item->status==='receiving')
                                    <a class="dropdown-item" href="/transaction/pending/{{$item->id}}">Pending</a>
                                    <a class="dropdown-item" href="/transaction/completed/{{$item->id}}">Completed</a>                      
                                @endif
                                </div>
                            </div>                    
                        @endif
                    </td>
                    <td>{{$item->updatedby}} on {{$item->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @extends('frames.footer')
    @extends('includes.bootstrapscript')
   </body>

</html>