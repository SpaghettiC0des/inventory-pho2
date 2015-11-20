<?php defined('SYSPATH') OR die('No direct access allowed.');

class Suppliers_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
		$index = new View('suppliers/index');
        $index->suppliers = $this->supplier_model->find_all();
        $this->template->content = $index;
    }

    public function save(){
    	if( request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
    		$post = security::xss_clean( $this->input->post() );
				log_helper::add("1",$this->user_log,$this->user_id,"Added New Supplier named ".$post['name']);
    		return $this->supplier_model->insert( $post );
    	}
    }

    public function update($id){
        if( request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
			$supplier = $this->supplier_model->find($id);
			
			$changes = "";
			$changes .= custom_helper::compare_variable("Supplier Name",$supplier->name,$post['name']);
			$changes .= custom_helper::compare_variable("Supplier Representative",$supplier->representative,$post['representative']);
			$changes .= custom_helper::compare_variable("Supplier Contact Number",$supplier->contact_number,$post['contact_number']);
			$changes .= custom_helper::compare_variable("Supplier Email",$supplier->email,$post['email']);
			$changes .= custom_helper::compare_variable("Supplier Address",$supplier->address,$post['address']);
		
		if($changes != ""){
			$changes = substr($changes,0,-2).'.';
			}
			
            foreach ($post as $key => $value) {
                $supplier->$key = $value;    
            }
			log_helper::add("1",$this->user_log,$this->user_id,"Updated a Supplier. ".$changes);
            echo $supplier->save();
        }
    }

    public function delete($id){
        if( request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
			$supplier = $this->supplier_model->find($id);
			log_helper::add("1",$this->user_log,$this->user_id,"Deleted Supplier named ".$supplier->name.".");
            echo $this->supplier_model->delete($id);
        }
    }
}