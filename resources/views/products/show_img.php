<div class="row d-flex justify-content-center ">



    <form>

        <label for="inputState" class="text-dark form-label">Select a product name to view all images</label>
        <select class="form-select w-50" id="images">
            <option value="" selected>Open this select menu</option>
            <?php
              
              foreach ($data->product as $one):
              
              ?>
            <option value="<?= $one->id ?>"><?= $one->product_name ?></option>
            <?php endforeach; ?>
        </select>




    </form>



    <div class="app row justify-content-around ">






    </div>


    <?php if (!empty($_SESSION) && isset($_SESSION['user']['not_find_user']) && !empty($_SESSION['user']['not_find_user'])) : ?>

    <div class="error  ">
        <?= $_SESSION['user']['not_find_user'] ?>
    </div>
    <?php
$_SESSION['user']['not_find_user'] = null;
endif; 
?>

</div>