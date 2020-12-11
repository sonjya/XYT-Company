<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
        <title>XYT | Register</title>
    </head>

    <body>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Register</h2>
                <br>
                <form method="POST" action="/registration">
                    @csrf
                    <h4><u>Client Details</u></h4><br>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-2 col-form-label">Full Name:</label>
                        <div class="col-sm-10">
                          <input name="fullname" type="text" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email: </label>
                        <div class="col-sm-10">
                          <input name="email" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number: </label>
                        <div class="col-sm-10">
                          <input name="phonenumber" type="number" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-sm-2 col-form-label">Address: </label>
                      <div class="col-sm-10">
                        <input name="address" type="text" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="bday" class="col-sm-2 col-form-label">Birth Date: </label>
                      <div class="col-sm-10">
                        <input name="bday" type="date" class="form-control" required>
                      </div>
                    </div>

                    <br>
                    <hr>

                    <h4><u>Client Credentials</u></h4><br>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username: </label>
                        <div class="col-sm-10">
                          <input name="username" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password1" class="col-sm-2 col-form-label">Password: </label>
                        <div class="col-sm-10">
                          <input name="password1" type="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password2" class="col-sm-2 col-form-label">Retype Password: </label>
                        <div class="col-sm-10">
                          <input name="password2" type="password" class="form-control" required>
                        </div>
                    </div>

                    <br>
                    <hr>
                    
                    <h4><u>Client Security</u></h4><br>
                    <div class="form-group row">
                        <label for="question" class="col-sm-2 col-form-label">Question: </label>
                        <div class="col-sm-10">
                          <select name="question" type="email" class="form-control" required>
                            <option value="What is the name of your first pet?">What is the name of your first pet?</option>
                            <option value="What are you afraid of?">What are you afraid of?</option>
                            <option value="What is you favorite color?">What is you favorite color?</option>
                            <option value="Who do you love the most?">Who do you love the most?</option>
                            <option value="What are you thinking of?">What are you thinking of?</option>
                            <option value="Where do you live?">Where do you live?</option>
                            <option value="What is the name of your first child?">What is the name of your first child?</option>
                            <option value="What is your favorite thing?">What is your favorite thing?</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="answer" class="col-sm-2 col-form-label">Answer: </label>
                        <div class="col-sm-10">
                          <input name="answer" type="text" class="form-control" required>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <p>By clicking Register, you agree to our Terms, Data Policy and Cookies Policy. You may receive SMS Notifications from us and can opt out any time.</p>
                    @if (session('msgerr'))
                        <div class="alert alert-danger" role="alert">
                            {{session('msgerr')}}
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-content-save"></span> Register</button>
                            <a href="/login" class="btn btn-outline-danger"><span class="mdi mdi-cancel"></span> Cancel</a>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>