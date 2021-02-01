<?php include './includes/partials/header.php' ?>


<div class="container mt-5">
    <h1 class="text-center mb-5">Update Data Into Firebase</h1>
    <?php
        $token = $_GET['token'];
        include './includes/dbconfig.php';
        $ref = "contact/".$token;
        $getdata = $database->getReference($ref)->getValue();
    ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="code.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token;?>">
                <div class="form-group">
                    <label for="username">Enter Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $getdata['username']; ?>" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="email">Enter Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $getdata['email']?>" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="phone">Enter Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $getdata['phone']?>" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <button type="submit" name="update_data" class="btn btn-success">Update Data</button>
                    <a href="index.php" class="btn btn-info ml-5">Go Back</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './includes/partials/footer.php' ?>