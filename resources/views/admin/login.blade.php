<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        <title>XYT | Login</title>
    </head>

    <body>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-5">
            
                <h1>XYT | Login</h1>
                <form method='post' action='/signin'>
                    @csrf
                    <div class="col-sm-4">
                        <label for="username">Username: </label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="password">Password </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-sm-4">
                        <br><button type="submit" class="btn btn-outline-success">Login</button>
                    </div>
                    <br>
                    <div class="col-sm-5">
                        <a href="/forgotpass">Forgot password?</a>
                    </div>
                    <div class="col-sm-5">
                        <p>Not a member yet? <a href="/register"><u>Register here.</u></a></p>
                    </div>
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{session('msg')}}
                        </div>
                    @endif
                    @if (session('msgerr'))
                        <div class="alert alert-danger" role="alert">
                            {{session('msgerr')}}
                        </div>
                    @endif
                </form>    
            </div>
            
            <div class="col-sm-5 ml-auto">
                <div class="jumbotron">
                    <h1 class="display-4">Hello!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>If you have any concerns, you can call us with our hotline or email us.</p>
                    <p class="lead">
                      <a class="btn btn-outline-info btn-lg" href="#" role="button">About Us</a>
                    </p>
                  </div>
            </div>
    
         </div>
         

    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>