<div id="template" class="row  ">


    <div class="col">
        <div class="mt-5 d-flex flex-row-reverse gap-3">




            <a href="/products" class="btn btn-secondary">Back
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
                    <td>Product Name</td>
                    <td><?= $data->product_one->product_name ?></td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td><?=  $data->product_one->product_price ?></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><?=  $data->product_one->full_name ?></td>
                </tr>
                <tr>
                    <td>Main Categorie</td>
                    <td><?=$data->product_one->name ?></td>
                </tr>
                <tr>
                    <td>Subcategory</td>
                    <td><?= $data->product_one->name_sub ?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?= $data->product_one->description ?></td>
                </tr>
                <tr>
                    <td>created at</td>
                    <td><?= $data->product_one->created_at ?></td>
                </tr>



            </tbody>
        </table>
        <form action="/products/add/img" method="POST" enctype="multipart/form-data" class="row">
            <input type="hidden" name="id" value="<?= $data->product_one->id ?>">
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label text-dark">Choose the product image
                </label>

                <input type="file" class="form-control w-50" id="formFileMultiple" accept=".png, .jpg, .jpeg"
                    name="picture[]" multiple>

                <div class="col-12 mt-3 mb-3">
                    <button type="submit" class="btn btn-primary" id="Create">Add Moer image</button>
                </div>
        </form>
        <div class="row">

            <?php 
                 $id = 0;
                foreach ($data->product_one->product_image as $key => $value) :
                    
                    $id++;
                ?>
            <div class="card-wrapper col-4 mb-5">
                <img src="<?= $_SERVER['REQUEST_SCHEME'] . "://" .$_SERVER['HTTP_HOST'] ?>/resources/img/<?= $value?>"
                    alt="">
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>