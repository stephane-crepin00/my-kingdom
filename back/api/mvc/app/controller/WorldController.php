<?php

  namespace app\controller;

  class WorldController extends Controller {
    public function render() {
      $user =  $this->getOneData('SELECT * FROM GENARAL');

      $arrayToTemplate = ['user' => $user];

      $this->renderJson($arrayToTemplate, 'general');
    }
  }
?>
