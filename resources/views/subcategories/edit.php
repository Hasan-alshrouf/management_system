<a href="/subcategories" class="btn btn-secondary mx-4 mt-4">Back
    <i class="fa-sharp fa-solid fa-backward"></i>
</a>
<div class="main-block mb-5 ">


    <h1 class="mt-4  opacity-75">Edit Subcategory</h1>


    <form action="/subcategories/update " method="POST">
        <div class="info">

            <div class="col-12">
                <input type="hidden" name="id" value="<?= $data->subcategory_one->id ?>">
                <label for="inputAddress" class=" text-light form-label">Subcategory Name :</label>
                <input type="text" class="form-control" id="inputAddress" name="name"
                    value="<?= $data->subcategory_one->name_sub ?>" required>
            </div>


            <div class="col-12 mt-3">
                <label for="inputState" class="text-light form-label">Main Category Name</label>
                <select id="inputState" class="form-select w-50" required name="idm">
                    <option value="<?= $data->subcategory_one->main_categorie_id ?>"><?= $data->subcategory_one->name ?>
                    </option>
                    <?php
                    foreach ($data->all_main_categories as $categorie):

                    ?>
                    <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>



            <button type="submit" class="button">Edit</button>
        </div>
    </form>

</div>


<?php if (!empty($_SESSION) && isset($_SESSION['subcategories']['create_subcategories']) && !empty($_SESSION['subcategories']['create_subcategories'])) : ?>


<div class="popup-no-create">
    <h2 class="done">Not Done!</h2>
    <div class="popup-desian">
        <p> <?= $_SESSION['subcategories']['create_subcategories'] ?></p>
        <i class="i-no fa-sharp fa-solid fa-xmark btn-danger"></i>
        <button class="ok">OK!</button>
    </div>
</div>
<?php
$_SESSION['subcategories']['create_subcategories'] = null;
endif; 
?>