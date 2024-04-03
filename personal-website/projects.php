<?php require_once './helpers/dataFunctions.php'?>
<?php require_once './layouts/head.php' ?>
<div class="d-flex flex-column h-100 bg-light" >
        <main class="flex-shrink-0">
        <?php require_once './layouts/nav.php'?>;
            <!-- Projects Section-->
            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
                        </div>
                    <?php if(isset($_SESSION['auth'])&& $_SESSION['auth']['admin']==1):?>
                    <div class="text-center mb-5">
                    <a type="button" class="btn btn-primary" href="./addProject.php">Add Project</a>
                    </div>
                    <?php endif;?>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <?php $projects = readData('./data/projectsData.json');
                        if(!empty($projects)){
                        foreach ($projects as $project):?>
                            <!-- Project Card 1-->
                            <form action="./controllers/deleteProjectController.php" method="post">
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-5">
                                    <input type="hidden" name="id" value="<?php echo $project['id'];?>"> 
                                        <h2 class="fw-bolder"><?php echo $project['name'];?></h2>
                                        <p><?php echo $project['desc'];?></p> 
                                    </div>
                                    <img class="img-fluid" src="<?php echo $project['dest'];?>" alt="..." />
                                </div>
                                <?php if(isset($_SESSION['auth'])&& $_SESSION['auth']['admin']==1):?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <a href="./editProject.php?id=<?= $project['id'] ?>" class="btn btn-warning">Edit</a>
                                <?php endif;?>
                            </div>
                        </div>
                      
                        </form>
                        <?php endforeach;}?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Call to action section-->
            <section class="py-5 bg-gradient-primary-to-secondary text-white">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
                        <?php if(!isset($_SESSION['auth']) || $_SESSION['auth']['admin']==0):?>
                        <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="contact.php">Contact me</a>
                        <?php endif;?>
                    </div>
                </div>
            </section>
        </main>
    <?php require_once './layouts/footer.php' ?>
</div>
<?php require_once './layouts/js.php'; ?>
