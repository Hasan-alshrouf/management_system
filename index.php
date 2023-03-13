<?php
session_start();


use Core\Router;






spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
        
      
    $class_name = str_replace("\\", '/', $class_name); 

    $file_path = __DIR__ . "/" . $class_name . ".php";
   
   
    require_once $file_path;
   
});




// For web administrators
Router::get('/', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // validate the login form






// athenticated
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard


//users
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single user (HTML)
Router::get('/user/find', "users.find_user"); //find the users by username (PHP)
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the user (PHP)
Router::post('/users/update/status', "users.status"); // Updates the user (PHP)




// main_categories
Router::get('/main_categories', "main_categories.index"); // list of Main_categories (HTML)
Router::get('/main_category', "main_categories.single"); // Displays single main_category (HTML)
Router::get('/main_category/find', "main_categories.find_categorie"); //find the Main_categories by name (PHP)
Router::get('/main_categories/create', "main_categories.create"); // Display the creation form (HTML)
Router::post('/main_categories/store', "main_categories.store"); // Creates the Main_categories (PHP)
Router::get('/main_categories/edit', "main_categories.edit"); // Display the edit form (HTML)
Router::post('/main_categories/update', "main_categories.update"); // Updates the main_categories (PHP)



// subcategory
Router::get('/subcategories', "subcategories.index"); // list of subcategories (HTML)
Router::get('/subcategory', "subcategories.single"); // Displays single subcategories (HTML)
Router::get('/subcategory/find', "subcategories.find_categorie"); //find the subcategories by name (PHP)
Router::get('/subcategories/create', "subcategories.create"); // Display the creation form (HTML)
Router::post('/subcategories/store', "subcategories.store"); // Creates the subcategories (PHP)
Router::get('/subcategories/edit', "subcategories.edit"); // Display the edit form (HTML)
Router::post('/subcategories/update', "subcategories.update"); // Updates the subcategories (PHP)





// products
Router::get('/products', "products.index"); // list of products (HTML)
Router::get('/product', "products.single"); // Displays single products (HTML)
Router::get('/product/find', "products.find_categorie"); //find the products by name (PHP)
Router::get('/products/create', "products.create"); // Display the creation form (HTML)
Router::post('/products/store', "products.store"); // Creates the products (PHP)
Router::post('/products/get_subcategories', "products.get_subcategories"); 
Router::get('/products/edit', "products.edit"); // Display the edit form (HTML)
Router::post('/products/update', "products.update"); // Updates the products (PHP)

// img
Router::get('/products/show_img', "products.show_img"); 
Router::post('/products/img', "products.img"); 
Router::post('/products/add/img', "products.add_img"); 
Router::put('/products/update/img', "products.update_img"); 

// search
Router::post('/products/search', "products.search"); 





Router::redirect();