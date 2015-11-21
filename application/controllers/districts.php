<?php defined('SYSPATH') OR die('No direct access allowed.');

class Districts_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
		$index = new View('districts/index');
		$index->districts = $this->district_model->find_all();
        $this->template->content = $index;
       # if(request::is_ajax() && request::method() === 'post')
    }

    public function save(){
    	if( request::is_ajax() && request::method() === 'post') {
    		$this->auto_render = FALSE;
    		$post = security::xss_clean( $this->input->post() );
    		$latest = $this->district_model->insert( $post );
			log_helper::add("1",$this->user_log,$this->user_id,"Added New District named ".$post['name'].".");
	
            echo json_encode( $latest );
    	}
    }

    public function delete($id){
        if( request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
			 $district = $this->district_model->find($id);
			log_helper::add("1",$this->user_log,$this->user_id,"Deleted District named ".$district->name.".");
            echo $this->district_model->delete($id);
        }
    }

    public function update($id){
        if( request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
			$changes = "";
            $post = security::xss_clean($this->input->post('name'));
            $district = $this->district_model->find($id);
			$changes .= custom_helper::compare_variable("District Name",$district->name,$post);
			if($changes != ""){
			$changes = substr($changes,0,-2).'.';
			}
			
            $district->name = $post;
			log_helper::add("1",$this->user_log,$this->user_id,"Updated a District. ".$changes);
            echo json_encode($this->district_model->getOne($district->save($id)));
        }
    }

    public function reports(){
        $view = new View('districts/report');
        $this->template->content = $view;
    }
}