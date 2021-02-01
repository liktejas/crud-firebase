<?php include './includes/partials/header.php' ?>


<div class="container mt-5">
    <h1 class="text-center mb-5">Insert Data Into Firebase</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="code.php" method="post">
                <div class="form-group">
                    <label for="username">Enter Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="email">Enter Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="phone">Enter Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <button type="submit" name="save_data" class="btn btn-success">Save Data</button>
                    <a href="index.php" class="btn btn-info ml-5">Go Back</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './includes/partials/footer.php' ?>