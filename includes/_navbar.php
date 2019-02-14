<!--Navigation-->
<nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">PHP Authentication App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
        aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($_SESSION['username'] != null) {
    ?>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">User Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php
} else {
        ?>

            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <?php
    } ?>

        </ul>
    </div>
</nav>
<!--Navigation-->