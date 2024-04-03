<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Hatem Personal Website</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['admin']==1):?>
                <li class="nav-item"><a class="nav-link" href="showContact.php">Show ContactUs</a></li>
                <?php else:?>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <?php endif;?>
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="resume.php">Resume</a></li>
                <li class="nav-item"><a class="nav-link" href="projects.php">Projects</a></li>
                <?php if(!isset($_SESSION['auth'])):?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <?php else:?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <?php endif;?>
            
            </ul>
        </div>
    </div>
</nav>