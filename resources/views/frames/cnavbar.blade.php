<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/shop"><span class="mdi mdi-package-variant"></span> XYT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/ordertracker"><span class="mdi mdi-shopping-search"></span> Order Tracker</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/shop"><span class="mdi mdi-cart"></span> Shop</span></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/cart"><span class="mdi mdi-cart-outline"></span> Cart <span class="badge badge-pill badge-success">{{session('cart')}}</span><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#"><span class="mdi mdi-account"></span> {{session('name')}}<span class="sr-only">(current)</span></a>
        </li>
        <a class="btn btn-outline-warning my-2 my-sm-0" href="/logout"><span class="mdi mdi-logout-variant"></span> Logout</span></a>
      </ul>
    </div>
  </nav>