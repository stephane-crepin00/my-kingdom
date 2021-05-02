<?php

  namespace app\controller;

  class HomeController extends Controller {
    public function render() {
      $user =  $this->getOneData('SELECT * FROM USER');

      $arrayToTemplate = ['user' => $user];

    //  $this->renderView($arrayToTemplate, 'home');
    // $this->renderJson($arrayToTemplate);
    }
  }
?>
