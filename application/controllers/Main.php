<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Banner_model");
        $this->load->model("Category_model");
        $this->load->model("Product_model");
        $this->load->model("User_model");
        $this->load->model("Promotion_model");
        $this->load->model("Order_model");
        $this->load->model("Admin_model");
        $this->load->model("Collection_model");
        $this->load->model("IndexPic_model");
        $this->load->model("Label_model");

        $this->page_data = array();

        $where = array(
            'parent_id' => 0,
            'deleted' => 0
        );

        $category = $this->Category_model->get_where($where);
        $i = 0;
        foreach ($category as $row) {
            $where = array(
                'parent_id' => $row['category_id']
            );
            $category[$i]['child'] = $this->Category_model->get_where($where);
            $i++;
        }
        $this->page_data['category'] = $category;

        $where = array(
            'deleted' => 0
        );

        $this->page_data['collection'] = $this->Collection_model->get_where($where);
        $this->page_data['label_data'] = $this->Label_model->get_all();

//        die(var_dump($this->session->userdata('cart')));


    }

    public function index() {
        $this->page_data['banner'] = $this->Banner_model->get_all();
        $this->page_data['indexPic'] = $this->IndexPic_model->get_all();
        $this->page_data['latest'] = $this->Product_model->get_latest();

        $category = $this->Product_model->get_category_by_product();
        $category_types = array();

        foreach ($category as $row) {
            array_push($category_types, $row['category_id']);
        }
        $category_group = array();
        foreach ($category_types as $row) {
            $where = array(
                'category_id' => $row,
                'deleted' => 0
            );
            $category_details = $this->Category_model->get_where($where);

            $category_products['name'] = $category_details[0]['name'];
            $where = array(
                'product.category_id' => $row
            );
            $products = $this->Product_model->get_where($where);
            $category_products['product'] = $products;
            array_push($category_group, $category_products);
        }
        $this->page_data['category_group'] = $category_group;


        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/index');
        $this->load->view('main/footer');
    }

    public function products($selected = "") {

        if ($selected == "") {
            $this->page_data['products'] = $this->Product_model->get_all();
            $this->page_data['selected'] = "All Products";
            $this->page_data['selected_parent'] = "All Products";
        } else {
            $where = array(
                'product.category_id' => $selected
            );

            $this->page_data['products'] = $this->Product_model->get_where($where);

            $where = array(
                'category_id' => $selected
            );

            $category_details = $this->Category_model->get_where($where);

            $where = array(
                'category_id' => $category_details[0]['parent_id']
            );

            $parent_details = $this->Category_model->get_where($where);

            $this->page_data['selected'] = $category_details[0]['name'];
            $this->page_data['category_id'] = $category_details[0]['category_id'];
            $this->page_data['selected_parent'] = $parent_details[0]['name'];
        }
        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/products');
        $this->load->view('main/footer');
    }

    public function collection($selected = "") {

        if ($selected == "") {
            $this->page_data['products'] = $this->Product_model->get_all();
            $this->page_data['selected'] = "All Products";
        } else {
            $where = array(
                'collection_product.collection_id' => $selected
            );

            $this->page_data['products'] = $this->Product_model->get_collection_product($where);

            $where = array(
                'collection_id' => $selected
            );

            $collection_details = $this->Collection_model->get_where($where);

            $this->page_data['selected'] = $collection_details[0]['collection_name'];
            $this->page_data['collection_id'] = $collection_details[0]['collection_id'];
        }
        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/products');
        $this->load->view('main/footer');
    }

    public function product($product_id) {
        if (empty($product_id)) {
            die(redirect('main', "refresh"));
        }

        $where = array(
            'product_id' => $product_id
        );

        $product = $this->Product_model->get_where($where);

        $this->page_data['product'] = $product[0];

        $this->page_data['images'] = $this->Product_model->get_product_images_where($where);

        $this->page_data['models'] = $this->Product_model->get_product_models_where($where);

        $this->page_data['related'] = $this->Product_model->get_related($product[0]['category_id'], $product_id);

        $this->page_data['promotion'] = $this->Product_model->get_promotion($product_id);

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/product');
        $this->load->view('main/footer');
    }
    public function new_arrival() {


        $this->page_data['latest_list'] = $this->Product_model->get_latest_list();

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/new_arrival');
        $this->load->view('main/footer');
    }
    public function sales() {


        $this->page_data['promotion_list'] = $this->Product_model->get_promotion_list();

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/sales');
        $this->load->view('main/footer');
    }

    public function contact() {


        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/contact');
        $this->load->view('main/footer');
    }

    public function shipping_details() {

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/shipping_details');
        $this->load->view('main/footer');
    }

    public function term() {


        $this->page_data['promotion_list'] = $this->Product_model->get_promotion_list();

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/term');
        $this->load->view('main/footer');
    }

    public function sentContact(){
		$data = $this->input->post();

		$this->load->library('email');

		$config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_crypto']  = "ssl";
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'cherie.clo2@gmail.com';
        $config['smtp_pass'] = 'tshrcex08';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";

		$this->email->initialize($config);

        $message ="Customer Name: " . $data['contact_name'] . "<br>".
                "Customer Email: " . $data['contact_email'] . "<br>".
                "Customer Phone Number: " . $data['contact_number'] . "<br>".
                "Message: <p>" . $data['contact_message'] . "</p>";

		$this->email->from('cherie.clo2@gmail.com','Shop Cherie');
		$this->email->to('cherie.clo@hotmail.com');
		$this->email->subject('Shop Cherie Customer Contact from ' . $data['contact_name']);
        $this->email->message($message);
        $result = $this->email->send();
		if($result){
            $this->session->set_flashdata('success', 'Email Sent Successfully!');
			redirect("Main/contact", "refresh");
		} else {
            print_r($this->email->print_debugger());
        }
	}

    public function register() {
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $required = array(
                "username",
                "name",
                "password",
                "password2",
            );

            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = true;
                    $error_message = "Please do not leave any fields empty";
                }
            }

            if ($error) {
                $this->session->set_flashdata('register_error', $error_message);
            } else {

                if ($input['password'] != $input['password2']) {
                    $error = true;
                    $error_message = "Passwords do not match";
                }

                if ($_POST['referrer_code']) {
                    $where = array(
                        'referrer_code' => $input['referrer_code']
                    );

                    $referrer_code = $this->Admin_model->get_where($where);

                    if (count($referrer_code) <= 0) {
                        $error = true;
                        $error_message = "Invalid referrer code";
                    }
                }

                if ($error) {
                    $this->session->set_flashdata('register_error', $error_message);
                } else {

                    $where = array(
                        'username' => $input['username']
                    );

                    $users = $this->User_model->get_where($where);

                    if (!empty($users)) {
                        $error = true;
                        $error_message = "Email already exists";
                    }

                    if ($error) {
                        $this->session->set_flashdata('register_error', $error_message);
                    } else {
                        $user_id = $this->User_model->add($input);

                        $this->session->set_userdata(array(
                            'user_id' => $user_id,
                            'username' => $input['username']
                        ));

                        redirect("main/profile/" . $user_id, "refresh");
                    }
                }
            }
        }

        redirect("main", "refresh");
    }

    public function profile($user_id) {

        if (!$this->session->has_userdata('user_id') OR $this->session->userdata('user_id') != $user_id) {
            redirect('main', 'refresh');
        }

        $where = array(
            'user.user_id' => $user_id
        );

        $user = $this->User_model->get_where($where);

        $this->page_data['user'] = $user[0];

        $order = $this->Order_model->get_where($where);

        $i = 0;
        foreach ($order as $row) {
            $where = array(
                'order_id' => $row['order_id']
            );

            $products = $this->Order_model->get_order_products($where);

            $product_total = 0;
            $total = 0;

            $product_count = 0;
            foreach ($products as $product_row) {

                if ($product_row['discount_price'] > 0) {
                    $product_price = $product_row['discount_price'];
                 } else {
                     $product_price = $product_row['price'];
                }

                $product_total = ($product_price * $product_row['quantity']);

                $total = $total + $product_total;

                $products[$product_count]['product_total'] = $product_total;

                $product_count++;
            }

            $order[$i]['products'] = $products;

            if (!empty($order[$i]['discount'])) {
                $order[$i]['total'] = $total * ((100 - $order[$i]['discount']) / 100);
            } else {
                $order[$i]['total'] = $total;
            }
            $order[$i]['total'] = $order[$i]['total'] + $order[$i]['shipping'];
            $i++;

        }

        $this->page_data['order'] = $order;

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/profile');
        $this->load->view('main/footer');
    }

    public function login() {
        if ($_POST) {
            $input = $this->input->post();

            $sql = "SELECT username, user_id, deleted FROM user "
                    . "WHERE username = ? AND password = SHA2(CONCAT(salt, ?),512);";


            $result = $this->db->query($sql, array(
                        $input['username'],
                        $input['password']
                    ))->result_array();

            if (count($result)) {
                if ($result[0]['deleted'] == '0') {

                    $this->session->set_userdata(array(
                        'user_id' => $result[0]['user_id'],
                        'username' => $result[0]['username']
                    ));

                    redirect("main", "refresh");
                } else {
                    $this->session->set_flashdata('login_error', 'Account Deactivated');
                }
            } else {
                $this->session->set_flashdata('login_error', 'Invalid username or password');
            }
        }

        redirect("main", "refresh");
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect("main", "refresh");
    }

    public function search($selected = "") {

        if ($_POST) {
            $input = $this->input->post();

            if ($selected == "") {
                $like = array(
                    'product.name' => $input['search_keywords']
                );

                $this->page_data['products'] = $this->Product_model->filter($like);

                $this->page_data['selected'] = "All Products";
                $this->page_data['selected_parent'] = "All Products";
            } else {
                $where = array(
                    'product.category_id' => $selected
                );

                $like = array(
                    'product.name' => $input['search_keywords']
                );

                $this->page_data['products'] = $this->Product_model->filter($like, $where);

                $where = array(
                    'category_id' => $selected
                );

                $category_details = $this->Category_model->get_where($where);

                $where = array(
                    'category_id' => $category_details[0]['parent_id']
                );

                $parent_details = $this->Category_model->get_where($where);

                $this->page_data['selected'] = $category_details[0]['name'];
                $this->page_data['category_id'] = $category_details[0]['category_id'];
                $this->page_data['selected_parent'] = $parent_details[0]['name'];
            }
        }

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/search');
        $this->load->view('main/footer');
    }

    public function add_to_cart($product_id) {

        if ($_POST) {

            $input = $this->input->post();

            $where = array(
                'product.product_id' => $product_id,
                'product_model.model_id' => $input['model_id']
            );

            $product_details = $this->Product_model->get_product_model($where);

            if ($product_details[0]['discount_price'] != 0) {
                $price = $product_details[0]['discount_price'];
            } else {
                $price = $product_details[0]['price'];
            }

            $total = $price * $input['quantity'];

            $product = array(
                'product_id' => $product_id,
                'product_name' => $product_details[0]['product_name'],
                'thumbnail' => $product_details[0]['thumbnail'],
                'model_id' => $product_details[0]['model_id'],
                'model' => $product_details[0]['model'],
                'quantity' => $input['quantity'],
                'price' => $price,
                'total' => $total
            );

            if (!$this->session->has_userdata('cart')) {
                $cart = array();
                array_push($cart, $product);
            } else {
                $cart = $this->session->userdata('cart');

                $editted = false;

                $i = 0;
                foreach ($cart as $row) {
                    if ($row['product_id'] == $product_id AND $row['model_id'] == $input['model_id']) {
                        $editted = true;

                        $cart[$i]['quantity'] = $cart[$i]['quantity'] + $input['quantity'];

                        $cart[$i]['total'] = $cart[$i]['quantity'] * $price;
                    }

                    $i++;
                }

                if (!$editted) {
                    array_push($cart, $product);
                }
            }

            $this->session->set_userdata('cart', $cart);
            die(json_encode(array(
                "status" => true
            )));
        }
    }

    public function cart() {

        $cart = $this->session->userdata('cart');
        $subtotal = 0;

        if (!empty($cart)) {
            foreach ($cart as $row) {
                $subtotal = $subtotal + $row['total'];
            }
        }

        $this->page_data['cart'] = $cart;
        $this->page_data['subtotal'] = $subtotal;
        if ($this->session->has_userdata('promotion')) {
            $promotion = $this->session->userdata('promotion');
            $total = $subtotal * ((100 - $promotion['discount']) / 100);
            $discount = $subtotal * ($promotion['discount'] / 100);
            $this->page_data['total'] = $total;
            $this->page_data['discount_percentage'] = $promotion['discount'];
            $this->page_data['discount'] = $discount;
        } else {
            $this->page_data['total'] = $subtotal;
        }

        if ($this->session->has_userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');

            $where = array(
                'user_id' => $user_id
            );

            $user = $this->User_model->get_where($where);

            $this->page_data['user'] = $user[0];
        }

        $this->load->view('main/header', $this->page_data);
        $this->load->view('main/cart');
        $this->load->view('main/footer');
    }

    public function edit_cart_item($product_id, $model_id) {
        if ($_POST) {
            $input = $this->input->post();

            $cart = $this->session->userdata('cart');

            $i = 0;
            foreach ($cart as $row) {
                if ($row['product_id'] == $product_id AND $row['model_id'] == $model_id) {

                    $cart[$i]['quantity'] = $input['quantity'];

                    $cart[$i]['total'] = $cart[$i]['quantity'] * $cart[$i]['price'];
                }

                $i++;
            }

            $this->session->set_userdata('cart', $cart);
        }

        redirect('main/cart', "refresh");
    }

    public function delete_cart_item($product_id, $model_id) {

        $cart = $this->session->userdata('cart');

        $i = 0;
        foreach ($cart as $row) {
            if ($row['product_id'] == $product_id AND $row['model_id'] == $model_id) {

                array_splice($cart, $i, 1);
            }

            $i++;
        }

        $this->session->set_userdata('cart', $cart);

        redirect('main/cart', "refresh");
    }

    public function add_discount() {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'code' => $input['code'],
                'active' => "YES"
            );

            $promotion = $this->Promotion_model->get_where($where);

            if (!empty($promotion)) {
                $this->session->set_userdata('promotion', $promotion[0]);
            } else {
                $error_message = "Invalid code";
                $this->session->set_flashdata('discount_error', $error_message);
            }
        }

        redirect('main/cart', "refresh");
    }

    public function checkout() {
        if ($_POST) {
            $input = $this->input->post();
            $error = false;

            $required = array(
                "name",
                "contact",
                "address",
                "city",
                "postcode",
                "state",
                "payment"
            );

            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = true;
                    $error_message = "Please do not leave any fields empty";
                }
            }

            if ($error) {
                $this->page_data['error'] = $error_message;
                $this->session->set_flashdata('checkout_error', $error_message);
            } else {

                $user_id = $this->session->userdata('user_id');

                if ($this->session->has_userdata('promotion')) {
                    $promotion_id = $this->session->userdata('promotion')['promotion_id'];
                } else {
                    $promotion_id = 0;
                }

                $cart = $this->session->userdata('cart');

                $total = $cart[0]['total'];

                if ($this->session->has_userdata('promotion')) {
                    $promotion = $this->session->userdata('promotion');
                    $total = $total * ((100 - $promotion['discount']) / 100);
                } else {
                    $total = $total;
                }

                if ($input['payment'] == "Manual bank transfer") {
                    if ($total < 150) {
                        if ($input['state'] == "Labuan" || $input['state'] == "Sabah" || $input['state'] == "Sarawak") {
                            $shipping = 12;
                        } else {
                            $shipping = 8;
                        }
                    } else {
                        $shipping = 0;
                    }
                } else {
                    $shipping = 0;
                }

                $data = array(
                    'user_id' => $user_id,
                    'order_status_id' => 1,
                    'receiver' => $input['name'],
                    'contact' => $input['contact'],
                    'address' => $input['address'],
                    'city' => $input['city'],
                    'postcode' => $input['postcode'],
                    'state' => $input['state'],
                    'promotion_id' => $promotion_id,
                    'payment_method' => $input['payment'],
                    'shipping' => $shipping
                );

                $order_id = $this->Order_model->add_order($data);

                $this->Order_model->add_order_items($order_id);

                $this->session->unset_userdata('promotion');
                $this->session->unset_userdata('cart');

                redirect('main/payment/' . $order_id, 'refresh');
            }
        }

        redirect('main/cart', 'refresh');
    }
    public function guestCheckout() {
        if ($_POST) {
            $input = $this->input->post();
            $error = false;

            $required = array(
                "name",
                "contact",
                "address",
                "city",
                "postcode",
                "state",
                "payment"
            );

            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = true;
                    $error_message = "Please do not leave any fields empty";
                }
            }

            if ($error) {
                $this->page_data['error'] = $error_message;
                $this->session->set_flashdata('checkout_error', $error_message);
            } else {

                $user_id = 0;

                if ($this->session->has_userdata('promotion')) {
                    $promotion_id = $this->session->userdata('promotion')['promotion_id'];
                } else {
                    $promotion_id = 0;
                }

                $cart = $this->session->userdata('cart');

                $total = $cart[0]['total'];

                if ($this->session->has_userdata('promotion')) {
                    $promotion = $this->session->userdata('promotion');
                    $total = $total * ((100 - $promotion['discount']) / 100);
                } else {
                    $total = $total;
                }

                if ($input['payment'] == "Manual bank transfer") {
                    if ($total < 150) {
                        if ($input['state'] == "Labuan" || $input['state'] == "Sabah" || $input['state'] == "Sarawak") {
                            $shipping = 12;
                        } else {
                            $shipping = 8;
                        }
                    } else {
                        $shipping = 0;
                    }
                } else {
                    $shipping = 0;
                }

                $data = array(
                    'user_id' => $user_id,
                    'order_status_id' => 1,
                    'receiver' => $input['name'],
                    'contact' => $input['contact'],
                    'address' => $input['address'],
                    'city' => $input['city'],
                    'postcode' => $input['postcode'],
                    'state' => $input['state'],
                    'promotion_id' => $promotion_id,
                    'payment_method' => $input['payment'],
                    'shipping' => $shipping
                );

                $order_id = $this->Order_model->add_order($data);

                $this->Order_model->add_order_items($order_id);

                $this->session->unset_userdata('promotion');
                $this->session->unset_userdata('cart');

                redirect('main/payment/' . $order_id, 'refresh');
            }
        }

        redirect('main/cart', 'refresh');
    }

    public function edit_profile() {
        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            $required = array(
                "name",
                "contact",
                "address",
                "city",
                "postcode",
                "state"
            );

            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = true;
                    $error_message = "Please do not leave any fields empty";
                }
            }

            if ($error) {
                $this->page_data['error'] = $error_message;
                $this->session->set_flashdata('profile_error', $error_message);
            } else {
                $user_id = $this->session->userdata('user_id');

                $where = array(
                    'user_id' => $user_id
                );

                $data = array(
                    'name' => $input['name'],
                    'contact' => $input['contact'],
                    'address' => $input['address'],
                    'city' => $input['city'],
                    'postcode' => $input['postcode'],
                    'state' => $input['state']
                );

                $this->User_model->update_where($where, $data);
            }
        }

        redirect('main/profile/' . $user_id, "refresh");
    }

    public function payment($order_id) {

        $where = array(
            "order_id" => $order_id
        );

        $order = $this->Order_model->get_where($where);

        $i = 0;
        foreach ($order as $row) {
            $where = array(
                'order_id' => $row['order_id']
            );

            $products = $this->Order_model->get_order_products($where);

            $product_total = 0;
            $total = 0;

            $product_count = 0;
            foreach ($products as $product_row) {

                if ($product_row['discount_price'] > 0) {
                    $product_price = $product_row['discount_price'];
                 } else {
                     $product_price = $product_row['price'];
                }

                $product_total = ($product_price * $product_row['quantity']);

                $total = $total + $product_total;

                $products[$product_count]['product_total'] = $product_total;

                $product_count++;
            }

            $order[$i]['products'] = $products;

            $this->page_data['subtotal'] = $total;



            if (!empty($order[$i]['discount'])) {
                $order[$i]['total'] = $total * ((100 - $order[$i]['discount']) / 100);
                $this->page_data['discount'] = $total * ($order[$i]['discount'] / 100 );
            } else {
                $order[$i]['total'] = $total;
            }
            $i++;
        }

        $order[0]['total'] = $order[0]['total'] + $order[0]['shipping'];

        $this->page_data['order'] = $order[0];

        if($order[0]['user_id'] != 0) {
            if ($order[0]['user_id'] != $this->session->userdata('user_id')){
                redirect('main', "refresh");
            } else {
                $this->load->view('main/header', $this->page_data);
                $this->load->view('main/payment');
                $this->load->view('main/footer');
            }
        }else {

            $this->load->view('main/header', $this->page_data);
            $this->load->view('main/payment');
            $this->load->view('main/footer');
        }
    }

}

?>
