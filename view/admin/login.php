<?php
session_start();
ob_start();

include "../../model/pdo.php";
include "../../model/taikhoan.php";

if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = checkuser($email, $password);

    if(isset($user)&& (is_array($user)) && (count($user)> 0)){
        extract($user);
        if ($role == 1) {
            $_SESSION['s_user'] = $user;
            header('location: index.php?act=thongke'); 
            
        } else {
            $tb="Tài khoản không tồn tại";
        }
    }else{
        $tb="Tài khoản không tồn tại";
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <style>
    h3 {
        color: red
    }
    </style>
    <!-- <link href="css/styles.css" rel="stylesheet" /> -->
    <link href="./style/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email"
                                                placeholder="name@example.com" name="email" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" name="password" />
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <?php
                                            if(isset($tb) &&  ($tb!="")){
                                            echo "<h3>".$tb."</h3>" ;
                                            }
                                        ?>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                            <input type="submit" class="btn btn-primary" name="dangnhap" value="Login">

                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <!-- <script src="js/scripts.js"></script> -->
    <script src="./style/js/scripts.js"></script>
</body>

</html>