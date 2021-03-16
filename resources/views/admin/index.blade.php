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
        <div class="row">

            <form action="/backupdatabase" method="POST">
                @csrf
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                      <h4 class="card-title">BACK-UP DATABASE</h4>
                      <p class="card-text" style="color: red;">Note: To prevent data loss, you must have to back-up the database every hour.</p>
                      <button class="btn btn-outline-success"><span class="mdi mdi-download"></span> BACK-UP NOW</button>
                     
                    </div>
                  </div>
            </form>

            <form action="/restoredatabase" method="POST">
                @csrf
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                      <h4 class="card-title">RESTORE DATABASE</h4>
                      <input type="file" name="file" required>
                      <button class="btn btn-outline-warning mt-2"><span class="mdi mdi-restore"></span> RESTORE</button>
                    </div>
                  </div>
            </form>

        </div>
        @if (session('db-alert'))
            <script>
                alert("DATABASE BACKED UP SUCCESSFULLY");
            </script>
        @elseif(session('rd-alert'))
            <script>
                alert("DATABASE RESTORED SUCCESSFULLY");
            </script>
        @endif
    </div>

    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>