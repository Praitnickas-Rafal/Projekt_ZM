<? php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="/GudalijaSite/SystemLogowanie/css/styleInOut.css">
  <title>Sign In</title>

</head>
<?php include('server.php')?>
<body>
<div class="error">
                <?php include('errors.php'); ?>
</div>
    <section>
        <div class="form-box">
            <div class="form-value">
            <form action="" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="username">
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password_sh">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button type="submit" name="login_user">Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="sign-up.php">Sign Up</a></p>
                        <br>
                        <p>Wrócić do głównej Strony <a href="/GudalijaSite/main.php">Home</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>