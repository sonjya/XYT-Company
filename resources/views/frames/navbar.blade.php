<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/admin"><span class="mdi mdi-package-variant"></span> XYT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/products">Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/transaction">Transactions <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" data-toggle="modal" data-target="#reportModal">Reports <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Users <span class="sr-only">(current)</span></a>
      </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><span class="mdi mdi-account"></span> {{session('name')}}<span class="sr-only">(current)</span></a>
        </li>
        <a class="btn btn-outline-warning my-2 my-sm-0" href="/logout"><span class="mdi mdi-logout-variant"></span> Logout</span></a>
      </ul>
    </div>
  </nav>

  {{-- this is a modal for reports date picker --}}

  <form action="/reports" method="post">
    @csrf
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sales Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>SELECT DATES</h3> 
            <label for="date1">From: </label>
            <div class="col-sm-10">
              <input type="date" name="date1" id="date1" class="form-control" required>
            </div>
            <label for="date2">To: </label>
            <div class="col-sm-10">
              <input type="date" name="date2" id="date2" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-newspaper"></span> Generate Report</button>
          </div>
        </div>
      </div>
    </div>
  </form>