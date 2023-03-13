<a href="/users" class="btn btn-secondary mx-4 mt-4">Back
    <i class="fa-sharp fa-solid fa-backward"></i>
</a>
<div class="main-block mb-5 ">


    <h1 class="mt-4  opacity-75">Create New Product</h1>


    <form action="/products/store" method="POST" enctype="multipart/form-data" class="row">


        <div class="col-md-6">
            <label for="inputEmail4" class="form-label text-light">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label  text-light">Product Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" required>
        </div>
        <div class="col-md-6 mt-3">
            <label for="floatingSelectGrid" class="form-label  text-light">Choose from the main categories</label>
            <div class="form-floating">
                <select class="form-select" id="main_categories" required name="idm">
                    <option value="" selected>Open this select menu</option>

                    <?php
              
                foreach ($data->all_main_categories as $categorie):
                
                ?>
                    <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
        </div>
        <div class="col-md-6 mt-3">
            <label for="floatingSelectGrid" class="form-label  text-light">Choose from the subcategories</label>
            <div class="form-floating">
                <select class="form-select" id="subcategories" required name="ids">
                    <option value="" selected>Open this select menu</option>

                </select>

            </div>
        </div>

        <div class="mb-3  mt-3 ">
            <label for="exampleFormControlTextarea1" class="form-label text-light">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFileMultiple" class="form-label text-light">Choose the product image
            </label>

            <input type="file" class="form-control" id="formFileMultiple" accept=".png, .jpg, .jpeg" name="picture[]"
                multiple>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary" id="Create">Create</button>
        </div>
    </form>


</div>

<?php if (!empty($_SESSION) && isset($_SESSION['product']['create_Products']) && !empty($_SESSION['product']['create_Products'])) : ?>


<div class="popup-no-create">
    <h2 class="done">Not Done!</h2>
    <div class="popup-desian">
        <p> <?= $_SESSION['product']['create_Products'] ?></p>
        <i class="i-no fa-sharp fa-solid fa-xmark btn-danger"></i>
        <button class="ok">OK!</button>
    </div>
</div>
<?php
$_SESSION['product']['create_Products'] = null;
endif; 
?>