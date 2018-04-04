<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 10:28
 */
class Add extends AController
{

    public function __construct()
    {

    }

    public function get_body()
    {
        $db = new Model(HOST,USER,PASS,DB);

        return $this->render('Add',array('title'=>'Add task'));
    }
}