<?php
                  class Task
                  {
                      private $id;
                      private $task;
                      private $dateTask;

                      public function setId($id){
                          $this->id = $id;
                      }
                      public function setTask($task){
                          $this->task=$task;
                      }
                      public function setDateTask($dateTask){
                          $this->dateTask = $dateTask;
                      }

                      public function getId(){
                          return $this->id;
                      }
                      public function getTask(){
                          return $this->task;
                      }
                      public function getDateTask(){
                          return $this->dateTask;
                      }
                  }
?>
