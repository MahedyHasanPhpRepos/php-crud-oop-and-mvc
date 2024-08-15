<?php
$page_title = 'index';
include('./common/header.php');
include('./interfaces/CrudInterface.php');
include('./classes/DbConfig.php');
include('./classes/Crud.php');

$crud = new Crud();
$users = $crud->read();


?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto mt-3">
            <div class="text-center">
                <h2> All Users</h2>
            </div>
            <div class="text-end my-2">
                <a href="add.php" class="btn btn-success text-capitalize">
                    add user
                </a>
            </div>
            <?php if (!empty($users)) : ?>
                <div class="table-responsive">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>Name </th>
                                <th>Age </th>
                                <th>Email </th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>
                                        <?php echo ucwords($user['name']); ?>
                                    </td>
                                    <td><?php echo $user['age'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td class="text-center"><a href="update.php?id=<?php echo $user['id']; ?>">edit</a> | <a href="#">delete</a></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            <?php else : ?>
                <h3>No Users</h3>
            <?php endif ?>



        </div>
    </div>
</div>



<?php
include('./common/footer.php');
?>