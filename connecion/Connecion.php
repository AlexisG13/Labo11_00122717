<?php
               class Connecion
                {
                    private $user;
                    private $pass;
                    private $db;
                    private $host;
                    private static $instance = null;
                    private $cnx;
                    private function __construct() {
                        Connecion::credenciales();

                        $this->cnx = new mysqli($this->host,$this->user,$this->pass,$this->db);
                        if($this->cnx->connect_errno)
                        {
                            echo $this->cnx->connect_errno;
                        }
                    }
                    public static function getInstance()
                    {

                        if(self::$instance == null)
                        {
                            self::$instance = new Connecion();
                        }
                        return self::$instance;
                    }

                    private function credenciales()
                    {
                        $this->user="root";
                        $this->pass="";
                        $this->db="labo11";
                        $this->host = "localhost";
                    }

                    public function getCnx()
                    {
                        return $this->cnx;
                    }
                    public function close()
                    {
                        self::$instance=null;
                    }
                }
             ?>
