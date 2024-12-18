<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Tracer</title>
    <link rel="stylesheet" href="/AlumniTracer/css/Login.Css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script src="/AlumniTracer/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <p id="message"></p>
  <body>
    <div class="container flex">
    <?php if(isset($_REQUEST['error'])){ ?>
      <script>
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Invalid Login Details!",
        });
      </script>
    <?php }?>
      <div class="facebook-page flex">
        <div class="text">
          <h1>Alumni Tracer</h1>
          <p>Connect with Batchmates</p>
        </div>
          <form action="/AlumniTracer/classes/Controller.php?a=login" method="post">
          <input type="email" id="email" name="email" placeholder="Email" required>
          <input type="password" id="password" name="password" placeholder="Password" required>
          <div class="link">
            <button type="submit" id="login"class="login">Login</button>
          </div>
          <hr>
          <div class="button">
            <a href="Register.php">Create new account</a>
          </div>
        </form>
      </div>
    </div>
</body>