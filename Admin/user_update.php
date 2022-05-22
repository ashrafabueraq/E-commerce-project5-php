<?php
include "security.php";

include_once "include/connect.php";
include_once "include/navbar.php";


if (isset($_POST['edit_user'])) {
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM `user` WHERE `user_id`= $id";
    $statement = $conn->prepare($query);
    $statement->execute();
    $info = $statement->fetch(PDO::FETCH_ASSOC);

}
?>

<div class="container-fluid">
  <div class="card shadow mb-9">
    <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Edit User profile</h5>
          </div>
            <div class="card-body">

                   <div class="modal-body">



<form action="code.php?id=<?php echo $_POST['edit_id']?>" method="post">
          <div class="modal-body">

          <div class="form-group">
              <label for="Username" >
                  Username
                  <input type="text" name="username" class="form-control" placeholder = "Enter Username">
              </label>
          </div>
          <div class="form-group">
              <label for="Email"> Email
                  <input type="email" name="email" class="form-control" placeholder = "Enter Email">
              </label>
          </div>
          <div class="form-group">
              <label for="Password">
                  PASSWORD
                  <input type="password" name="password" class="form-control" placeholder = "Enter Password">
              </label>
          </div>
          <div class="form-group">
              <label for="address">
                  Address
                  <input type="text" name="address" class="form-control" placeholder = "Address">
              </label>
          </div>
          <div class="form-group">
              <label for="address">
                  City
                  <input type="text" name="city" class="form-control" placeholder = "City">
              </label>
          </div>
          <div class="form-group">
              <label for="address">
                  Phone
                  <input type="phone" name="phone" class="form-control" placeholder = "(962) 777 777 777">
              </label>
          </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal" href="user_index.php">Cancel</a>
        <button type="submit" class="btn btn-primary" name="user_update">update</button>
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