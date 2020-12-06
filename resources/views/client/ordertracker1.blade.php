<html lang="en">
    <head>
        <title>XYT | Order Tracker</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
         <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><span class="mdi mdi-package-variant"></span> XYT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/ordertracker"><span class="mdi mdi-shopping-search"></span> Order Tracker</span></a>
            </li>
            <a class="btn btn-outline-light my-2 my-sm-0" href="/login"><span class="mdi mdi-login-variant"></span> Login</span></a>
          </ul>
        </div>
      </nav>
      <!--navbar-->
      <br><br><br>

      <div class="container">
        <form action="/trackorder" method="POST">
            @csrf
            <div class="row">
              <label for="search" class="col-sm-2 col-form-label">Tracking Number:</label>
              <div class="col-sm-10">
                <input name="search" type="text/submit" class="form-control" required>
              </div>
            </div>
        </form>

        <hr>
        <br><br><br>
        @if (session('tracked')==='pending')
          <h2>Hello! Our team still working on your order and is currently pending for review. We're sorry for any inconvenience. You can contact us as <u>info@xyt.com</u>, thank you!</h2>
        @elseif(session('tracked')==='processing')
          <h2>Hello! We are now processing your order and preparing to ship the items from our hub to your door. Thank you!</h2>
        @elseif(session('tracked')==='receiving')
          <h2>Hello! We're happy to tell you that our team already shipped your parcel and is not heading to your address. Expect the item in no time! Thank you.</h2>
        @elseif(session('tracked')==='completed')
          <h2>Hello! Thank you for your purchase at our store, <a href="/login">shop again!</a></h2>
        @elseif(session('msgerr'))
          <h2>Sorry we can't find your parcel at this moment. Make sure that you entered the correct Tracking ID.</h2>
        @endif

      </div>




        @extends('frames.footer')
        @extends('includes.bootstrapscript')
    </body>

</html>