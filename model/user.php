<?php

require('connect.php');

class user
{
    public function add($data)
    {
        $phone = $data['phone_number_user'];
        $name = $data['name_user'];
        $pass =md5($data['password_user']);
        $email = $data['mail_user'];

        $sql = "INSERT INTO `user` (`user_id`, `name_user`, `phone_number_user`, `password_user`, `status`, `id_role`, `mail_user`) 
        VALUES (NULL, '{$name}', '{$phone}', '{$pass}', '1', '2', '{$email}')";

        //Call global variable
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }
}