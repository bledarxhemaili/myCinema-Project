<?php


	session_start();



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Dashboard</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="./css/dashboard.css">
	  <link rel="shortcut icon" type="image/x-icon" href="images/video1.png" />
 	<style>

 		#sidebarMenu a {
 			color: white;
 		}
     #sidebarMenu {
 			min-height: 100%;
 		}

 	</style>
 </head>
 <body>



 <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: black;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" style="background-color: black;">Welcome <?php echo $_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav" style="background-color: black;">
    <div class="nav-item text-nowrap" style="background-color: black;">
      <a class="nav-link px-3" href="logout.php" style="background-color: black;">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid" style="height: 100%;">
  <div class="row">
    <nav style="background-color: #0b0c2a;" id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" >
      <div class="position-sticky pt-3" style="background-color: #0b0c2a;">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Go to Homepage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="showBookings()">Bookings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="showComments()">Comments</a>
          </li>
          <?php
            if ($_SESSION['admin'] == 'true') {
                echo "
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" onclick=\"showMovies()\">Movies</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" onclick=\"showUsers()\">Users</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"upload.php\">Insert a movie</a>
                  </li>
                ";
            }
          ?>
          
      </div>
    </nav>
<script>

  function showMovies() {
    var x = document.getElementById("moviesDiv");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function showUsers() {
    var x = document.getElementById("usersDiv");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function showComments() {
    var x = document.getElementById("commentDiv");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function showBookings() {
    var x = document.getElementById("bookingDiv");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

</script>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <h2>Bookings</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <?php
               if ($_SESSION['admin'] == 'true') {

                echo "<th scope='col'>Book Id</th>";
                }
              ?>
              <th scope="col">Movie Name</th>
              <th scope="col">User</th>
              <th scope="col">Number of tickets</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Totali</th>
            </tr>
          </thead>
          <tbody>

          <?php  
            include_once 'repository/dashboardRepository.php';


            $dashboardRepository = new DashboardRepository();

            $datas = $dashboardRepository->getData();
          
          foreach ($datas as $data) {   ?>
            <tr>
              <?php
                if ($_SESSION['admin'] == 'true') {
                  echo "<td>{$data['id']}</td>";
                }
              ?>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['username']; ?></td>
              <td><?php echo $data['s_numbers']; ?></td>
              <td><?php echo $data['date']; ?></td>
              <td><?php echo $data['time']; ?></td>
              <td><?php echo $data['totali']; ?> €</td>
            </tr>

             <?php  }  ?>

          </tbody>
        </table>
      </div>



			<h2>Comments</h2>
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
            <?php
               if ($_SESSION['admin'] == 'true') {

                echo "<th scope='col'>Comment Id</th>";
                echo "<th scope='col'>User</th>";
                echo "<th scope='col'>Movie Id</th>";
                }
              ?>
							<th scope="col">Movie Name</th>
							<th scope="col">Review</th>
						</tr>
					</thead>
					<tbody>

					<?php 
            include_once 'repository/dashboardRepository.php';

            $dashboardRepository = new DashboardRepository();

            $comments = $dashboardRepository->getComments();
          
          foreach ($comments as $comment) {   ?>
						<tr>
              <?php
                if ($_SESSION['admin'] == 'true') {
                  echo "<td>{$comment['id']}</td>";
                  echo "<td>{$comment['username']}</td>";
                  echo "<td>{$comment['movie_id']}</td>";
                }
              ?>
							<td><?php echo $comment['name']; ?></td>
							<td><?php echo $comment['review']; ?></td>
						</tr>

						 <?php  }  ?>

					</tbody>
				</table>
			</div>


<?php
if ($_SESSION['admin'] == 'true') {

  // bookings
  echo "
      
  <div class=\"table-responsive\" id='bookingDiv'  style='display:none;'>
  <h2>Bookings</h2>
    <table class=\"table table-striped table-sm\">
      <thead>
        <tr>
          <th scope=\"col\">Id</th>
          <th scope=\"col\">Movie_id</th>
          <th scope=\"col\">User_id</th>
          <th scope=\"col\">Number of tickets</th>
          <th scope=\"col\">Date</th>
          <th scope=\"col\">Time</th>
          <th scope=\"col\">Totali</th>

        </tr>
      </thead>
      <tbody>";

  include_once 'repository/bookingRepository.php';

  $bookingRepository = new BookingRepository();
  $bookings = $bookingRepository->getAllBooking();

  foreach ($bookings as $booking) {
      echo "
          <tr>
            <td>{$booking['id']}</td>
            <td>{$booking['movie_id']}</td>
            <td>{$booking['user_id']}</td>
            <td>{$booking['s_numbers']}</td>
            <td>{$booking['date']}</td>
            <td>{$booking['time']}</td>
            <td>{$booking['totali']}</td>
          </tr>";
  }

  echo "
        </tbody>
      </table>
    </div>
    ";

     // commnets

     echo "
      
     <div class=\"table-responsive\" id='commentDiv'  style='display:none;'>
     <h2>Comments</h2>
       <table class=\"table table-striped table-sm\">
         <thead>
           <tr>
             <th scope=\"col\">Id</th>
             <th scope=\"col\">Movie_id</th>
             <th scope=\"col\">User_id</th>
             <th scope=\"col\">Username</th>
             <th scope=\"col\">Review</th>
           </tr>
         </thead>
         <tbody>";

   include_once 'repository/commentRepository.php';

   $commentRepository = new CommentRepository();
   $comments = $commentRepository->getAllComments();

   foreach ($comments as $comment) {
       echo "
           <tr>
             <td>{$comment['id']}</td>
             <td>{$comment['movie_id']}</td>
             <td>{$comment['user_id']}</td>
             <td>{$comment['username']}</td>
             <td>{$comment['review']}</td>
           </tr>";
   }

   echo "
         </tbody>
       </table>
     </div>
     ";


     // movies

    echo "
      
      <div class=\"table-responsive\" id='moviesDiv'  style='display:none;'>
      <h2>Movies</h2>
        <table class=\"table table-striped table-sm\">
          <thead>
            <tr>
              <th scope=\"col\">Id</th>
              <th scope=\"col\">Name</th>
              <th scope=\"col\">Description</th>
              <th scope=\"col\">Category</th>
              <th scope=\"col\">Image</th>
              <th scope=\"col\">Price</th>
            </tr>
          </thead>
          <tbody>";

    include_once 'repository/movieRepository.php';

    $movieRepository = new MovieRepository();
    $movies = $movieRepository->getAllMovies();

    foreach ($movies as $movie) {
        echo "
            <tr>
              <td>{$movie['id']}</td>
              <td>{$movie['name']}</td>
              <td>{$movie['pershkrimi']}</td>
              <td>{$movie['category']}</td>
              <td>{$movie['image']}</td>
              <td>{$movie['qmimi']} €</td>
            </tr>";
    }

    echo "
          </tbody>
        </table>
      </div>
      ";

//  users
      echo "
      
      <div class=\"table-responsive\" id='usersDiv'  style='display:none;'>
      <h2>Users</h2>
        <table class=\"table table-striped table-sm\">
          <thead>
            <tr>
              <th scope=\"col\">Id</th>
              <th scope=\"col\">Firstname</th>
              <th scope=\"col\">Lastname</th>
              <th scope=\"col\">Username</th>
              <th scope=\"col\">Email</th>
              <th scope=\"col\">Number</th>
              <th scope=\"col\">Password</th>
              <th scope=\"col\">Admin</th>

            </tr>
          </thead>
          <tbody>";

    include_once 'repository/userRepository.php';

    $userRepository = new UserRepository();
    $users = $userRepository->getAllUsers();

    foreach ($users as $user) {
        echo "
            <tr>
              <td>{$user['id']}</td>
              <td>{$user['firstname']}</td>
              <td>{$user['lastname']}</td>
              <td>{$user['username']}</td>
              <td>{$user['email']}</td>
              <td>{$user['number']}</td>
              <td>{$user['password']}</td>
              <td>{$user['admin']}</td>
            </tr>";
    }

    echo "
          </tbody>
        </table>
      </div>
      ";

}
?>

    </main>
  </div>
</div>

  </body>
</html>
