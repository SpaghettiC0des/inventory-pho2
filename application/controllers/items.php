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
			//print_r($post);exit;
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
			$item = $this->item_model->find($id)->as_array();
			
		if (!empty($_FILES['item-image']['name'])) {

			$targetPath = 'assets/uploads/items/';
			$filename = $_FILES['item-image']['name'];
			$tempname = $_FILES['item-image']['tmp_name'];
			$temp = explode(".",$filename);
			$extension = end($temp);
			
			 if(!is_dir($targetPath)){
					mkdir($targetPath, 0700);
						$salt = 'items-'.uniqid().'-';
						$targetFile =  $targetPath.$salt.$filename;
						$this->start_upload($targetFile,$tempname);
					}else{
						$salt = 'items-'.uniqid().'-';
						$targetFile =  $targetPath.$salt.$filename;  
						$this->start_upload($targetFile,$tempname);
					}
			
			}else{
			$targetFile = $item['image_file_name'];
			}
			
			$post = array(
			"category_id" => $post['item-category'],
			"code" => $post['item-code'],
			"name" => $post['item-name'],
			"quantity" => $item['quantity'],
			"unit" => $post['item-unit'],
			"cost" => $post['item-cost'],
			"price" => $post['item-price'],
			"description" => $post['item-description'],
			"image_file_name" => $targetFile
			);
            $this->item_model->update($post, $id);
			log_helper::add("1",$this->user_log,$this->user_id,"Updated Item named ".$post['name']);
        }   
    }   
	
	public function start_upload($targetFile,$tempFile){
		  move_uploaded_file($tempFile,$targetFile); 
	}
	
    public function handleUpload(){
        $this->auto_render = FALSE;
        echo $this->input->post();
    }
	
	public function delete($id){
        if( request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
			$item = $this->item_model->find($id);
			log_helper::add("1",$this->user_log,$this->user_id,"Item deleted named ".$item->name.".");
            echo $this->item_model->delete($item->id);
        }
    }
	
    public function reports(){
        $this->template->content = new View('items/report');
    }
}