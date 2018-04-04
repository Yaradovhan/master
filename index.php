<?php

include 'config.php';

//Include Task Repository
include './API/TaskRepository.php';

header("Content-Type:text/html;charset='utf8_general_ci'");

function __autoload($file)
{
    if (file_exists('controller/' . $file . '.php')) {
        require_once 'controller/' . $file . '.php';
    } else {
        require_once 'model/' . $file . '.php';
    }
}

$taskRepository = new TaskRepository();

$allTasks = $taskRepository->getAll();
$getAllByName = $taskRepository->getAllByName();
$getAllByEmail = $taskRepository->getAllByEmail();
$deleteById = $taskRepository->deleteById($_GET['id']);
$save = $taskRepository->save();
echo "<pre>";
print_r($allTasks);


$r = 1;