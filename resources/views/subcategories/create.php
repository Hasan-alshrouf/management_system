<a href="/subcategories" class="btn btn-secondary mx-4 mt-4">Back
    <i class="fa-sharp fa-solid fa-backward"></i>
</a>
<div class="main-block mb-5 ">


    <h1 class="mt-4  opacity-75">Create New Subcategory</h1>


    <form action="/subcategories/store " method="POST">
        <div class="info">
            <input type="text" name="name" placeholder="Subcategory Name" required>


            <select class="form-select w-50" name="id" required>
                <option value="">Please choose a Main Category</option>
                <?php
              
                foreach ($data->all_main_categories as $categorie):
                
                ?>
                <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                <?php endforeach; ?>

            </select>


            <button type="submit" class="button">Create</button>
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