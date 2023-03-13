<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Product;
use Core\Model\Main_categorie;
use Core\Model\Subcategorie;


use Core\Helpers\Helper;

    class Products extends Controller
    {
    
    
        protected $http_code = 200;
        protected $request_body;
    
    
        protected $response_schema = array(
            "success" => true, // to privde the response status
            "message_code" => "",
            "body" =>  []
        );
    
        
         public function render()
         {
                 if (!empty($this->view))
                         $this->view();
                         elseif(!empty($this->response_schema['body'])){
                            header("Content-Type: application/json");
                            http_response_code($this->http_code);
                            echo json_encode($this->response_schema);
            
                         }
         }
    
         function __construct()
         {
                 $this->auth();
                 $this->request_body = (array) json_decode(file_get_contents("php://input" ));
    
               
         }
    
    
         /**
         * Gets all Products
         *
         * @return array
         */
        public function index()
        {
            
       
        $this->view = 'products.index';
        $product = new Product; // new model product
        $selected_Products = $product->get_all_products();
        
        
        // htmlspecialchars all Products
        $all_Products = array () ;
        $all = array () ;
        foreach ( $selected_Products as $Products) {
        
        
        foreach ($Products as $key => $product) {
        
        $all_Products[$key] = \htmlspecialchars($product);
        
        }
    
    $all[] = (object)$all_Products;
    
    
    }
    $Main_categorie = new Main_categorie; // new model product
    $selected_main_categorie = $Main_categorie->get_all();
    $this->data['all_main_categories'] = (object)$selected_main_categorie;
    
    $this->data['products'] = $all;
    
    
    
    
    }
    
    
    /**
    * Gets one Products
    *
    * @return array
    */
    public function single()
    {
    
    $this->view = 'products.single';
    $product = new Product; // new model Product
    $carent_product = $product->get_products_by_id($_GET['id']);
    
    
    $carent_product->product_image = (object)unserialize($carent_product->product_image);
    $date = new \DateTime($carent_product->created_at);
    $carent_product->created_at = $date->format('d/M/Y');
    
    
    
    
    $this->data['product_one'] = (object)$carent_product;
    
    
    
    
    
    }
    
    
    
    
    /**
    * Display the HTML form for product creation
    *
    * @return void
    */
    public function create()
    {
    
    $categorie = new Main_categorie ; // new model Main_categorie
    $selected_main_categorie = $categorie->get_all();
    $this->data['all_main_categories'] = (object)$selected_main_categorie;
    
    
    $this->view = 'products.create';
    
    }
    
    
    /**
    * Display the HTML form for product get_subcategories
    *
    * @return void
    */
    public function get_subcategories()
    {
    
    
    try {
    
    
    $id = $this->request_body['main_category_id'];
    $item = new Subcategorie;
    
    if (empty($id)) {
    $this->http_code = 422;
    throw new \Exception('id_param_not_found!');
    
    }
    $items = $item->get_subcategories_by_id_main_categories($id);
    
    if (empty($items)) {
    $this->http_code = 404;
    throw new \Exception('No items were found!');
    
    }
    
    
    $this->response_schema['body'] = $items;
    $this->response_schema['message_code']= "items_collected";
    
    
    }catch (\Exception $error) {
    $this->response_schema['success'] = false;
    $this->response_schema['message_code'] = $error->getMessage();
    
    
    
    }
    
    }
    
    
    
    
    /**
    * Creates new product
    *
    * @return void
    */
    public function store()
    {
    
    
    try {
    
    if(empty($_POST['product_name']) || empty($_POST['product_price']) || empty($_POST['idm']) || empty($_POST['ids']) ){
    throw new \Exception('You need to enter some information');
    
    }
    
    $product = new Product; // new model product
    
    $name_exist = $product->check_name_exist($_POST['product_name']);
    
    if ($name_exist) {
    
    throw new \Exception('The product name you entered already exists');
    }
    
    
    if (!empty($_FILES)) {
    
    
    
    
    foreach ($_FILES['picture']['name'] as $key => $value) {
    
    $fileName = basename($_FILES['picture']['name'][$key]);
    
    
    
    $targetDir = "resources/img/" ;
    
    
    move_uploaded_file($_FILES['picture']['tmp_name'][$key], $targetDir. $fileName);
    if (!empty($fileName)) {
    $_POST['product_image'][] = $fileName;
    
    }
    
    }
    
    $_POST['product_image']= (serialize( $_POST['product_image']));
    
    
    }
    
    $user_id = $_SESSION['user']['user_id'];
    $_POST['user_id'] = $user_id;
    $_POST['subcategory_id '] = $_POST['ids'];
    $_POST['main_categorie_id'] = $_POST['idm'];
    
    unset($_POST['ids'],$_POST['idm']); // destroys
    
    
    
    $product->create($_POST);
    Helper::redirect('/products');
    
    } catch (\Exception $error) {
    $_SESSION['product']['create_Products'] = $error->getMessage();
    
    Helper::redirect('/products/create');
    }
    
    
    
    }
    
    
    
    
    /**
    * Display the HTML form for show_img product 
    *
    * @return void
    */
    public function show_img()
    {
    
    $this->view = 'products.show_img';
    $product = new Product; // new model product
    $carent_product = $product->get_all();
    
    $this->data['product'] = $carent_product;
    
    }
    
    
    /**
    * img the product
    *
    * @return void
    */
    public function img()
    {
    
    try {
    
    
    $id = $this->request_body['id'];
    $item = new Product;
    
    if (empty($id)) {
    $this->http_code = 422;
    throw new \Exception('id_param_not_found!');
    
    }
    $items = $item->get_by_id($id);
    
    if (empty($items)) {
    $this->http_code = 404;
    throw new \Exception('No items were found!');
    
    }
    if($item->canBeUnserialized($items->product_image)){
    
    $items->product_image = unserialize($items->product_image);
    
    }
    $this->response_schema['body'] = $items;
    $this->response_schema['message_code']= "items_collected";
    
    
    }catch (\Exception $error) {
    $this->response_schema['success'] = false;
    $this->response_schema['message_code'] = $error->getMessage();
    
    
    
    }
    
    
    
    
    }
    
    
    public function add_img(){
    
    
    $product = new Product;
    $carent_product = $product->get_products_by_id($_POST['id']);
    $all_img = unserialize($carent_product->product_image);
    
    if (!empty($_FILES)) {
    
    
    
    
    foreach ($_FILES['picture']['name'] as $key => $value) {
    
    $fileName = basename($_FILES['picture']['name'][$key]);
    
    
    
    $targetDir = "resources/img/" ;
    
    
    move_uploaded_file($_FILES['picture']['tmp_name'][$key], $targetDir. $fileName);
    if (!empty($fileName)) {
    $all_img[] = $fileName;
    
    }
    
    }
    
    $_POST['product_image']= (serialize($all_img));
    
    
    $product->update($_POST);
    Helper::redirect('/product?id=' .$_POST['id']);
    }
    
    
    
    
    
    
    }
    
    
    /**
    * img the product
    *
    * @return void
    */
    public function update_img()
    {
    
    
    
    
    
    
    
    $id = $this->request_body['id_product'];
    $img = $this->request_body['img'];
    $all = $this->request_body['img_all'];
    
    $product = new Product;
    
    
    $new = [];
    foreach ($all as $key => $value) {
        $new[] =  $value;
    }
    
    foreach (array_keys( $new, $img) as $key) {
    unset($new[$key]);
    
    }
    
    
    $all_img = serialize($new);
    
    
    
    $_POST['id'] = $id;
    
    
    $product->products($id ,$all_img);
    
    Helper::redirect('/product?id=' .$_POST['id']);
    
    }
    
    
    
       public function search(){
    
        
    try {
    
    
        $main_category_id = $this->request_body['main_category_id'];
        $subcategories_id = $this->request_body['id_subcategories'];
    
        $item = new Product;
        
        if (empty($main_category_id)) {
        $this->http_code = 422;
        throw new \Exception('id_param_not_found!');
        
        }
    
       if(empty($subcategories_id)){
        $items = $item->get_products_by_id_main_categories($main_category_id);
       }else{
        $items = $item->get_products_by_id_main_categories_and_sub_id($main_category_id ,$subcategories_id);
       }
        
        if (empty($items)) {
        $this->http_code = 404;
        throw new \Exception('No items were found!');
        
        }
        
        $this->response_schema['body'] = $items;
        $this->response_schema['message_code']= "items_collected";
        
        
        }catch (\Exception $error) {
        $this->response_schema['success'] = false;
        $this->response_schema['message_code'] = $error->getMessage();
        
        
        
        }
       }
    }