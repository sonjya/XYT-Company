<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
        <title>XYT</title>
    </head>

    <body>
    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/admin"><span class="mdi mdi-package-variant"></span> XYT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <ul class="navbar-nav ml-auto">
            <a class="btn btn-outline-light my-2 my-sm-0" href="/login"><span class="mdi mdi-login-variant"></span> Login</span></a>
          </ul>
        </div>
      </nav>
      <!--navbar-->
      
      <br><br><br>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Welcome to XYT Company</h1>
          <p class="lead">XYT Company offers online market with a wide variety of options from motorcycle parts, auto parts, 
              furniture supplies, lightings, plastic wares, electronic supplies and hardware supplies. We connect 
              suppliers direct to consumers with just a few clicks at your fingertips</p>
          <p class="lead">Avoid the long queue in the market. Shop now and have your basic needs delivered to you!</p>
          <p class="lead">Questions? <a href="#"> Contact us.<a></p></p>
        </div>
      </div>

      <div class="container">
          <h5>How to Order?</h5>
          <div class="row">
            <div class="col-sm-3">
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Step 1</div>
                    <div class="card-body text">
                      <h5 class="card-title text-primary">Login</h5>
                      <p class="card-text">You can access shop once you're logged in.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Step 2</div>
                        <div class="card-body text">
                            <h5 class="card-title text-primary">Add to Cart</h5>
                            <p class="card-text">Add your selected item to cart.</p>
                        </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Step 3</div>
                        <div class="card-body text">
                            <h5 class="card-title text-primary">Check-Out</h5>
                            <p class="card-text">Fill your address details and payment method.</p>
                        </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Step 4</div>
                        <div class="card-body text">
                            <h5 class="card-title text-primary">Delivery</h5>
                            <p class="card-text">Your parcel will be delivered as soon as possible</p>
                        </div>
                </div>
            </div>
          </div>
      </div>
    
  
     @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>