<?php
               require('../models/Task.php');
               require('../interfaces/metodos.php');
               require('../connecion/Connecion.php');

               class TaskDao implements metodos
               {

                   public function readAll()
                   {

                       $instance = Connecion::getInstance();

                       $conn = $instance->getCnx();

                       $tasks= array();
                       $result = $conn->query('select * from tasks');
                       while($row = $result->fetch_object())
                       {
                           array_push($tasks,$row);
                       }
                       $conn->close();
                       return json_encode($tasks);


                   }

                   public function read($id)
                   {
                       $instance = Connecion::getInstance();
                       $conn = $instance->getCnx();


                       $result = $conn->query(sprintf("select * from tasks where id='%s'",$id));

                       $task = null;


                       while($row = $result->fetch_object())
                       {
                           $task = $row;
                       }
                       $conn->close();
                       return $task;
                   }

                   public function create($task)
                   {
                       $instance = Connecion::getInstance();
                       $conn = $instance->getCnx();
                       $sql = sprintf("insert into tasks (task, date_task) values('%s','%s')",$task->getTask(),$task->getDateTask());

                       //Cuando es una consulta de tipo isert, delete, update el metodo query nos retorna true o false.
                       if ($conn->query($sql))
                       {
                           $conn->close();
                           return true;
                       }
                       $conn->close();
                       return false;
                   }

                   public function update($task)
                   {
                       $instance = Connecion::getInstance();
                       $conn = $instance->getCnx();
                       $sql = sprintf("update tasks set task='%s', date_task='%s' where id='%s'",$task->getTask(),$task->getDateTask(),$task->getId());
                       if ($conn->query($sql))
                       {
                           $conn->close();
                           return true;
                       }
                       $conn->close();
                       return false;
                   }

                   public function delete($id)
                   {
                       $instance = Connecion::getInstance();
                       $conn = $instance->getCnx();
                       $sql = sprintf("delete from tasks where id='%s'",$id);
                       if($conn->query($sql))
                       {
                           $conn->close();
                           return true;
                       }
                       else
                       {
                           $conn->close();
                           return false;
                       }
                   }
               }
             ?>
