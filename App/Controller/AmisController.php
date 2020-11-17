<?php 

namespace App\Controller;
use App\Model\AmisModel;

class AmisController {


    public function __construct()
    {
        $this->model = new AmisModel();
    }

    public function render()
    {
        $this->model->SearchFriends();
        //template page amis
        require ROOT."App/View/AmisView.php";
    }


}