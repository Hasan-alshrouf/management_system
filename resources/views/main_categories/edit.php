<a href="/main_categories" class="btn btn-secondary mx-4 mt-4">Back
    <i class="fa-sharp fa-solid fa-backward"></i>
</a>
<div class="main-block mb-5 ">


    <h1 class="mt-4  opacity-75">Edit Main Categorie</h1>


    <form action="/main_categories/update " method="POST">
        <input type="hidden" name="id" value="<?= $data->categorie_one->id ?>">
        <div class="info">
            <input type="text" name="name" value="<?= $data->categorie_one->name ?>" required>




            <button type="submit" class="button">Edit</button>
    </form>
</div>


<?php if (!empty($_SESSION) && isset($_SESSION['main_categories']['create_main_categories']) && !empty($_SESSION['main_categories']['create_main_categories'])) : ?>


<div class="popup-no-create">
    <h2 class="done">Not Done!</h2>
    <div class="popup-desian">
        <p> <?= $_SESSION['main_categories']['create_main_categories'] ?></p>
        <i class="i-no fa-sharp fa-solid fa-xmark btn-danger"></i>
        <button class="ok">OK!</button>
    </div>
</div>
<?php
$_SESSION['main_categories']['create_main_categories'] = null;
endif; 
?>