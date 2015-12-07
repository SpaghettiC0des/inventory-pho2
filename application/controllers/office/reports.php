<?php defined('SYSPATH') OR die('No direct access allowed.');

class Reports_Controller extends Office_Base_Controller {
    public function getRequestsStatistics() {
        if(request::is_ajax()){
            $this->auto_render = FALSE;
            $office_id = $this->auth->get_user()->office_id;
            echo json_encode($this->request_model->office_report($office_id));
        }
    }
}