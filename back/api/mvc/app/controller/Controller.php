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

    protected function renderJson($variables, $name) {
      if (isset($_GET['api'])) {
        header('Content-Type: application/json');
        $json = json_encode($variables, JSON_FORCE_OBJECT);
        echo $json;
        return false;
      }
      ob_start();
      extract($variables);
      ob_get_clean();
    }

    protected function checkConnection($users) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-type: application/json; charset=utf-8');
        $rawPaylaod = file_get_contents('php://input');
        try {
          $payload = json_decode($rawPaylaod, true);
          if ($users['user']['login'] == $payload['pseudo'] && $users['user']['password'] == $payload['mdp']) {
            echo true;
          } else {
            echo false;
          }
        } catch (Exception $e) {
            die(json_encode(['error' => 'Payload problem.']));
        }

      //  echo json_encode(['echo' => $payload,]);
      }
    }
}
?>
