<?php

class Users extends AppModel
{
    static function finde(){
        $usr = new Users();
        $usr->nome = 'Fernando';
        return $usr;
    }
}
	