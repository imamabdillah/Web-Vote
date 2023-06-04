<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login dosenstaff SEMIRA | BKM UCIC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  <link rel="shortcut icon" href="../../assets/img/logo-bkm.png">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
 <div class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check"></div>
      <div class="login__form">
	  <form method="post" action="logincek.php">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="Username" name="username" autofocus required="required" />
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" placeholder="Password" name="password" required="required" />
        </div>
        <input type="submit" name="simpan" value="Login" class="login__submit"/>
        <!--<button type="button" class="login__submit">Sign in</button>-->
        <p class="login__signup">Kembali ke Web &nbsp;<a href="../../index.php">SEMIRA</a></p>
      </form>
        <!-- hubungi admin -->
        <p class="login__signup">Hubungi Admin &nbsp;<a target="_blank" href="https://wa.me/6285724216454?text=Halo%20Admin%20saya%20butuh%20bantuan">BKM UCIC</a></p>
      </div>
      </div>
    </div>
  </div>
 </div>
<!--  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
-->
</body>
</html>
