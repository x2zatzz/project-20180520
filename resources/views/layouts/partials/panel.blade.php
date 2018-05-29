<header class="navbar navbar-expand-lg navbar-light bg-light">
  <figure class="navbar-brand">
    <a href="/">
      <img class="img-fluid" style="width:30px; height:30px" src="dev-assets/mjta-v01-500dpi-521px.png" >
    </a>
  </figure>

  <h1 class="navbar-brand">Inventory Tracking Web Application</h1>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <nav class="collapse navbar-collapse" id="navbarNav" >
    <ul class="navbar-nav mr-auto">


      @if(Auth::check())
        @if($role == 'staff')
        <li class="nav-item"><a class="nav-link" href="authcheck">Log-off</a></li>
        <li class="nav-item"><a class="nav-link" href="profile">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="inventory">Check-Out Item</a></li>
        @elseif($role == 'manager')
        <li class="nav-item"><a class="nav-link" href="authcheck">Log-off</a></li>
        <li class="nav-item"><a class="nav-link" href="profile">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="inventory">Check-In Item</a></li>
        <li class="nav-item"><a class="nav-link" href="accounts">Account Management</a></li>
        @else
          <li class="nav-item"><a class="nav-link" href="auth">Sign-In</a></li>
        @endif
      @else
        <li class="nav-item"><a class="nav-link" href="auth">Sign-In</a></li>
      @endif
    </ul>
  </nav>

</header>