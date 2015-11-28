<?php
defined('SYSPATH') OR die('No direct access allowed.');

class Offices_Controller extends Dashboard_Controller
{
    
    const ALLOW_PRODUCTION = FALSE;
    
    public function index() {
        $index = new View('offices/index');
        $index->offices = $this->office_model->with('district')->find_all();
        $this->template->content = $index;
    }
    
    public function save() {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());   
            $latest = $this->office_model->insert($post);
            log_helper::add("1", $this->user_log, $this->user_id, "Added New Office named " . $post['name']);
            
            echo json_encode($latest);
        }
    }
    
    public function update($id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
            $office = $this->office_model->with('district')->find($id);
            $district = $this->district_model->find($post['district_id']);
            $changes = "";
            $changes.= custom_helper::compare_variable("Office Name", $office->name, $post['name']);
            $changes.= custom_helper::compare_variable("District Name", $office->district->name, $district->name);
            if ($changes != "") {
                $changes = substr($changes, 0, -2) . '.';
            }
            $office->district_id = $post['district_id'];
            $office->name = $post['name'];
            
            log_helper::add("1", $this->user_log, $this->user_id, "Updated an Office. " . $changes);
            echo json_encode($office->save()->as_array());
        }
    }
    
    public function delete($id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $office = $this->office_model->with('district')->find($id);
            log_helper::add("1", $this->user_log, $this->user_id, "Deleted Office named " . $office->name . ".");
            echo $this->office_model->delete($id);
        }
    }
}
