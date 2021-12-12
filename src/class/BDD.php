<?php

class BDD {
    const HOST = 'localhost';
    const USER = 'root';
    const PWD = '';
    const DB = 'garage';

    private $co;

    public function __construct(){

        try{
            $this->co = new PDO ('mysql:host='.self::HOST.';dbname='.self::DB, self::USER, self::PWD);

        }catch(Exeception $e){
            die($e->getMessage());

        }
    }

    public function getco(){
        return $this->co;
    }
}