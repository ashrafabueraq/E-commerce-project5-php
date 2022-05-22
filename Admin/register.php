
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
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
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
              <label for="Confirm Password">
                  Confirm Password
                  <input type="password" name="confirmpassword" class="form-control" placeholder = "Confirm Password">
              </label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="registeration">Save</button>
      </div>
    </form>
   </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-9">
                        <div class="card-header py-3">
                            <h5 class="mg-0 font-weight-bold text-primary">Admin profile</h5>
                            <button type ="button" class="btn btn-primary"  data-toggle="modal" data-target="#addadminprofile">
                                   Add Admin Profile
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
                                $query = "SELECT * FROM admin";
                                $statement =$conn->prepare($query);
                                $statement->execute();
                                $info = $statement->fetchALL(PDO::FETCH_ASSOC);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>password</th>
                                            <th>date</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($info as $key=>$val):?>
                                             <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $val['admin_name'] ?></td>
                                            <td><?php echo $val['admin_email'] ?></td>
                                            <td><?php echo $val['admin_password'] ?></td>
                                            <td><?php echo $val['admin_date'] ?></td>
                                            <td> 
                                                <form action="regupdate.php" method="post">
                                                   <input type="hidden" name="edit_id" value="<?php echo $val['admin_id'];?>">
                                                   <button type="submit" class="btn btn-success" name="edit_btn">Edit</button>
                                                </form>
                                            </td>
                                            <td> 
                                                <form action="regdelete.php" method="get">
                                                    
                                                    <button type="submit" class="btn btn-danger" name="delete_btn" value="<?php echo $val['admin_id'];?>" >Delete</button>
                                                </form>

                                            </td>
                                        </tr
                                        
                                        <?php endforeach; ?>
                                       
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