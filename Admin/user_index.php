
<?php
include "security.php";

include "include/connect.php";
include "include/navbar.php";

?>


<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="post">
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
        <button type="submit" class="btn btn-primary" name="user_reg">add</button>
      </div>
    </form>
   </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-9">
                        <div class="card-header py-3">
                            <h5 class="mg-0 font-weight-bold text-primary">User profile</h5>
                            <button type ="button" class="btn btn-primary"  data-toggle="modal" data-target="#addadminprofile">
                                   Add User Profile
                                </button >
                        </div>
                        <div class="card-body">
                            <?php
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
    echo "<div class='alert alert-primary' role='alert'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo "<div class='alert alert-warning' role='alert'>" . $_SESSION['status'] . "</div>";
    unset($_SESSION['status']);
}
?>
                                                                                                <div class="table-responsive">
                                                                                                    <?php
$query = "SELECT * FROM user";
$statement = $conn->prepare($query);
$statement->execute();
$info = $statement->fetchALL(PDO::FETCH_ASSOC);
?>
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($info as $key => $val): ?>
                                             <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $val['username'] ?></td>
                                            <td><?php echo $val['email'] ?></td>
                                            <td><?php echo $val['password'] ?></td>
                                            <td><?php echo $val['address'] ?></td>
                                            <td><?php echo $val['city'] ?></td>
                                            <td><?php echo $val['phone'] ?></td>
                                            <td>
                                                <form action="user_update.php" method="post">
                                                   <input type="hidden" name="edit_id" value="<?php echo $val['user_id']; ?>">
                                                   <button type="submit" class="btn btn-success" name="edit_user">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="user_delete.php" method="get">

                                                    <button type="submit" class="btn btn-danger" name="delete_user" value="<?php echo $val['user_id']; ?>" >Delete</button>
                                                </form>

                                            </td>
                                        </tr

                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                    </div>

    </div>

    </div>
</div>
<?php
include "include/footer.php";
include "include/scripts.php";

?>