<?php defined('SYSPATH') OR die('No direct access allowed.');

use Carbon\Carbon;

class Categories_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
        $index = new View('categories/index');
        $index->categories = $this->category_model->find_all();
        $this->template->content = $index;
    }

    public function save(){
        if(request::is_ajax() && request::method() == 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );
            $hasExisting = $this->category_model->where('name', $post['name'])->count_all();
            if( !$hasExisting ) {
                $last = $this->category_model->insert($post);
                #echo json_helper::convert($last);
            }else{
               echo 0;
            }
            
        }
    }
}