<?php


$info_DB = [
    'servername' => DB_HOST,
    'username' => DB_USER,
    'password' => '',
    'DB_name' => DB_NAME
];

class DB_INS {
    public static function createDBInstance($info_DB) {
        return new DB($info_DB);
    }
}

define("DB_INS",DB_INS::createDBInstance($info_DB));