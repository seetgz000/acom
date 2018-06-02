<?php

class Product_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }

    public function get_all() {
        $this->db->select('*, product.name as product_name, category.name as category');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.category_id', 'left');
        $this->db->where('product.deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function to_html($product){
        $data = array(
            "product" => $product
        );

        $this->load->view("main/single_product",$data);
    }
    public function add($input) {
        $required = array(
            "name",
            "price",
            "weight",
            "category_id"
        );

        $error = false;

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
                $error_message = "Please do not leave " . $field . " empty";
            }
        }

        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message
            )));
        } else {
            $data = array(
                "name" => $input['name'],
                "price" => $input['price'],
                "discount_price" => $input['discount_price'],
                "thumbnail" => $input['thumbnail'],
                "thumbnail2" => $input['thumbnail2'],
                "weight" => $input['weight'],
                "description" => $input['description'],
                "category_id" => $input['category_id']
            );

            $this->db->insert('product', $data);

            if ($this->db->affected_rows() == 0) {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Insert Error"
                )));
            } else {
                return $this->db->insert_id();
            }
        }
    }

    public function add_image($url, $product_id) {

        $data = array(
            "product_id" => $product_id,
            "url" => $url
        );

        $this->db->insert('product_image', $data);
    }

    public function add_model($input) {
        $required = array(
            "model",
            "sku"
        );

        $error = false;

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
                $error_message = "Please do not leave " . $field . " empty";
            }
        }

        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message,
                "array" => $input,
            )));
        } else {
            $model_num = count($input['model']);

            for ($i = 0; $i < $model_num; $i++) {
                $data = array(
                    "model" => $input['model'][$i],
                    "SKU" => $input['sku'][$i],
                    "product_id" => $input['product_id']
                );

                $this->db->insert('product_model', $data);

                if ($this->db->affected_rows() == 0) {
                    die(json_encode(array(
                        "status" => false,
                        "message" => "Insert Error"
                    )));
                }
            }
        }
    }

    public function get_where($where) {
        $this->db->select('*, product.name as product_name, category.name as category');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.category_id', 'left');
        $this->db->where('product.deleted = 0');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_product_models_where($where) {
        $this->db->select('*');
        $this->db->from('product_model');
        $this->db->where('deleted = 0');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_product_images_where($where) {
        $this->db->select('*');
        $this->db->from('product_image');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function update($product_id, $input) {
        $required = array(
            "name",
            "price",
            "weight",
            "category_id"
        );

        $error = false;

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
                $error_message = "Please do not leave " . $field . " empty";
            }
        }

        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message
            )));
        } else {
            $data = array(
                "name" => $input['name'],
                "price" => $input['price'],
                "discount_price" => $input['discount_price'],
                "thumbnail" => $input['thumbnail'],
                "thumbnail2" => $input['thumbnail2'],
                "weight" => $input['weight'],
                "description" => $input['description'],
                "category_id" => $input['category_id']
            );

            $where = array(
                "product_id" => $product_id
            );

            $this->db->where($where);
            $this->db->update('product', $data);
        }
    }

    public function delete_image($where) {
        $this->db->where($where);
        $this->db->delete('product_image');
    }

    public function update_model_where($where, $data) {
        $this->db->where($where);
        $this->db->update("product_model", $data);
    }

    public function update_where($where, $data) {
        $this->db->where($where);
        $this->db->update("product", $data);
    }

    public function get_latest() {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('deleted = 0');
        $this->db->order_by('product_id DESC');
        $this->db->limit('6');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_category_by_product() {
        $this->db->select('category_id');
        $this->db->where("deleted",'0');
        $this->db->from('product');
        $this->db->group_by('category_id');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_related($category_id, $product_id) {
        $this->db->select('*, product.name as product_name, category.name as category');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.category_id', 'left');
        $this->db->where('product.deleted = 0');
        $this->db->where('product.category_id', $category_id);
        $this->db->where('product.product_id !=', $product_id);
        $this->db->limit('3');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_promotion($product_id) {
        $this->db->select('*, product.name as product_name, category.name as category');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.category_id', 'left');
        $this->db->where('product.deleted = 0');
        $this->db->where('product.discount_price != 0');
        $this->db->where('product.product_id !=', $product_id);
        $this->db->limit('3');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function filter($like, $where = array()) {
        $this->db->select('*, product.name as product_name, category.name as category');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.category_id', 'left');
        $this->db->where('product.deleted = 0');
        $this->db->like($like);
        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function get_product_model($where){
        $this->db->select('*, product.name as product_name, category.name as category');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.category_id', 'left');
        $this->db->join('product_model', 'product.product_id = product_model.product_id', 'left');
        $this->db->where('product.deleted = 0');
        $this->db->where('product_model.deleted = 0');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

}
