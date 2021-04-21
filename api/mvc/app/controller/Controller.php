<?php

  namespace app\controller;

  abstract class Controller {
    protected function getOneData(string $sql): array {
      $pdo = new \PDO('mysql:dbname=my-kingdom; host=localhost', 'my-kingdom', 'my-kingdom_pwd');
      $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);
      $state = $pdo->prepare($sql);
      if (!$state) {
          print_r($pdo->errorInfo());
      }
      $state->execute();
      $results = $state->fetchAll();
      if (isset($results[0])) {
          return $results[0];
      }
      else {
          return [];
      }
    }

    protected function renderView($variables, $template) {
      ob_start();
      extract($variables);
      ob_get_clean();
      Require_once ROOT . '/api/mvc/app/view/' . $template . '.php';
    }

    protected function renderJson($variables) {
      if (!isset($_GET['api'])) {
        ob_start();
        extract($variables);
        ob_get_clean();
      } else {
        header('Content-Type: application/json');
        $json = json_encode($variables, JSON_FORCE_OBJECT);
        echo $json;
      }
    }
  }

?>
