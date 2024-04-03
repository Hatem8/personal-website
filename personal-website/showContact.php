<?php require_once './helpers/dataFunctions.php'?>
<?php require_once './layouts/head.php'?>
<?php if(isset($_SESSION['auth'])&& $_SESSION['auth']['admin']==1):?>
    <div class="d-flex flex-column h-100 bg-light">
    <?php require_once './layouts/nav.php' ?>
        <div class="row">
                <h2 class="border p-2 my-2 text-center">Contact us Messages</h2>
             <div class="d-flex flex-row flex-wrap p-3">
             <?php $contacts = readData('./data/contactUsData.json');
                foreach ($contacts as $contact):
                ?>
             <form action = "./controllers/showContactController.php" method = "post" 
             class="card mx-2 my-2" style="width: 18rem;">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?php echo $contact['id'] ?>"> 
                    <h6 class="card-title">Name: <?php echo $contact['name'] ?></h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Email: <?php echo $contact['email'] ?> </h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Phone: <?php echo $contact['phone'] ?> </h6>
                    <p class="card-text">Message:<?php echo $contact['message'] ?> </p>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            <?php endforeach;?>
            </div>
        </div>
      
    <?php require_once './layouts/footer.php'?>
    </div>
<?php require_once './layouts/js.php'?>
<?php else: echo "اطلع برا ياسطا عيب كده";
endif;?>