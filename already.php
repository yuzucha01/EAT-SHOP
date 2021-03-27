<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <form method="post" action="signIn.php">
      <h5>既に登録された<br />メールアドレスです</h5>
      <input name="email" placeholder="Email" type="email" />
      <input name="password" placeholder="Password" type="pass" />
      <button type="submit" class="btn">登録する</button>
    </form>
    <form method="post" action="index.php">
      <button type="submit" class="btn">ログイン画面に戻る</button>
    </form>
      <div class="social">
        <button class="tw btn">Twitter</button>
        <button class="fb btn">Facebook</button>
        <button class="google fb btn">Google+</button>
      </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
