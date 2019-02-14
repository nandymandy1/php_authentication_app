<?php
session_start();

include './includes/header.php';
include './includes/_navbar.php';
// Check if the user is already logged in or not
if ($_SESSION['username'] == null) {
    header('Location: ./login.php');
}

            // echo '<pre>';
            // var_dump($_SESSION);
            // echo '</pre>';

?>
<!--Main Content Area-->
<div class="container mt-5">
    <div class="card text-white bg-primary mb-3">
        <div class="card-header">Username: <?php echo $_SESSION['username']; ?></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-lg-2 col-sm-6 col-xs-12">
                    <img src="./assets/img/profile_picture/<?php echo $_SESSION['profile_pic']; ?>"
                        class="img-thumbnail img-fluid" alt="">
                </div>
                <div class="col-md-8 col-lg-10 col-sm-6 col-xs-12">
                    <h4 class="card-title">Email: <?php  echo $_SESSION['email']; ?></h4>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Main Content Area-->
<?php
include './includes/footer.php';
?>