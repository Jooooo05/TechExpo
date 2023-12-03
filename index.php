<?php

    session_start();

    require_once("function/helper.php");
    require_once("function/koneksi.php");
    require_once("function/function.php");

    if( isset($_SESSION["login"]) ) {
        if ( $_SESSION["role"] == "admin" ) {
            header("Location:" . BASE_URL . "dashboardAdmin.php?page=admin");
            exit;
        }else {
            header("Location:" . BASE_URL . "dashboardUser.php?page=user");
            exit;
        }
    }

    

    // login logic
    if( isset($_POST["login"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query(
            $koneksi, 
            "SELECT * FROM users WHERE email = '$email'"
        );

        if( mysqli_num_rows($result) === 1 ) {
            // cek password
            $row_login = mysqli_fetch_assoc($result);
            
            if( password_verify($password, $row_login["password"]) ){
                $_SESSION["login"] = true;
                $_SESSION["user_data"] = $row_login;
                
                $idUserLogin = (int) $row_login["id"];
                $queryUserProfile = mysqli_query(
                    $koneksi, 
                    "SELECT * FROM user_profiles WHERE user_id = $idUserLogin"
                );

                if(mysqli_num_rows($queryUserProfile) === 1){
                    $dataProfile = mysqli_fetch_assoc($queryUserProfile);
                    $_SESSION["user_profile"] = $dataProfile;
                }
                
                if( $row_login["role"] == "admin" ) {
                    header("Location:" . BASE_URL . "dashboardAdmin.php?page=admin");
                    $_SESSION["role"] = "admin";
                    exit;
                }else{
                    header("Location:" . BASE_URL . "dashboardUser.php?page=user");
                    exit;
                }
            }
        }

        $error = true;
    }




    // register logic
    if( isset($_POST["register"]) ) {

        if ( register($_POST) > 0) {
            echo "
                <script>
                    alert('user baru berhasil ditambahkan!')
                </script>
            ";
        } else {
            echo mysqli_error($koneksi);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Expo</title>
    
    
    <!-- google fonts -->   
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Lato:wght@300;400;700;900&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- google fonts -->
    
    <!-- <link rel="stylesheet" href="assets/css/styleSatu.css"> -->
    <link href="assets/css/styleSatu.css" rel="stylesheet">


</head>
<body>

        <?php if( isset($error) ) : ?>
            <div class="">
                <p class="">Username / Password salah</p>
            </div>
        <?php endif; ?>
    

        <div class="container">

            <!-- form login -->
                <div class="form-box login">
                    <h2>Login</h2>
                    
                    <form action="" method="post">

                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="email" name="email" required>
                                <label for="email">Email</label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="password" name="password" required>
                                <label for="password">Pasword</label>
                            </div>

                            <div class="remember-forgot">
                                <label for=""><input type="checkbox"> Remember me</label>
                            </div>

                            <button type="submit" name="login" class="btn">Login</button>

                            <div class="login-register">
                                <p>Don't have an account <span class="register-link">Register!</span></p>
                            </div>
                        </form>
                </div>
            <!-- form login -->

            <!-- form registration -->
                <div class="form-box register">
                    <h2>Registration</h2>
                    
                    <form action="" method="post">

                        <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text" name="username_register" required>
                            <label>Username</label>
                        </div>
                        
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email_register" required>
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password_register" required>
                            <label >Pasword</label>
                        </div>

                        <div class="remember-forgot">
                            <label for=""><input type="checkbox"> agree to the terms & conditions </label>
                        </div>

                        <button type="submit" name="register" class="btn">Register</button>

                        <div class="login-register">
                            <p>Already have an account <span class="login-link">Login!</span></p>
                        </div>
                    </form>

                </div>
            <!-- form registration -->
        </div>
        

        <!-- my script -->
        <script src="assets/js/script.js"></script>
        <!-- my script -->
        
        <!-- icons -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        

        <script>

        </script>
</body>
</html>