<html>
    <head>
        <title>XYT | Admin</title>
        @extends('includes.bootstrapcss')
        @extends('includes.materialdesignicon')
    </head>

    <body>
    @extends('frames.navbar')   
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <h1>WELCOME {{session('name')}} <span class="mdi mdi-emoticon-happy-outline"></span></h1>
    </div>

    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>