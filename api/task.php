<?php
              header("Access-Control-Allow-Origin: *");
              header("Content-Type: application/json; charset=UTF-8");
              header("Access-Control-Allow-Methods: DELETE");
              header("Access-Control-Max-Age: 3600");
              header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
              require('../dao/TaskDao.php');

              $request = explode("/", substr(@$_SERVER['PATH_INFO'],1));
              $id = $request[0];
              $dao = new TaskDao();
              http_response_code(200);
              echo json_encode($dao->read($id));
            ?>
