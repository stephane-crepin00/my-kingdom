<?php

  namespace app\controller;

  class ConnexionController extends Controller {
    public function render() {
      $user =  $this->getOneData('SELECT * FROM USER');

      $arrayToTemplate = ['user' => $user];
    
      $this->checkConnection($arrayToTemplate);
    }
  }
?>
