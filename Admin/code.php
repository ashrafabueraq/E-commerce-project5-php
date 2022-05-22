<?php
session_start();
include_once "include/connect.php";
$state = false;

if (isset($_POST["registeration"])) {
    echo "hello";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if ($password === $cpassword) {
        $query = "INSERT INTO `admin`(`admin_id`, `admin_name`,  `admin_email`, `admin_password`, `admin_date`)
    VALUES (NULL,:username,:email,:password, NOW()) ";

        $statement = $conn->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();

        $state = true;
        if ($state) {
            echo "MATCH";
            $_SESSION['success'] = "Admin Profile has been added";
            header("Location: register.php");

        } else {
            $_SESSION['status'] = "Admin Profile Hasn't Added";
            header("Location: register.php");

        }

    } else {
        $_SESSION['status'] = "PASSWORD and CONFIRM PASSWORD DOES NOT MATCH";
        // header("Location: register.php");

    }

}

//update admin
if (isset($_POST['edit_username'])) {
    $state = false;

    $id = $_GET['id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE `admin` SET
    `admin_name`= :name,
    `admin_email`= :email,
    `admin_password`= :password,
    `admin_date`= NOW()
     WHERE `admin_id` = :id";

    $statement = $conn->prepare($query);
    $statement->bindValue(':name', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $state = true;
    if ($state) {
        echo "MATCH";
        $_SESSION['success'] = "Admin Profile Has Been Modified!";
        header("Location: register.php");

    } else {
        $_SESSION['status'] = "Admin Profile Has Been Modified!";
        header("Location: register.php");

    }

    // header("Location:register.php");

}

// Login code.
if (isset($_POST['login'])) {
    $stat = false;

    $email = $_POST['login_email'];
    $pass = $_POST['login_pass'];

    $query = "SELECT * FROM `admin` WHERE `admin_email` = '$email' AND `admin_password` = '$pass' ";
    $statement = $conn->prepare($query);
    $statement->execute();

    $info = $statement->fetch(PDO::FETCH_ASSOC);
    $stat = true;
    if ($stat) {

        if ($email === $info['admin_email'] && $pass == $info['admin_password']) {
            $_SESSION['username'] = $email;
            header("Location:index.php");
        } else { $_SESSION['status'] = "Email or Password is in valid ";
            header("Location:login.php");
        }

    } else {

    }
}

//category

if (isset($_POST['add_category'])) {
    $state = false;

    $errors = [];
    echo "Hello";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];

        if (empty($cat_name)) {
            $errors[] = 'Product title is required';

        }
        if (empty($cat_desc)) {
            $errors[] = 'Description is required';

        }
        if (!is_dir('images')) {
            mkdir('images');
        }

        if (empty($errors)) {
            $image = $_FILES['image'] ?? null;
            $imagePath = '';
            if ($image) {
                $imagePath = 'images/' . $image['name'];
                // mkdir(dirname($imagePath));
                move_uploaded_file($image['tmp_name'], $imagePath);
            }

            $query = "INSERT INTO `category` (`category_id`, `category_name`, `category_img`, `category_des`)
    VALUES (NULL, :name, :image, :desc)";

            $statment = $conn->prepare($query);
            $statment->bindValue(':name', $cat_name);
            $statment->bindValue(':image', $imagePath);
            $statment->bindValue(':desc', $cat_desc);
            $statment->execute();

            $state = true;
            if ($state) {
                echo "MATCH";
                $_SESSION['success'] = "Category Has Been Modified!";
                header("Location: cat_index.php");

            } else {
                $_SESSION['status'] = "Category Has Been Modified!";
                header("Location: cat_index.php");

            }

        } else {
            $_SESSION['status'] = "PASSWORD and CONFIRM PASSWORD DOES NOT MATCH";
            header("Location: cat_index.php");

        }

    }

}
//************************* delete category**********************
if (isset($_POST['delete_cat'])) {
    $state = false;

    $id = $_POST['id'] ?? null;
    if (!$id) {
        header('Location: cat_index.php');
        exit;
    }

    $statement = $conn->prepare('DELETE FROM `category` WHERE `category`.`category_id` = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("Location:cat_index.php");
}

//**********************edit categories****************************

if (isset($_POST['edit_category'])) {
    $state = false;

    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: cat_index.php');
        exit;
    }

    $query = "SELECT * FROM `category` WHERE category_id = :id";

    $statment = $conn->prepare($query);
    $statment->bindValue(':id', $id);
    $statment->execute();
    $category = $statment->fetch(PDO::FETCH_ASSOC);

    $errors = [];

    $name = $category['category_name'];
// $image = $category['category_img'];
    // $desc=$category['category_des'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];
        $image = $_FILES['image'] ?? null;
        $imagePath = '';
        if (!is_dir('images')) {
            mkdir('images');
        }
        if (empty($cat_name)) {
            $errors[] = 'Product title is required';

        }
        if (empty($cat_desc)) {
            $errors[] = 'Description is required';

        }

        if ($image) {

            if ($category['category_img']) {
                unlink($category['category_img']);

            }
            $imagePath = 'images/' . $image['name'];
            move_uploaded_file($image['tmp_name'], $imagePath);

            if (empty($errors)) {
                $query = "UPDATE `category`
    SET `category_name`=:name,
    `category_img`= :image,
    `category_des`= :desc
    WHERE `category_id` = :id";

                $statment = $conn->prepare($query);
                $statment->bindValue(':name', $cat_name);
                $statment->bindValue(':image', $imagePath);
                $statment->bindValue(':desc', $cat_desc);
                $statment->bindValue(':id', $id);
                $statment->execute();

                $state = true;
                if ($state) {
                    echo "MATCH";
                    $_SESSION['success'] = "Category Has Been Modified!";
                    header("Location: cat_index.php");

                } else {
                    $_SESSION['status'] = "Category Hasn't Been Modified!";
                    header("Location: cat_index.php");

                }

            } else {
                $_SESSION['status'] = "PASSWORD and CONFIRM PASSWORD DOES NOT MATCH";
                header("Location: cat_index.php");

            }
// echo "helllo";

        }

    }

}
//***********************edit subcategory*************************** */
if (isset($_POST['edit_subcategory'])) {
$state = false;

    $id = $_GET['id'] ?? null;

    if (!$id) {
        header('Location: subcat_index.php');
        exit;
    }

    $query = "SELECT * FROM `subcategory` WHERE subcategory_id = :id";

    $statment = $conn->prepare($query);
    $statment->bindValue(':id', $id);
    $statment->execute();
    $subcategory = $statment->fetch(PDO::FETCH_ASSOC);

    $errors = [];

    $subcategory_name = $_POST['subcategory_name'];
    $subcategory_des = $_POST['subcategory_des'];
    $category_id = $_POST['categoryid'];

    $image = $_FILES['image'] ?? null;
    $imagePath = '';
    if (!is_dir('images')) {
        mkdir('images');
    }
    if (empty($subcategory_name)) {
        $errors[] = 'Product title is required';

    }
    if (empty($subcategory_des)) {
        $errors[] = 'Description is required';

    }
    if ($category_id == 'no') {
        $errors[] = 'category is required';

    }

    if ($image) {

        $imagePath = 'images/' . $image['name'];
        move_uploaded_file($image['tmp_name'], $imagePath);

        if (empty($errors)) {

            $query = "UPDATE `subcategory`
                SET `subcategory_name`=:name,
                `subcategory_img`= :image,
                `subcategory_des`= :desc,
                `category_id` = :category
                WHERE `subcategory_id` = :id";

            $statment = $conn->prepare($query);
            $statment->bindValue(':name', $subcategory_name);
            $statment->bindValue(':image', $imagePath);
            $statment->bindValue(':desc', $subcategory_des);
            $statment->bindValue(':category', $category_id);
            $statment->bindValue(':id', $id);
            $statment->execute();

            $state = true;
            if ($state) {
                echo "MATCH";
                $_SESSION['success'] = "Subcategory Has Been Modified!";
                header('Location: subcat_index.php');

            } else {
                $_SESSION['status'] = "Subcategory Hasn't Been Modified!";
                header('Location: subcat_index.php');

            }

        } else {
            $_SESSION['status'] = "PASSWORD and CONFIRM PASSWORD DOES NOT MATCH";
            header('Location: subcat_index.php');

        }
    }

}

