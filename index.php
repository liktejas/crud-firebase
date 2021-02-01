<?php include './includes/partials/header.php' ?>
<?php session_start();?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] != '')
                {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['status'];?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
            <?php
                    unset($_SESSION['status']);
                }
            ?>
        </div>

        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                <?php
                    include './includes/dbconfig.php';
                    $ref = "contact/";
                    $totalnumrows = $database->getReference($ref)->getSnapshot()->numChildren();
                ?>
                    <h1 class="text-center mb-3">Retrieve Data From Firebase <a href="insert.php" class="btn btn-primary float-right">Add Data</a></h1>
                    <h4>Total No. of Records: <?php echo $totalnumrows; ?></h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include './includes/dbconfig.php';
                                $ref = "contact/";
                                $fetchdata = $database->getReference($ref)->getValue();
                                $i=0;
                                if($fetchdata > 0)
                                {
                                    foreach($fetchdata as $key => $row)
                                    {
                                        $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['username'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td>
                                        <a href="edit.php?token=<?php echo $key?>" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="ref_token" value="<?php echo $key; ?>">
                                            <button type="submit" name="delete_data" class="btn btn-danger" onclick="return confirmDelete();">Delete</button>
                                            <script type="text/javascript">
                                                function confirmDelete() {
                                                    return confirm('Are you sure you want to delete this record?');
                                                }
                                            </script>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                                else
                                {
                            ?>
                                    <td colspan="6">No Data Available</td>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './includes/partials/footer.php' ?>