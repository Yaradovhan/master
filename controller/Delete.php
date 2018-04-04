<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 04.04.18
 * Time: 0:18
 */

class Delete extends AController
{
    public function get_body()
    {
        $db = new Model(HOST,USER,PASS,DB);
        $todo = $db->deleteTask('22');
        return $todo;
    }
}