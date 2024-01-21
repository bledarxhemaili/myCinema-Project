<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                    <a href="./index.php"><img src="images/logo.png" alt="" class="logo"></a>
            </div>           
            <div class="col-lg-10" style="display: flex; justify-content: flex-end ; align-items: center;">
                        <ul id="buttons">
                            <li><a href="./index.php">Homepage</a></li>
                            <li><a href="./signupforma.php">Sign Up</a></li>
                            <li><a href="./login.php">Log In</a></li>
                        </ul>     
            </div>
        </div>
    </div>
</header>

<div class="container"  style="display: flex; align-items: center; justify-content: center; margin-top: 5%;">
  <div class="col-lg-6" style="display: flex; align-items: center; justify-content: center;">
    <img src="images/cred3.png" alt="" style="width: 60%;">
  </div>

</div>

  <div class="container" id="booking">
            
              <div class="col-lg-6 text-center" style="color: white; margin-top: 2%;">
                <h2>Book your ticket</h2>
                    <p>Choose the date, time and number of seats</p>
              </div>
              <div class="col-md-6">
                <input class="form-control nr" type="number" name="s_numbers" placeholder="Number of seats" min="1" id="seatNr">
              </div>

      <div class="rresht">
          <div class="b2">
           <div class="form-label">
             <select class="b1"  name="date" value="Date">
          <option value="" disabled selected hidden>Date</option>
           <option>01.12.2023</option>
           <option>02.12.2023</option>
           <option>03.12.2023</option>
           <option>04.12.2023</option>
           <option>05.12.2021</option>
           <option>06.12.2023</option>
           <option>07.12.2023</option>
           <option>08.12.2023</option>
           <option>09.12.2023</option>

         </select>
         </div>
       </div>

       <div class="b2">
        <div class="form-label">
          <select class="b1"  name="time" placeholder="Time">
            <option value="" disabled selected hidden>Time</option>
        <option>10:10</option>
        <option>11:15</option>
        <option>12:20</option>
        <option>13:25</option>
        <option>14:30</option>
        <option>15:35</option>
        <option>16:40</option>
        <option>17:45</option>
        <option>18:50</option>
        <option>19:55</option>

      </select>
      </div>
    </div>


  </div>
  <div class="rresht">
    <h5><span>Price for one seat:</span> 4.80€</h5>
    <h5 id="result">Total :</h5>
  </div>


    <div class="row-lg-12">
        <button class="submit-btn" type="submit" name="submit" onclick="calculateAndDisplay() ">Book Now</button>
    </div>
  
</div>




<script>
  function calculateAndDisplay() {
      // Merr vlerën nga input-i
      var inputValue = document.getElementById("seatNr").value;

      // Kryej kalkulimin (p.sh., shto 5)
      var result = parseFloat(inputValue) * 4.8;

      // Shfaq rezultatin në elementin me id "result"
      document.getElementById("result").innerText = "Total : " + result + "€";
  }
</script>

<footer class="footer1">
  <div class="container">
      <div class="row">
          <div class="col-lg-3">
                  <a href="./index.html"><img src="images/logo.png" alt="" class="logo"></a>
          </div>
          <div class="col-lg-6" style="display: flex; align-items: center; justify-content: center;">
                  <ul id="buttons">
                      <li><a href="./index.html">Homepage</a></li>
                      <li><a href="./signupforma.html">Sign Up</a></li>
                      <li><a href="./login.html">Log In</a></li>
                  </ul>
          </div>
          <div class="col-lg-3" style="display: flex; align-items: center; justify-content: center;">
              <p style="margin: 0;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
          </div>
        </div>
    </div>
</footer>

</body>
</html>