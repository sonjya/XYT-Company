<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
        <title>XYT | Reset Password</title>
    </head>

    <body>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Reset Password</h2>
                <br>
                <form method="POST" action="/forgotpassword/reset">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username:</label>
                        <div class="col-sm-10">
                        <input name="username" value='{{session('usernamereset')}}' type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="question" class="col-sm-2 col-form-label">Question:</label>
                        <div class="col-sm-10">
                        <input name="question" value='{{session('questionreset')}}' type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="answer" class="col-sm-2 col-form-label">Answer:</label>
                        <div class="col-sm-10">
                        <input name="answer" type="text" class="form-control" required>
                        </div>
                    </div>

                    <br>
                    <hr>

                    <div class="form-group row">
                        <label for="password1" class="col-sm-2 col-form-label">New Password:</label>
                        <div class="col-sm-10">
                        <input name="password1" type="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password2" class="col-sm-2 col-form-label">Retype Password:</label>
                        <div class="col-sm-10">
                        <input name="password2" type="password" class="form-control" required>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-update"></span> Reset</button>
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