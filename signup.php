<?php require_once 'controllers/authController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!--Bootstrap CSS-->


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="index.css" type="text/css" rel="stylesheet"> 


 




    <title>Talkative | Register</title>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div   class="col-md-4 offset-md-4 form-div">
            <form action="signup.php" method="post">
                <h3 class="text-center">Register</h3>
                

                
 
<?php endif(count($errors) > 0): ?>
<div class="alert alert-danger">
    <?php foreach($errors as $error): ?>
<li><?php echo $error; ?></li>
<?php endforeach; ?>


</div>

<?php endif; ?>



            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control form-control-lg">
            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control form-control-lg">
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control form-control-lg">
            </div>


            <div class="form-group">
                <label for="passwordConf">Confirm Password</label>
                <input type="password" name="passwordConf" class="form-control form-control-lg">
            </div>


            <div class="form-group">
               <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
            </div>


            <p class="text-center">Already a user? <a href="login.php"> Sign In</a></p> 



            </form>
        </div> 
     </div>
</div>



</body>
</html>