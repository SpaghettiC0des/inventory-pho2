<?php defined('SYSPATH') OR die('No direct access allowed.');

use Carbon\Carbon;

class Items_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
        $view = new View('items/index');
        $view->items = $this->item_model->with('item_stocks:category')->find_all();
        $this->template->content = $view;
    }

    public function newly_added(){
        $view = new View('items/newlyAdded');
        $view->items = $this->item_model->with('item_stocks')->find_all();
        $this->template->content = $view;
    }

    public function on_stock(){
        $view = new View('items/onStock');
        $view->items = $this->item_model->getAllOnStock();
        $this->template->content = $view;
    }

    public function out_of_stock(){
        $view = new View('items/outOfStock');
        $view->items = $this->item_model->getAllOutOfStock();
        $this->template->content = $view;
    }

    public function expired(){
        $view = new View('items/expired');
        $view->items = $this->item_model->getAllExpired();
        $this->template->content = $view;
    }

    public function getOne($id){
        if(request::is_ajax() AND request::method() == 'get'){
            $this->auto_render = FALSE;
            $item = $this->item_model->find($id)->as_array();
            echo json_encode($item);
        }
    }

    public function save(){
        if(request::is_ajax() && request::method() == 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );
			$filename = '';
			if(!empty($post['image_file_name'])){
			$data = explode(',', $post['image_file_name']);
			$entry = base64_decode($data[1]);
			$image = imagecreatefromstring($entry);
			$filename = "assets/uploads/items/items-".uniqid().".jpeg";
			$directory = dirname(__FILE__).DIRECTORY_SEPARATOR."../../".$filename;
			header ( 'Content-type:image/jpeg' );
			imagejpeg($image, $directory);
			imagedestroy ( $image );
			$post = array(
			"category_id" => $post['category_id'],
			"code" => $post['code'],
			"name" => $post['name'],
			"quantity" => $post['quantity'],
			"unit" => $post['unit'],
			"cost" => $post['cost'],
			"price" => $post['price'],
			"description" => $post['description'],
			"image_file_name" => $filename
			);
			}
            $item = $this->item_model->insert( $post );
			log_helper::add("1",$this->user_log,$this->user_id,"Added New Item named ".$post['name']);
        }
    }

    public function update($id){
        if(request::is_ajax() AND request::method() == 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());

            $this->item_model->update($post, $id);
        }   
    }   
    public function handleUpload(){
        $this->auto_render = FALSE;
        echo $this->input->post();
    }
}