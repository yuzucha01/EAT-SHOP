<?php

session_start();

include("funcs.php");
loginCheck();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EAT SHOP</title>
    <link rel="stylesheet" href="css/form.css" />
  </head>
  <body>
    <form id="contact" method="post" action="form-act.php">
      <div class="container">
        <div class="head">
          <h2>Say Hello</h2>
        </div>
        <div class="home">
        <a href="./top-page.php"><img src="./img/家の無料アイコンのコピー.png"></a>
        </div>
        <input type="email" name="email" placeholder="Email" /><br />
        <textarea type="text" name="message" placeholder="Message"></textarea>
        <div class="message">Message Sent</div>
        <button id="submit" type="submit">Send</button>
      </div>
    </form>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </body>
</html>


