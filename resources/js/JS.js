
////////////////////close popup no create/////////////////////
$(".ok").click(function () {
    $(".popup-no-create").fadeOut('1000');
});



////////////////////main_categories create/////////////////////
$i = 0;
$("#main_categories").change(function () {
    $i++;



    id = $("#main_categories").children(":selected").attr("value");
    if (id !== undefined) {
        $.ajax({
            type: "POST",
            url: "http://management_system.local/products/get_subcategories",
            data: JSON.stringify({
                main_category_id: id

            }),

            success: function (response) {

                if ($i > 1) {
                    $('#subcategories option:not(:first)').remove();
                }

                response.body.forEach(item => {

                    $('#subcategories').append(`
                <option  value=${item.id} > ${item.name_sub} </option>
                `);
                });


            }

        });
    } else {
        $('#subcategories option:not(:first)').remove();
    }
});


///////////////////////////status//////////////////////////////
const checked = $('.status');

checked.click(function (e) {
    user_id = $(this).val();



    $.ajax({
        type: "post",
        url: "http://management_system.local/users/update/status",
        data: JSON.stringify({
            id: user_id,
        }),

        success: function (response) {
            console.log(response.body[0].status);
            if (response.body[0].status == 1) {
                $(this).removeAttr('checked');
                alert(response.body[0].full_name + " account will be deactivated ")

            } else {

                $(this).add('checked');

            }


        }

    });



});


////////////////////////////////////
$i = 0;
$("#images").change(function () {
    $i++;
    // console.log($i)




    id = $("#images").children(":selected").attr("value");

    if (id !== undefined) {
        $.ajax({
            type: "POST",
            url: "http://management_system.local/products/img",
            data: JSON.stringify({
                id: id

            }),

            success: function (response) {
                img = response.body.product_image;
                const arrayOfObjects = Object.entries(img).map(entry => entry[1]);
                if ($i > 1) {
                    $('.app div').remove();
                }

                arrayOfObjects.forEach(item => {

                    var src = item;

                    var tarr = src.split('/');

                    var file = tarr[tarr.length - 1];
                    var Name = file.split('.')[0];
                    var type = file.split('.')[1];

                    $('.app').append(`
                  
                    <div class="card-wrapper col-3   mb-5 mt-5" id="${item}">
                <div class="card">

                    <div class="card-body">
                    <img src=" http://management_system.local/resources/img/${item} "  class="card-img-top">
                        <div class="card-body">
                            <p class="card-title text-dark">Image name : ${Name} </p>
                            <p class="card-text text-dark">Image type : ${type}</p>
                        
                            <a  class="delete btn btn-danger" data-id="${response.body.id}" id="${item}">
                            Delete</i>
                           </a>
                        </div>
                    </div>
                </div>
                  </div>
                    
                  
                    `);
                    $(`a[id="${item}"] `).click(function () {
                        var value_to_be_deleted = $(this).attr("data-id");
                        var value = $(this).attr("id");

                        $(this).parents('.card-wrapper ').remove();
                        $.ajax({

                            type: "PUT",
                            url: "http://management_system.local/products/update/img",
                            data: JSON.stringify({
                                id_product: value_to_be_deleted,
                                img: value,
                                img_all: img
                            }),

                            success: function (response) {
                                console.log(response);



                            }
                        });
                    });
                });








                if ($i > 1) {
                    $('#subcategories option:not(:first)').remove();
                }



            }

        });
    } else {
        $('#subcategories option:not(:first)').remove();
    }
});

//////////////////////////////////////////////////////////////////////////






$("#search").click(function () {
    id_main_categories = $("#main_categories").children(":selected").attr("value");
    id_subcategories = $("#subcategories").children(":selected").attr("value");


    if (id_main_categories !== undefined) {
        $.ajax({
            type: "post",
            url: "http://management_system.local/products/search",
            data: JSON.stringify({
                main_category_id: id_main_categories,
                id_subcategories: id_subcategories
            }),

            success: function (response) {
                console.log(response);
                $('#table-products tr').remove();
                $id = 0;
                response.body.forEach(item => {

                    $id++;
                    $('#table-products').append(`
                    <tr>

                    <td>${id}</td>
                    <td>${item.product_name}</td>
                    <td>${item.product_price}</td>
                    <td>${item.full_name}</td>
                    <td>${item.name}</td>
                    <td>${item.name_sub}</td>




                    <td>
                        <a href="./product?id=${item.id}">
                            <i class="fa-sharp fa-solid fa-eye text-dark mx-2"></i></a>


                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked>

                        </div>

                    </td>



                </tr>
               
                `);
                });




            }

        });
    }
});
