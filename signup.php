<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./backend.css">
</head>
<body>
    
    <main>
      <div class="container  " style=" max-width: 22.7%; ">
         <div class="form" style=" ">
           <form class="form-signup p-4 " style=" width:349px; heigh:452px;" action="process-signup.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal p-5">𝓘𝓷𝓽𝓪𝓻𝓰𝓻𝓪𝓶</h1>
             <label for="inputUser" class="sr-only">User Name</label>
                <input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Username" required autofocus>
             <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email address" required autofocus>
             <label for="inputPassword" class="sr-only" >Password</label>
                <input type="password" id="inputPassword" name="txtPass" class="form-control" placeholder="Password" required>
             <label for="inputRetypePassword" class="sr-only" >Password</label>
                <input type="password" id="inputRytypePassword" name="txtPass2" class="form-control" placeholder="RetypePassword" required>
                <div class="checkbox mb-3">
                   <label>
                    <input type="checkbox" value="remember-me"> Remember me
                   </label>
                  <?php
                      if(isset($_GET['error'])){
                          echo "<h5 style='color:red'> {$_GET['error']} </h5>";
                         }

                   ?>
                </div>
                 <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnSignUp" >Sign Up</button>
                   <hr class="dropdown-divider">
                        <label for="inputPassword" class="sr-only">Have an account?</label>
                        <a class="signup-item" href="./index.php"> Log in </a>
                        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
              </form>
             </div> 
      </div>    
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>