//**************************************create subcategory********************/

if (isset($_POST['add_subcategory'])) {
    $state = false;

    $subcategory_name = $_POST['subcategory_name'];
    $subcategory_des = $_POST['subcategory_des'];
    $category_id = $_POST['categoryid'];
    if (empty($subcategory_name)) {
        $errors[] = 'Product title is required';

    }
    if (empty($subcategory_des)) {
        $errors[] = 'Description is required';

    }
    if ($category_id == "no") {
        $errors[] = 'Category is required';

    }
    if (!is_dir('images')) {
        mkdir('images');
    }
    if (empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $imagePath = '';
        if ($image) {
            $imagePath = 'images/' . $image['name'];
            // mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $query = "INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `subcategory_img`, `subcategory_des`, `category_id`)
        VALUES (NULL, :name, :image, :des,:cat_id)";

        $statment = $conn->prepare($query);
        $statment->bindValue(':name', $subcategory_name);
        $statment->bindValue(':image', $imagePath);
        $statment->bindValue(':des', $subcategory_des);
        $statment->bindValue(':cat_id', $category_id);
        $statment->execute();

        $state = true;
        if ($state) {
            echo "MATCH";
            $_SESSION['success'] = "Subcategory Has Been Added!";
            header('Location: subcat_index.php');

        } else {
            $_SESSION['status'] = "Subcategory Has NOT Been Added";
            header('Location: subcat_index.php');

        }

    } else {
        $_SESSION['status'] = "PASSWORD and CONFIRM PASSWORD DOES NOT MATCH";
        header('Location: subcat_index.php');

    }}

//***************************ADD Product************************************* */

if (isset($_POST['add_product'])) {
    $state = false;

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_des = $_POST['product_des'];
    $subcategory_id = $_POST['subcategoryid'];
    if (empty($product_name)) {
        $errors[] = 'Product title is required';

    }
    if (empty($product_des)) {
        $errors[] = 'Description is required';

    }
    if ($subcategory_id == "no") {
        $errors[] = 'Category is required';

    }
    if (!is_dir('images')) {
        mkdir('images');
    }
    if (empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $imagePath = '';
        if ($image) {
            $imagePath = 'images/' . $image['name'];
            // mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $query = "INSERT INTO `product` (`product_id`, `product_name`,`product_price` ,`product_img`, `product_des`, `sub_category_id`)
        VALUES (NULL, :name,:price ,:image, :des,:sub_id)";

        $statment = $conn->prepare($query);
        $statment->bindValue(':name', $product_name);
        $statment->bindValue(':price', $product_price);
        $statment->bindValue(':image', $imagePath);
        $statment->bindValue(':des', $product_des);
        $statment->bindValue(':sub_id', $subcategory_id);
        $statment->execute();

        $state = true;
        if ($state) {
            echo "MATCH";
            $_SESSION['success'] = "Product Has Beenadded";
            header('Location: product_index.php');

        } else {
            $_SESSION['status'] = "Product Has NOT Been Added";
            header('Location: product_index.php');

        }

    } else {
        $_SESSION['status'] = "PASSWORD and CONFIRM PASSWORD DOES NOT MATCH";
        header('Location: product_index.php');

    }

}
/**********************Edit Product******************** */

if (isset($_POST['edit_product'])) {
$state = false;

    $id = $_GET['id'] ?? null;

    if (!$id) {
        header('Location: product_index.php');
        exit;
    }

    $query = "SELECT * FROM `product` WHERE product_id = :id";

    $statment = $conn->prepare($query);
    $statment->bindValue(':id', $id);
    $statment->execute();
    $subcategory = $statment->fetch(PDO::FETCH_ASSOC);

    $errors = [];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_des = $_POST['product_des'];
    $subcategory_id = $_POST['subcategoryid'];

    $image = $_FILES['image'] ?? null;
    $imagePath = '';
    if (!is_dir('images')) {
        mkdir('images');
    }
    if (empty($product_name)) {
        $errors[] = 'Product title is required';

    }
    if (empty($product_price)) {
        $errors[] = 'Product price is required';

    }
    if (empty($product_des)) {
        $errors[] = 'Description is required';

    }
    if ($subcategory_id == 'no') {
        $errors[] = 'category is required';

    }

    if ($image) {

        $imagePath = 'images/' . $image['name'];
        move_uploaded_file($image['tmp_name'], $imagePath);

        if (empty($errors)) {
            $query = "UPDATE `product`
            SET
            `product_name`=:name,
            `product_price`=:price,
            `product_img`=:image,
            `product_des`=:desc,
            `sub_category_id`=:sub_id
            WHERE `product_id` = :id ";

            $statment = $conn->prepare($query);
            $statment->bindValue(':name', $product_name);
            $statment->bindValue(':price', $product_price);
            $statment->bindValue(':image', $imagePath);
            $statment->bindValue(':desc', $product_desc);
            $statment->bindValue(':sub_id', $subcategory_id);
            $statment->bindValue(':id', $id);
            $statment->execute();
            $state = true;
            if ($state) {
                echo "MATCH";
                $_SESSION['success'] = "Product Has Been Modified!!";
                header('Location: product_index.php');

            } else {
                $_SESSION['status'] = "Product Has Been Modified!!";
                header('Location: product_index.php');

            }

        } else {
            $_SESSION['status'] = "PASSWORD and CONFIRM PASSWORD DOES NOT MATCH";
            header('Location: product_index.php');

        }
    }

}

//*******************user creation **************************/



if (isset($_POST["user_reg"])) {
    $state = false;

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    if (empty($password)) {
        $errors[] = 'password title is required';

    }
    if (empty($email)) {
        $errors[] = 'email is required';

    }
    if (empty($username)) {
        $errors[] = 'username is required';

    }
    if (empty($phone)) {
        $errors[] = 'phone is required';

    }
    if (empty($address)) {
        $errors[] = 'address is required';

    }
    if (empty($city)) {
        $errors[] = 'city is required';

    }

    if (empty($errors)) {

        $query = "INSERT INTO `user`(`user_id`, `password`, `email`, `address`, `city`, `phone`, `username`)
        VALUES (NULL,:password,:email,:address,:city,:phone,:username)";

        $statment = $conn->prepare($query);
        $statment->bindValue(':password', $password);
        $statment->bindValue(':email', $email);
        $statment->bindValue(':address', $address);
        $statment->bindValue(':city', $city);
        $statment->bindValue(':phone', $phone);
        $statment->bindValue(':username', $username);
        $statment->execute();
        $flag = true;

        if ($flag) {?>
        <div class="alert alert-success" role="alert">
      <?php
echo "YOU HAVE REGISTERED SUCCESSFULLY!" ?>
        </div>
        <?php
header("Location: user_index.php");
        }
    }

    $state = true;
    if ($state) {
        $_SESSION['success'] = "User Profile Has Been Added";
        header("Location: user_index.php");

    } else {
        $_SESSION['status'] = "User Profile Has NOT Been  Added";
        header("Location: user_index.php");

    }

}
//*******************user update **************************/
if (isset($_POST['user_update'])) {
    
    $state = false;
    $id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    if (empty($password)) {
        $errors[] = 'password title is required';

    }
    if (empty($email)) {
        $errors[] = 'email is required';

    }
    if (empty($username)) {
        $errors[] = 'username is required';

    }
    if (empty($phone)) {
        $errors[] = 'phone is required';

    }
    if (empty($address)) {
        $errors[] = 'address is required';

    }
    if (empty($city)) {
        $errors[] = 'city is required';

    }

    $query = "UPDATE `user`
        SET
        `password`=:password,
        `email`=:email,
        `address`=:address,
        `city`=:city,
        `phone`=:phone,
        `username`= :username
         WHERE `user_id` = :id";

    $statment = $conn->prepare($query);
    $statment->bindValue(':password', $password);
    $statment->bindValue(':email', $email);
    $statment->bindValue(':address', $address);
    $statment->bindValue(':city', $city);
    $statment->bindValue(':phone', $phone);
    $statment->bindValue(':username', $username);
    $statment->bindValue(':id', $id);
    $statment->execute();

    $state = true;
    if ($state) {
        $_SESSION['success'] = "User Profile Has Been Modified!";
        header("Location: user_index.php");

    } else {
        $_SESSION['status'] = "User Profile Has NOT Been Modified!";
        header("Location: user_index.php");

    }

    header("Location: user_index.php");

}
