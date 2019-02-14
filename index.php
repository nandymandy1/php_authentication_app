<?php

session_start();

include './includes/header.php';
include './includes/_navbar.php';

?>
<!--Main Hero Image-->
<div class="jumbotron">
    <h1 class="display-3">PHP Authentication App</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sed vitae nulla laudantium ut ex
        inventore quasi maxime nam rerum.</p>
    <hr class="my-4">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A, illo doloribus. Nostrum minima id velit.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="./about.php" role="button">Learn more</a>
    </p>
</div>
<!--Main Hero Image-->
<!--Main Content Area-->
<div class="container">
    <div class="row mx-auto">
        <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">About</div>
                <div class="card-body">
                    <h4 class="card-title">Codebook Inc</h4>
                    <p class="card-text">
                        You are watching Codebook Inc. and this is PHP Authentication Series.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Contact Us</div>
                <div class="card-body">
                    <h4 class="card-title">Business Inquires</h4>
                    <p class="card-text">
                        Feel free to contact us and put video tutorial suggestions.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Personal Info</div>
                <div class="card-body">
                    <h4 class="card-title">Narendra Maurya</h4>
                    <p class="card-text">
                        I am your host Narendra Maurya contact me on Facebook @mauryanarendra11
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Personal Info</div>
                <div class="card-body">
                    <h4 class="card-title">Narendra Maurya</h4>
                    <p class="card-text">
                        I am your host Narendra Maurya contact me on Facebook @mauryanarendra11
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