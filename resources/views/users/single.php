<div id="template" class="row  ">


    <div class="col">
        <div class="mt-5 d-flex flex-row-reverse gap-3">
            <a href="/users/edit?id=<?= $data->user_one->id ?>" class="btn btn-warning">
                Edit <i class="fa-sharp fa-solid fa-user-pen"></i></a>



            <a href="/users" class="btn btn-secondary">Back
                <i class="fa-sharp fa-solid fa-backward"></i>
            </a>
        </div>
        <table class="table table-hover mx-3">
            <thead>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Email</td>
                    <td><?= $data->user_one->email ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?=  $data->user_one->full_name ?></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td><?=  $data->user_one->mobile_number ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?=$data->user_one->address ?></td>
                </tr>
                <tr>
                    <td>Created_at</td>
                    <td><?= $data->user_one->created_at ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <?php
                     if ( $data->user_one->status == 1) : ?>
                    <td> User Activate</td>
                    <?php else : ?>
                    <td> User Not Activate
                        <?php endif;  ?>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
</div>