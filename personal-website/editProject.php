<?php require_once './layouts/head.php'?>
<div class="d-flex flex-column h-100 bg-light">
<?php require_once './layouts/nav.php' ?>
<?php if($_SERVER['REQUEST_METHOD'] == 'GET'):?>
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Edit Project</h2>
            <?php if (isset($_SESSION['errors'])):
                                foreach ($_SESSION['errors'] as $error):?>
                                <div class="alert alert-danger text-center">
                                        <?php echo $error;?>
                                    </div>
                                <?php endforeach;
                                unset($_SESSION['errors']);
                                endif;
                                ?>
            <form action="./controllers/editProjectController.php" method="POST" class="border p-3" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"> 
                    <div class="form-group p-2 my-1">
                        <label for="name">Project Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group p-2 my-1">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" name="desc" type="text" style="height: 10rem" data-sb-validations="required"></textarea>
                    </div>     
                    <div class="form-group p-2 my-1">
                        <label> Image </label>
                        <input type="file" name="image" class ="form-control">
                    </div>           
                    <div class="form-group p-2 my-1">
                        <input type="submit" value="Add" class="form-control">
                    </div>
            </form>
        </div>
    </div>
    <?php endif;?>
    <?php require_once './layouts/footer.php'?>
</div>
<?php require_once './layouts/js.php'?>
