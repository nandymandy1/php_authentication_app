<?php
session_start();
include './includes/header.php';
include './includes/_navbar.php';
// Check if the user is already logged in or not
if ($_SESSION['username'] != null) {
    header('Location: ./profile.php');
}
// Database Connection
// Check if there are values or not
if (isset($_POST['register'])) {
    include './classes/DB.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $success = false;
    $error = false;
    $message = '';
    $_POST = [];

    // Check if the fields are not empty
    if ($username != '' && $password != '' && $confirm_password != '' && $email != '') {
        // Check if the Passwords are matching
        if ($password == $confirm_password) {
            // Check if the username is taken
            if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username' => $username))) {
                // Check for the valid username lenght
                if (strlen($username) >= 5 && strlen($username) <= 32) {
                    // Check for the valid username
                    if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
                        // Check for the password length
                        if (strlen($password) >= 6 && strlen($password) <= 60) {
                            // Check for the value email address
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                // Check if the email is already registred
                                if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email' => $email))) {
                                    // Create the user in the Users table
                                    if ($_FILES['profile_picture']) {
                                        $currentDir = getcwd();
                                        $uploadDirectory = '/assets/img/profile_picture/';
                                        $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
                                        $fileName = $_FILES['profile_picture']['name'];
                                        $fileSize = $_FILES['profile_picture']['size'];
                                        $fileTmpName = $_FILES['profile_picture']['tmp_name'];
                                        $fileType = $_FILES['profile_picture']['type'];
                                        $fileExtension = strtolower(end(explode('.', $fileName)));
                                        $imageName = $username.(string) time().'.'.$fileExtension;
                                        $uploadPath = $currentDir.$uploadDirectory.basename($imageName);
                                        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                                    } else {
                                        $fileName = 'default.png';
                                    }
                                    DB::query('INSERT INTO users VALUES (null, :username, :password, :email, :profile_pic)', array(':username' => $username, ':password' => password_hash($password, PASSWORD_BCRYPT), ':email' => $email, ':profile_pic' => $imageName));
                                    $success = true;
                                    $message = 'You account has been registred successfully.';
                                } else {
                                    $message = 'Email in use!';
                                    $error = true;
                                }
                            } else {
                                $message = 'Invalid email!';
                                $error = true;
                            }
                        } else {
                            $message = 'Invalid password!';
                            $error = true;
                        }
                    } else {
                        $message = 'Invalid username';
                        $error = true;
                    }
                } else {
                    $message = 'Invalid username';
                    $error = true;
                }
            } else {
                $message = 'User already exists!';
                $error = true;
            }
        } else {
            $message = 'Passwords are not Matching';
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
    </div><?php
    }
    if ($success) {
        ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hurray! </strong><?php echo $message; ?>
    </div>
    <?php
    }
    ?>
    <div class="card mx-auto">
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="card-header bg-primary text-white">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" class="form-control-file" name="profile_picture" id="profile_picture"
                        aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                        placeholder="Confirm Password">
                </div>
            </div>
            <div class="card-footer">
                <button class="card-link btn btn-primary" name="register" type="submit"
                    value="Register">Register</button>
                <button class="card-link btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
<!--Main Content Area-->
<?php
include './includes/footer.php';
?>