<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <style>
  .navbar{
	  background-color:#dee2e6;
	  border:2px solid white;
  }
  .nav-link{
	  	  color:black;

  }
  
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
    
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false ">
              MASTERS
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			 <li><a class="dropdown-item" href="states.php">State</a></li>
              <li><a class="dropdown-item" href="city.php">City</a></li>
			  <li><a class="dropdown-item" href="acts.php">Acts</a></li>
              <li><a class="dropdown-item" href="qualification.php">Qualification</a></li>
			  <li><a class="dropdown-item" href="industry.php">industry</a></li>
			  <li><a class="dropdown-item" href="category.php">category</a></li>

            </ul>
          </li>
		  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              TRANSACTIONS
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="nav_first.php">Addmision</a></li>
              
              <li><a class="dropdown-item" href="mapacts.php">Map acts</a></li>
            <li><a class="dropdown-item" href="actform.php">Form Acts</a></li>

            </ul>
          </li>
		  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              REPORTS
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="nav_display.php">Students view</a></li>
              <li><a class="dropdown-item" href="state_master.php">states view</a></li>
              <li><a class="dropdown-item" href="mapact_display.php">mapacts view</a></li>
		     <li><a class="dropdown-item" href="actform_display.php">formacts view</a></li>

              
            </ul>
          </li>
		  
        </ul>

    </div>
  </nav>

</body>

</html>