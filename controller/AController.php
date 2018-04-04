<?php

/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 10:23
 */
abstract class AController
{
    abstract function get_body();

    protected function render($file, $params)
    {
        extract($params);
        ob_start();
        include('view/' . $file . '.php');
        return ob_get_clean();
    }
}