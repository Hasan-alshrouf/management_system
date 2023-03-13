<div class="row  ">



    <p class="text-dark ">Welcome To Management System
    </p>


</div>

<div class="row  ms-md-5 m-lg-auto  d-flex justify-content-center  mx-3 ">
    <div class="col-lg-3 col-md-6 col-sm-12 col-10   ">
        <div class="card l-bg-green-dark">
            <div class="card-statistic-3 p-4">
                <a href="/main_categories" class="ece text-decoration-none text-light   ">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4 text-center">
                        <h5 class="card-title mb-0">Total Main categorie </h5>
                    </div>
                    <div class="card-count-number">

                        <h2 class=" text-center fs-1">
                            <?= $data->Main_categorie ?>
                        </h2>


                    </div>
                </a>
            </div>
        </div>
    </div>





    <div class="col-lg-3 col-md-6 col-sm-12  col-10 ">
        <div class="card l-bg-orange-dark">
            <div class="card-statistic-3 p-4">
                <a href="/subcategories" class="ece text-decoration-none text-light   ">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4 text-center">
                        <h5 class="card-title mb-0">Total Subcategorie </h5>
                    </div>
                    <div class="card-count-number">

                        <h2 class="text-center fs-1">

                            <?= $data->Subcategorie ?>

                        </h2>


                    </div>
                </a>
            </div>
        </div>
    </div>


    <div class="col-lg-3  col-md-6 col-sm-12 col-10 ">

        <div class="card l-bg-cherry">

            <div class="card-statistic-3 p-4 ">
                <a href="/products" class="ece text-decoration-none text-light   ">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart "></i></div>
                    <div class="mb-4 text-center">
                        <h5 class="card-title mb-0">Total Product</h5>
                    </div>
                    <div class="card-count-number">
                        <h2 class=" text-center fs-1">
                            <?= $data->Product ?>

                        </h2>
                    </div>

                </a>
            </div>

        </div>
    </div>



    <div class="col-lg-3 col-md-6  col-sm-12 col-10   mb-2 ">

        <div class="card l-bg-blue-dark">

            <div class="card-statistic-3 p-4">
                <a href="/users" class="ece text-decoration-none text-light   ">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4 text-center">
                        <h5 class="card-title mb-0">All Users</h5>
                    </div>
                    <div class="card-count-number">
                        <h2 class=" text-center fs-1">
                            <?= $data->count_user ?>
                        </h2>
                    </div>

                </a>
            </div>
        </div>

    </div>


</div>