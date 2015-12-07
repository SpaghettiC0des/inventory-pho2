<?php
defined('SYSPATH') OR die('No direct access allowed.');

class Ajax_Source_Controller extends Controller
{

    public function admin() {
        $suppliers = $this->supplier_model->getAll(TRUE);
        $categories = $this->category_model->getAll(TRUE);
        $items = $this->item_model->getAllOnStock();
        foreach ($items as $key => $value) {
            $arr[$key] = $value;
        }
        $items = $arr;
        
        $settings = $this->setting_model->find(1)->as_array();
        $reference_numbers = $this->request_model->getReferenceNumbers();
        $districts = $this->district_model->getAll(TRUE);
        $offices = $this->office_model->getAll(TRUE);
        $transactions = $this->transaction_model->getAll(TRUE);

        $user_result = $this->category_model->getAllUsers(Auth::instance()->get_user()->id, TRUE);
        
        $users = array();
        foreach ($user_result as $user) {
            $userInfo = json_decode($user->user_information, TRUE);
            $userAvatar = json_decode($user->user_avatar, TRUE);
            $user = (array)$user;
            $user_info = $userInfo['fullname'];
            $user_avatar = $userAvatar['location'];
            
            $user['fullName'] = $user_info;
            $user['userAvatar'] = $user_avatar;
            array_push($users, $user);
        }
        
        echo json_encode(compact('suppliers', 'categories', 'items', 'districts', 'offices', 'reference_numbers', 'settings', 'transactions', 'users'));
    }
    
    public function office() {
        $auth = new Auth;

        $office_id = $auth->get_user()->office_id;
        $items = $this->item_model->getAllOnStock();
        foreach ($items as $key => $value) {
            $arr[$key] = $value;
        }
        $items = $arr;
        
        $budget_record = $this->budget_model->getOne($office_id);
        foreach ($items as $key => $value) {
            $arr[$key] = $value;
        }
        $items = $arr;
        
        echo json_encode(compact('items', 'budget_record'));
    }
}
