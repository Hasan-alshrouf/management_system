<div class="col-lg-11 col-md-11   mx-2 ">
    <div class="main-block mb-5 row align-items-end">
        <div class="col-md-4">
            <label for="floatingSelectGrid" class="form-label  text-light">Choose from the main categories</label>
            <div class="form-floating">
                <select class="form-select" id="main_categories" name="idm">
                    <option value="" selected>Open this select menu</option>

                    <?php
              
                foreach ($data->all_main_categories as $categorie):
                
                ?>
                    <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
        </div>
        <div class="col-md-4">
            <label for="floatingSelectGrid" class="form-label  text-light">Choose from the subcategories</label>
            <div class="form-floating">
                <select class="form-select" id="subcategories" name="ids">
                    <option value="" selected>Open this select menu</option>

                </select>

            </div>
        </div>


        <div class="col-2 ">
            <button type="submit" class="btn btn-primary" id="search">Search</button>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-end mb-3 ">
        <caption>List Of ALL Products </caption>

    </div>
    <div style="overflow-x:auto;">
        <table class="table  table-hover">
            <thead class="table-dark fs-5">
                <tr>
                    <th scope="col">Num</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Main Categorie</th>
                    <th scope="col">Subcategory</th>




                    <th scope="col">Action</th>
                    <th scope="col">Activate </th>
                </tr>
            </thead>
            <tbody id="table-products">
                <?php
                 $id = 0;
                foreach ($data->products as $product):
                    $id++;
                ?>
                <tr>

                    <td><?= $id ?></td>
                    <td><?= $product->product_name ?></td>
                    <td><?= $product->product_price ?></td>
                    <td><?= $product->full_name ?></td>
                    <td><?= $product->name ?></td>
                    <td><?= $product->name_sub ?></td>




                    <td>
                        <a href="./product?id=<?= $product->id ?>">
                            <i class="fa-sharp fa-solid fa-eye text-dark mx-2"></i></a>


                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked>

                        </div>

                    </td>



                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>