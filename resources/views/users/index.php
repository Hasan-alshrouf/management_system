<div class="row d-flex justify-content-center ">

    <form method="GIT" action="./user/find">

        <div class="search_user input-group  w-50  m-sm-auto ">
            <input type="text" class="form-control" placeholder="Search for a user by email"
                aria-label="Recipient's username" aria-describedby="button-addon2" name="email">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2 ">Sehrch</button>
        </div>


        <?php if (!empty($_SESSION) && isset($_SESSION['user']['not_find_user']) && !empty($_SESSION['user']['not_find_user'])) : ?>

        <div class="error  ">
            <?= $_SESSION['user']['not_find_user'] ?>
        </div>
        <?php
$_SESSION['user']['not_find_user'] = null;
endif; 
?>
    </form>
</div>



<div class="col-lg-11 col-md-11   mx-2">
    <div class="d-flex justify-content-between align-items-end mb-3 ">
        <caption>List Of ALL Users </caption>

    </div>
    <div style="overflow-x:auto;">
        <table class="table  table-hover">
            <thead class="table-dark fs-5">
                <tr>
                    <th scope="col">Num</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>


                    <th scope="col">Action</th>
                    <th scope="col">Activate </th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $id = 0;
                foreach ($data->users as $user):
                    $id++;
                ?>

                <tr>

                    <td><?= $id ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->full_name ?></td>
                    <td><?= $user->mobile_number ?></td>

                    <td>
                        <a href="./user?id=<?= $user->id ?>">
                            <i class="fa-sharp fa-solid fa-eye text-dark mx-2"></i></a>

                        <a href="/users/edit?id=<?= $user->id ?>">
                            <i class="fa-sharp fa-solid fa-user-pen text-info mx-2"></i></a>

                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="status  form-check-input" type="checkbox" role="switch" name="status"
                                value="<?= $user->id ?>" <?php if ( $user->status == 1) : ?> checked class="bg-danger"
                                <?php endif;  ?>>

                        </div>

                    </td>



                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>