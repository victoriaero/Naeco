<?php

require_once "model/NaecoModel.php";

class NaecoController{

    public function fale_conosco(){

        $obj = new NaecoModel();
        
        if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['msg'])){

            $obj->setEmail($_POST['email']);
            $obj->setNome($_POST['nome']);
            $obj->setMsg($_POST['msg']);

            $obj->fale_conosco();

        }

    }

}



?>