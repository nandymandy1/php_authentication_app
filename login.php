<?php
session_start();
include './includes/header.php';
include './includes/_navbar.php';
// Check if the user is already logged in or not
if ($_SESSION['username'] != null) {
    header('Location: ./profile.php');
}

// Check if there are values or not
if (isset($_POST['login'])) {
    include './classes/DB.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $success = false;
    $error = false;
    $message = '';
    $_POST = array();

    if ($username != '' && $password != '') {
        // Check if the user is registered or not
        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username' => $username))) {
            // Verify Password
            if (password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array(':username' => $username))[0]['password'])) {
                // Set the session Variable with the user
                $user = DB::query('SELECT username, email, profile_pic FROM users WHERE username=:username', array(':username' => $username));
                session_start();
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['profile_pic'] = $user[0]['profile_pic'];
                // Redirect to the profile page
                header('Location: ./profile.php');

            // echo '<pre>';
                // var_dump($user);
                // echo '</pre>';
            } else {
                $message = 'Incorrect password! Please enter the correct password.';
                $error = true;
            }
        } else {
            $message = 'User is with username '.$username.' is not registred';
            $error = true;
        }
    } else {
        $message = 'Please fill in a the details';
        $error = true;
    }
}
?>
<!--Main Content Area-->
<div class="container mt-3 mb-3">
    <?php
    if ($error) {
        ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oh snap! </strong><?php echo $message; ?>
    </div>
    <?php
    }
    ?>
    <div class="card mx-auto">
        <form action="login.php" method="POST">
            <div class="card-header bg-primary text-white">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="card-footer">
                <button class="card-link btn btn-primary" name="login" type="submit" value="Login">Login</button>
                <button class="card-link btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
<!--Main Content Area-->
<?php
include './includes/footer.php';
?>