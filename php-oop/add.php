<?php
include('./common/header.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto mt-3">
            <div class="text-center">
                <h2>Add Users</h2>
            </div>
            <div>
                <form action="actions/addUser.php" method="post">
                    <div class="form-group my-2">
                        <input type="text" name="name" id="name" class="form-control" placeholder="enter name">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="email" id="email" class="form-control" placeholder="enter email">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="age" id="age" class="form-control" placeholder="enter age">
                    </div>
                    <div class="form-group my-2">
                        <input type="date" name="add_date" id="add_date" class="form-control" placeholder="enter date">
                    </div>
                    <div class="form-group my-2">
                        <button type="submit" name="submit" class="btn btn-success w-100">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include('./common/footer.php');
?>