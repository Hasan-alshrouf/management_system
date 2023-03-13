<a href="/users" class="btn btn-secondary mx-4 mt-3">Back
    <i class="fa-sharp fa-solid fa-backward"></i>
</a>
<div class="main-block mb-5">


    <h1 class=" mt-4 opacity-75">Update User Informations</h1>


    <form action="/users/update " method="POST">
        <input type="hidden" name="id" value="<?= $data->user_one->id ?>">
        <div class="">

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email"
                    value="<?= $data->user_one->email ?>" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Full Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="full_name"
                    value="<?= $data->user_one->full_name ?>" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Phone</label>
                <input type="tel" class="form-control" id="exampleInputPassword1" name="mobile_number"
                    value="<?= $data->user_one->mobile_number ?>" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address"
                    value="<?= $data->user_one->address ?>" required>
            </div>




            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>

</div>