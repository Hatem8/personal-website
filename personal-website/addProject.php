<?php require_once './layouts/head.php'?>
<div class="d-flex flex-column h-100 bg-light">
<?php require_once './layouts/nav.php' ?>
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Add Project</h2>
            <?php if (isset($_SESSION['errors'])):
                                foreach ($_SESSION['errors'] as $error):?>
                                <div class="alert alert-danger text-center">
                                        <?php echo $error;?>
                                    </div>
                                <?php endforeach;
                                unset($_SESSION['errors']);
                                endif;
                                ?>
                                 <?php if (isset($_SESSION['success'])):
                                foreach ($_SESSION['success'] as $succ):?>
                                <div class="alert alert-success text-center">
                                        <?php echo $succ;?>
                                    </div>
                                <?php endforeach;
                                unset($_SESSION['success']);
                                endif;
                                ?>
            <form action="./controllers/addProjectController.php" method="POST" class="border p-3" enctype="multipart/form-data">

                    <div class="form-group p-2 my-1">
                        <label for="projectName">Project Name</label>
                        <input type="text" name="projectName" class="form-control" id="projectName">
                    </div>
                    <div class="form-group p-2 my-1">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" type="text" style="height: 10rem" data-sb-validations="required"></textarea>
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
    <?php require_once './layouts/footer.php'?>
</div>
<?php require_once './layouts/js.php'?>
