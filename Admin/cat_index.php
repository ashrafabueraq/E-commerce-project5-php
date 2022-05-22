
<?php
include "security.php";

include "include/connect.php";
include "include/navbar.php";

$satement = $conn->prepare('SELECT * FROM `category` ORDER BY category_id DESC');
$satement->execute();
$categories = $satement->fetchAll(PDO::FETCH_ASSOC);

?>


<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add category Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">

          <div class="form-group">
              <label for="category_name" >
                  Category Name
                  <input type="text" name="cat_name" class="form-control" placeholder = "Category name">
              </label>
          </div>
          <div class="form-group">

                  <input type="file" class="form-control-file" id="customFile" name="image">

          </div>
          <div class="form-group">
              <label for="Discription">
                 Discription
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="cat_desc" ></textarea>
              </label>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_category">add</button>
      </div>
    </form>
   </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-9">
                        <div class="card-header py-3">
                            <h5 class="mg-0 font-weight-bold text-primary">Category profile</h5>
                            <button type ="button" class="btn btn-primary"  data-toggle="modal" data-target="#addadminprofile">
                                   Add Category
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
                                $statement = $conn->prepare($query);
                                $statement->execute();
                                $info = $statement->fetchALL(PDO::FETCH_ASSOC);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>name</th>
                                            <th>image</th>
                                            <th>Discription</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $i => $category): ?>
                                                    <tr>
                                                        <th ><?php echo $i + 1; ?></th>
                                                        <td><?php echo "<img src=" . $category["category_img"] . " width=100px height=100px>" ?></td>
                                                        <td><?php echo $category["category_name"] ?></td>
                                                        <td><?php echo $category["category_des"] ?></td>
                                                        <td>

                                                        <form action="cat_update.php" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="edit_id" value="<?php echo $category['category_id']; ?>">
                                                            <button type="submit" class="btn btn-success" name="edit_cat">Edit</button>
                                                        </form>



                                                        </td>
                                                        <td>

                                                        <form action="code.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $category['category_id'] ?>">
                                                            <button type="submit" name="delete_cat" class="btn btn-danger" href="delete?=<?php echo $category['category_id'] ?>" >Delete</button>
                                                        </td>
                                                        </form>


                                                    </tr>
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