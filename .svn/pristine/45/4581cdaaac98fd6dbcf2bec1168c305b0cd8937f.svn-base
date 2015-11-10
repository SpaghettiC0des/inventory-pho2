<?php defined('SYSPATH') OR die('No direct access allowed.');

class Purchases_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
        $index = new View('purchases/index');
        $index->purchases  = $this->purchase_model->with('supplier')->find_all();
        $this->template->content = $index;
    }

    public function getPurchaseDetails($id){
        $this->auto_render = FALSE;
        $details = $this->purchase_model->getPurchaseDetails($id);
        // echo Kohana::debug($details);
        // echo gettype($details);
        echo json_encode($details);
        // echo Kohana::debug($data);
        
    }

    public function save(){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );
            
            $items = $post['items'];
            arr::remove('items',$post);

            foreach ($post as $key => $value) {
                $this->purchase_model->$key = $value;
            }
            $last_purchase = $this->purchase_model->save();

            if($last_purchase->id){
                $i = 0;
                foreach ($items as $key => $value) {
                    $items[$key]['purchase_id'] = $last_purchase->id;
                    $this->item_stock_model->insert($items[$i]);
                    $i++;
                }

                // echo Kohana::debug($items[0]);
                // echo json_encode($items);

            }
        }
    }

}