<?php

/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 10:24
 */
class Index extends AController
{
    public function __construct()
    {
//        echo __CLASS__;
    }

    public function get_body()
    {
        $db = new Model(HOST, USER, PASS, DB);
        $todo = $db->get_all_db();

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'todo' => $todo
            ]
        );
    }
}
