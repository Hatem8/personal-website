<?php require_once './layouts/head.php'?>
<div class="d-flex flex-column h-100 bg-light">
<?php require_once './layouts/nav.php' ?>
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Login</h2>
            <?php if (isset($_SESSION['errors'])):
            foreach ($_SESSION['errors'] as $error):?>
            <div class="alert alert-danger text-center">
                    <?php echo $error;?>
                </div>
            <?php endforeach;
            unset($_SESSION['errors']);
            endif;
            ?>
            <form action="./controllers/loginController.php" method="POST" class="border p-3">
                <div class="form-group p-2 my-1">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group p-2 my-1">
                    <input type="submit" value="Login" class="form-control">
                </div>
            </form>
        </div>
    </div>
    <?php require_once './layouts/footer.php'?>
</div>
<?php require_once './layouts/js.php'?>
