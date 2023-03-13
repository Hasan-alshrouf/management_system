<div id="template" class="row  ">


    <div class="col">
        <div class="mt-5 d-flex flex-row-reverse gap-3">
            <a href="/subcategories/edit?id=<?= $data->subcategory_one->id ?>" class="btn btn-warning">
                Edit</a>



            <a href="/subcategories" class="btn btn-secondary">Back
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
                    <td>Subcategory Name</td>
                    <td><?= $data->subcategory_one->name_sub ?></td>
                </tr>

                <tr>
                    <td>Main Category Name</td>
                    <td><?= $data->subcategory_one->name?></td>
                </tr>

                <tr>
                    <td>Created At</td>
                    <td><?= $data->subcategory_one->created_at?></td>
                </tr>







            </tbody>
        </table>
    </div>
</div>