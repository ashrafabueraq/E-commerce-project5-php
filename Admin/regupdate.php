<?php
include "security.php";

include_once "include/connect.php";
include_once "include/navbar.php";

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM `admin` WHERE `admin_id`= $id";
    $statement = $conn->prepare($query);
    $statement->execute();
    $info = $statement->fetch(PDO::FETCH_ASSOC);


    

}
?>

<div class="container-fluid">
  <div class="card shadow mb-9">
    <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Edit Admin profile</h5>
          </div>
            <div class="card-body">
   
                   <div class="modal-body">




                                        <form action="code.php?id=<?php echo $_POST["edit_id"]?>" method="post">
                                            <div class="form-group">
                                                <label for="Username" >
                                                    Username
                                                    <input type="text" name="edit_username" class="form-control" placeholder = "Enter Username" value="<?php echo  $info['admin_name'] ?>">
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email"> Email
                                                    <input type="email" name="edit_email" class="form-control" placeholder = "Enter Email" value="<?php echo  $info['admin_email'] ?>">
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">
                                                    PASSWORD
                                                    <input type="password" name="edit_password" class="form-control" placeholder = "Enter Password" value="<?php echo  $info['admin_password'] ?>">
                                                </label>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <a  class="btn btn-secondary" data-dismiss="modal" href="register.php">Cancel</a>
                                        
                                            <button type="submit" class="btn btn-primary" name="edit_update">Update</button>
                                        </div>
                                    </form>


                        </div>
                    </div>
                </div>
</div>

<?php
include_once "include/scripts.php";
include_once "include/footer.php";

?>