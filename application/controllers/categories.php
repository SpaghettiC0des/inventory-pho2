<?php
defined('SYSPATH') OR die('No direct access allowed.');

use Carbon\Carbon;

class Categories_Controller extends Dashboard_Controller
{
    public function index() {
        $index = new View('categories/index');
        $index->categories = $this->category_model->find_all();
        $this->template->content = $index;
    }
    
    public function save() {
        if (request::is_ajax() && request::method() == 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
            $hasExisting = $this->category_model->where('name', $post['name'])->count_all();
            if (!$hasExisting) {
                $last = $this->category_model->insert($post);
                log_helper::add("1", $this->user_log, $this->user_id, "Added New Category named " . $post['name']);
            } 
            else {
                echo 0;
            }
        }
    }
    
    public function update($id) {
        if (request::is_ajax() && request::method() == 'post') {
            $this->auto_render = FALSE;
            $changes = "";
            $post = security::xss_clean($this->input->post());
            $category = $this->category_model->find($id);
            
            $changes.= custom_helper::compare_variable("Category Name", $category->name, $post['name']);
            $changes.= custom_helper::compare_variable("Category Description", $category->description, $post['description']);
            if ($changes != "") {
                $changes = substr($changes, 0, -2) . '.';
            }
            
            //print_r($changes);exit;
            $category->name = $post['name'];
            $category->description = $post['description'];
            log_helper::add("1", $this->user_log, $this->user_id, "Updated a Category. " . $changes);
            echo $category->save();
        }
    }
    
    public function delete($id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $category = $this->category_model->find($id);
            log_helper::add("1", $this->user_log, $this->user_id, "Deleted Category named " . $category->name . ".");
            echo $this->category_model->delete($id);
        }
    }

    public function reports(){
        $this->template->content = new View('categories/report');
    }
}
