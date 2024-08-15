<?php
$page_title = "create user";
include('./common/header.php');

//must include parent class when we include child class 
include('./interfaces/CrudInterface.php');
include('./classes/DbConfig.php');
include('./classes/Crud.php');
include('./interfaces/ValidationInterface.php');
include('./classes/Validation.php');


$crud = new Crud();
$validation = new Validation();
$error = null;
$errName = null;
$errEmail = null;
$errAge = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {

    $error = $validation->checkEmptyField($_POST, ['name', 'age', 'email']);

    $crud->name = $_POST['name'];
    $crud->age = $_POST['age'];
    $crud->email = $_POST['email'];




    $check_name = $validation->isValidData($crud->name);
    $check_email = $validation->isValidEmail($crud->email);
    $check_age = $validation->isValidAge($crud->age);

    if ($check_name == false) {
        $errName = "Please provide name in letters not start with number";
    }
    if ($check_email == false) {
        $errEmail = "Please enter a valid email";
    }
    if ($check_age == false) {
        $errAge = "Please enter a numeric value for age";
    }

    if ($check_name == true && $check_email == true && $check_age == true) {
        $done = $crud->create();
        if ($done) {
            header("location:index.php");
        } else {
            echo "something went wrong";
        }
    }
}



?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto mt-3">
            <div class="text-center">
                <h2>Add Users</h2>
            </div>
            <div>
                <a href="index.php" class="btn btn-info text-white">back</a>
            </div>
            <div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                    <div class="form-group my-2">
                        <input type="text" name="name" id="name" class="form-control" placeholder="enter name">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="email" id="email" class="form-control" placeholder="enter email">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="age" id="age" class="form-control" placeholder="enter age">
                    </div>
                    <!-- <div class="form-group my-2">
                        <input type="date" name="add_date" id="add_date" class="form-control" placeholder="enter date">
                    </div> -->
                    <div class="form-group my-2">
                        <button type="submit" name="create" class="btn btn-success w-100">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
            <div>

                <?php
                if ($error != null):
                    echo $error;
                ?>
                <?php endif; ?>
            </div>

            <div>

                <?php
                if ($errName != null):
                    echo $errName;
                ?>
                <?php endif; ?>
            </div>
            <div>

                <?php
                if ($errEmail != null):
                    echo $errEmail;
                ?>
                <?php endif; ?>
            </div>
            <div>

                <?php
                if ($errAge != null):
                    echo $errAge;
                ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<?php
include('./common/footer.php');
?>