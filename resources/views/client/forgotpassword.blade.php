<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
        <title>XYT | Forgot Password</title>
    </head>

    <body>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Forgot Password</h2>
                <br>
                <form method="POST" action="/forgotpassword/request">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Enter Username:</label>
                        <div class="col-sm-10">
                          <input name="username" type="text/submit" class="form-control" required>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-clipboard-search-outline"></span> Request</button>
                            <a href="/login" class="btn btn-outline-danger"><span class="mdi mdi-cancel"></span> Cancel</a>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>