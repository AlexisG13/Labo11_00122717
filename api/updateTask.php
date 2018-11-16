<?php
               header("Access-Control-Allow-Origin: *");
               header("Content-Type: application/json; charset=UTF-8");
               header("Access-Control-Allow-Methods: PUT");
               header("Access-Control-Max-Age: 3600");
               header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
               require('../dao/TaskDao.php');
               $data = json_decode(file_get_contents("php://input"));
               $task = new Task();
               $task->setId($data->id);
               $task->setTask($data->task);
               $task->setDateTask($data->date);
               $dao = new TaskDao();
               if($dao->update($task))
               {
                http_response_code(201);
                echo json_encode(array("message" => "Tarea Actualizada con exito"));
               }
               else{
                http_response_code(500);
                echo json_encode(array('message'=>'error '.$task->getTask()));
               }
             ?>
