<html>
    <head>
        <title>XYT | Verification</title>
        @extends('includes.bootstrapcss')
    </head>

    <body>
        <br><br><br><br>
        <div class="container">
            <form action="/verify" method="post">
                @csrf
                <h4>Enter code sent to </h4><h2>{{session('pno')}}</h2><input type="hidden" name="phonenumber" value="{{session('pno')}}">
                <div class="col-sm-6">
                    <input type="text/submit" name="code" class="form-control" required autocomplete="off">
                </div>
            </form>
        </div>


        
        @extends('frames.footer')
        @extends('includes.bootstrapscript')
    </body>
</html>