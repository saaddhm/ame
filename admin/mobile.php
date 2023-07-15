<!DOCTYPE html>
<html>
<head>
  <title>Coming Soon</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
      padding: 50px;
      height:100vh;
    }

    h1 {
      font-size: 36px;
      color: #333;
    }

    p {
      font-size: 18px;
      color: #666;
    }

    .countdown {
      font-size: 24px;
      margin-top: 20px;
      color: #666;
    }
  </style>
</head>
<body>
  <h1>Coming Soon</h1>
  <p>We're working hard to bring you an amazing website & app mobile.</p>
  <div class="countdown" id="countdown"></div>

  <script>
    // Set the countdown date
    var countDownDate = new Date("2023-08-01T00:00:00Z").getTime();

    // Update the countdown every 1 second
    var countdown = setInterval(function() {
      // Get the current date and time
      var now = new Date().getTime();

      // Find the distance between now and the countdown date
      var distance = countDownDate - now;

      // Calculate days, hours, minutes, and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the countdown
      document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the countdown is finished, display a message
      if (distance < 0) {
        clearInterval(countdown);
        document.getElementById("countdown").innerHTML = "We're here!";
      }
    }, 1000);
  </script>
</body>
</html>
