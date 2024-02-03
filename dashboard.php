<?php

	session_start();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
 	<style>
    body{
      background-color: white;
      color: black;
    }
 		#sidebarMenu a {
 			color: white;
 		}
     #sidebarMenu {
 			min-height: 100%;
 		}

     a:link, a:visited {
      background-color:  #1ad1ff;
      color: white;
      padding: 14px 25px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    a:hover, a:active {
      background-color: #0099ff;
    }
    
    html,body {
      height: 100%;
      margin: 0;
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
    <nav style="background-color: #0b0c2a;  height: 100%;" id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block sidebar collapse" >
      <div class="position-sticky pt-3" style="background-color: #0b0c2a;  height: 100%;">
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
                    <a class=\"nav-link\" onclick=\"showPayments()\">Payments</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" onclick=\"showMovies()\">Movies</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" onclick=\"showUsers()\">Users</a>
                  </li>
                  <li class=\"nav-item\">
                  <a class=\"nav-link\" onclick=\"showContacts()\">Contacts</a>
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
  function showContacts() {
    var x = document.getElementById("contactsDiv");
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
  function showPayments() {
    var x = document.getElementById("paymentDiv");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

</script>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <?php
   if ($_SESSION['admin'] == 'false') {
    echo "
      <div class='table-responsive' id='bookingDiv'  style='display:none;'>
       <h2>Bookings</h2>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th scope='col'>Movie Name</th>
              <th scope='col'>User</th>
              <th scope='col'>Number of tickets</th>
              <th scope='col'>Date</th>
              <th scope='col'>Time</th>
              <th scope='col'>Totali</th>
            </tr>
          </thead>
          <tbody>";

    include_once 'repository/dashboardRepository.php';

    $dashboardRepository = new DashboardRepository();
    $datas = $dashboardRepository->getData();

    foreach ($datas as $data) {
        echo "
            <tr>
              <td>{$data['name']}</td>
              <td>{$data['username']}</td>
              <td>{$data['s_numbers']}</td>
              <td>{$data['date']}</td>
              <td>{$data['time']}</td>
              <td>{$data['totali']} €</td>
            </tr>";
    }

    echo "
          </tbody>
        </table>
      </div>
			
      <div class='table-responsive'  id='commentDiv'  style='display:none;'>
       <h2>Comments</h2>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th scope='col'>Movie Name</th>
              <th scope='col'>Review</th>
            </tr>
          </thead>
          <tbody>";

    $comments = $dashboardRepository->getComments();
    foreach ($comments as $comment) {
        echo "
            <tr>
              <td>{$comment['name']}</td>
              <td>{$comment['review']}</td>
            </tr>";
    }

    echo "
          </tbody>
        </table>
      </div>";
 }
?>




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
          <th>Edit</th>
          <th>Delete</th>
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
            <td>{$booking['totali']} €</td>
            <td><a href='editBooking.php?id=$booking[id]'>Edit</a> </td>
            <td><a href='deleteBooking.php?id=$booking[id]'>Delete</a></td>
          </tr>";
  }

  echo "
        </tbody>
      </table>
      <a href='insertBooking.php'>Shto Rezervim</a>
    </div>
    ";

  // payments
  echo "
      
  <div class=\"table-responsive\" id='paymentDiv'  style='display:none;'>
  <h2>Payments</h2>
    <table class=\"table table-striped table-sm\">
      <thead>
        <tr>
          <th scope=\"col\">Id</th>
          <th scope=\"col\">Booking id</th>
          <th scope=\"col\">Shuma</th>
          <th scope=\"col\">Card Number</th>
          <th scope=\"col\">Expiry Month</th>
          <th scope=\"col\">Expiry Year</th>
          <th scope=\"col\">CVC</th>
          <th scope=\"col\">Placeholder</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>";

  include_once 'repository/paymentRepository.php';

  $paymentRepository = new PaymentRepository();
  $payments = $paymentRepository->getAllPayments();

  foreach ($payments as $payment) {
      echo "
          <tr>
            <td>{$payment['id']}</td>
            <td>{$payment['booking_id']}</td>
            <td>{$payment['shuma']} €</td>
            <td>{$payment['cardNumber']}</td>
            <td>{$payment['cardExpiryMonth']}</td>
            <td>{$payment['cardExpiryYear']}</td>
            <td>{$payment['cardCVC']}</td>
            <td>{$payment['cardPlaceholder']}</td>
            <td><a href='editPayment.php?id=$payment[id]'>Edit</a> </td>
            <td><a href='deletePayment.php?id=$payment[id]'>Delete</a></td>
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
             <th>Edit</th>
             <th>Delete</th>
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
             <td><a href='editComment.php?id=$comment[id]'>Edit</a> </td>
             <td><a href='deleteComment.php?id=$comment[id]'>Delete</a></td>
           </tr>";
   }

   echo "
         </tbody>
       </table>
       <a href='insertComment.php'>Shto Komente</a>
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
              <th>Edit</th>
              <th>Delete</th>
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
              <td><a href='editMovie.php?id=$movie[id]'>Edit</a> </td>
              <td><a href='deleteMovie.php?id=$movie[id]'>Delete</a></td>
            </tr>";
    }

    echo "
          </tbody>
        </table>
        <a href='insertMovie.php'>Shto Film</a>
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
              <th>Edit</th>
              <th>Delete</th>
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
              <td><a href='editUser.php?id=$user[id]'>Edit</a></td>
              <td><a href='deleteUser.php?id=$user[id]'>Delete</a></td>
            </tr>";
    }

    echo "
          </tbody>
        </table>
          <a href='inseerUser.php'>Shto User</a>
      </div>
      ";

// contact

echo "
  
<div class=\"table-responsive\" id='contactsDiv'  style='display:none;'>
<h2>Contacts</h2>
  <table class=\"table table-striped table-sm\">
    <thead>
      <tr>
        <th scope=\"col\">Id</th>
        <th scope=\"col\">Name</th>
        <th scope=\"col\">Email</th>
        <th scope=\"col\">Message</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>";
include_once 'repository/contactRepository.php';

$contactRepository = new ContactRepository();
$contacts = $contactRepository->getAllContacts();

foreach ($contacts as $contact) {
  echo "
      <tr>
        <td>{$contact['id']}</td>
        <td>{$contact['name']}</td>
        <td>{$contact['email']}</td>
        <td>{$contact['message']}</td>
        <td><a href='deleteContact.php?id=$contact[id]'>Delete</a></td>
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
