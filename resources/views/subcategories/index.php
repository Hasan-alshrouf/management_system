<div class="row d-flex justify-content-center ">

    <form method="GIT" action="./subcategory/find">


        <div class="search_user input-group  w-50  m-sm-auto ">
            <input type="text" class="form-control" placeholder="Search for a Subcategory by name"
                aria-label="Recipient's username" aria-describedby="button-addon2" name="name">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2 ">Sehrch</button>
        </div>


        <?php if (!empty($_SESSION) && isset($_SESSION['categorie']['not_find_categorie']) && !empty($_SESSION['categorie']['not_find_categorie'])) : ?>

        <div class="error  ">
            <?= $_SESSION['categorie']['not_find_categorie'] ?>
        </div>
        <?php
$_SESSION['categorie']['not_find_categorie'] = null;
endif; 
?>
    </form>
</div>



<div class="col-lg-11 col-md-11   mx-2">
    <div class="d-flex justify-content-between align-items-end mb-3 ">
        <caption>List Of ALL Subcategories </caption>

    </div>
    <div style="overflow-x:auto;">
        <table class="table  table-hover">
            <thead class="table-dark fs-5">
                <tr>
                    <th scope="col">Num</th>

                    <th scope="col">Subcategory Name</th>

                    <th scope="col">The Name Of The Main Category</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $id = 0;
                foreach ($data->all_subcategories as $categorie):
                    $id++;
                ?>
                <tr>

                    <td><?= $id ?></td>
                    <td><?= $categorie->name_sub ?></td>
                    <td><?= $categorie->name ?></td>


                    <td>
                        <a href="./subcategory?id=<?= $categorie->id ?>">
                            <i class="fa-sharp fa-solid fa-eye text-dark mx-2"></i></a>

                        <a href="/subcategories/edit?id=<?= $categorie->id ?>">
                            <i class="fa-solid fa-file-pen text-info mx-2"></i></a>

                    </td>


                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>