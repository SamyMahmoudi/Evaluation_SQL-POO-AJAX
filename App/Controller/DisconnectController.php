<?php 

namespace App\Controller;
use App\Model\DisconnectModel;

class DisconnectController {

    public function __construct()
    {
       $this->model = new DisconnectModel();
    }

    public function render()
    {
        $this->model->disconnect();
        require ROOT."/App/View/AccueilView.php";
    }

}