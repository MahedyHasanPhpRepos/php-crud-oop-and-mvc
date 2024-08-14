
<?php
    include('./common/header.php') ; 
?>


<?php
    include_once('./CrudAction.php');

    $ca = new CrudAction(new DbConfig()) ; 
    $users = $ca->getUsers() ; 

    echo $users ; 
    
?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto mt-3">
            <div class="text-center">
                <h2> All Users</h2>
            </div>
            <div class="text-end my-2">
                <button class="btn btn-success text-capitalize">
                    add user
                </button>
            </div>
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
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td class="text-center"><a href="#">edit</a> | <a href="#">delete</a></td>
                        </tr>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td class="text-center"><a href="#">edit</a> | <a href="#">delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php
    include('./common/footer.php') ;
?>



