<?php

class Fruit {
    // Properties
    public $id;
    public $product_name;
    public $product_description;
    public $product_price;
    public $image;
    public $slug;
    public $categories_id;
    public $updated_at;
  
    // Methods
        // Constructor
    function __construct($id, $product_name, $product_description, $product_price, $image, $slug, $categories_id, $updated_at) {
        $this->id = $id;
        $this->product_name = $product_name;
        $this->product_description = $product_description;
        $this->product_price = $product_price;
        $this->image = $image;
        $this->slug = $slug;
        $this->categories_id = $categories_id;
        $this->updated_at = $updated_at;
    }

        //Getter And Setter
    function get_id() {
      return $this->id;
    }
    function set_id($id) {
        $this->name = $id;
    }
    function get_product_name() {
        return $this->product_name;
    }
    function set_product_name($product_name) {
        $this->product_name = $product_name;
    }
    function get_product_description() {
        return $this->product_description;
    }
    function set_product_description($product_description) {
        $this->product_description = $product_description;
    }
    function get_product_price() {
        return $this->product_price;
    }
    function set_product_price($product_price) {
        $this->product_price = $product_price;
    }
    function get_image() {
        return $this->image;
    }
    function set_image($image) {
        $this->image = $image;
    }
    function get_slug() {
        return $this->slug;
    }
    function set_slug($slug) {
        $this->slug = $slug;
    }
    function get_categories_id() {
        return $this->categories_id;
    }
    function set_categories_id($categories_id) {
        $this->categories_id = $categories_id;
    }
    function get_updated_at() {
        return $this->updated_at;
    }
    function set_updated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

  }

?>