<!DOCTYPE html>
<html>
     <head>
          <title>Smart Fan - Hello!</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     </head>
     <body>
          <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
               <form class="border shadow p-3 rounded" style="width:450px;">
                    <h1 class="text-center p-3">Let's Get Started</h1>
                    <div class="d-grid gap-2 d-md-block text-center">
                         <button type="button" class="btn btn-success" onclick="location.href='nav/login.php'">Login</a></button>
                         <button type="button" class="btn btn-secondary" onclick="location.href='nav/signin.php'">Sign Up</a></button>
                    </div>
               </form>
          </div>
     </body>
     <?php include "addons/scripts/scripts.php"; ?>
</html>