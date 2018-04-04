<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 10:25
 */

require_once('Task.php');
require_once('Users.php');

class Model
{
    public $db;
    public $data = [];

    public function __construct($host, $user, $pass, $db)
    {
        $this->db = mysqli_connect(HOST, USER, PASS, DB);
        if(!$this->db)
        {
            exec('No connection with DataBase');
        }
    }
    public function get_all_db()
    {
        $res = mysqli_query($this->db, "SELECT t.id, t.text, t.img, t.date, u.name, u.email 
                                                FROM tasks t 
                                                LEFT JOIN users_tasks ut 
                                                ON t.id = ut.task_id 
                                                LEFT JOIN users u 
                                                ON u.id = ut.user_id");
        if(!$res)
        {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res);$i++)
        {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
//        echo "<pre>";
//        print_r($all);
//        die();
            $task = new Task();
            $task->setTask( ['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
//        echo "<pre>";
//        print_r($task->getTask());
//        die();
            $user = new Users();
            $user->setUser( ['email' => $all['email'], 'name' => $all['name']]);

            $this->data[$i]['task'] = $task->getTask();
            $this->data[$i]['user'] = $user->getUser();
        }
//        echo "<pre>";
//        print_r($this->data);
//        die();
        return $this->data;
    }
    public function add_task()
    {
        $res = mysqli_query($this->db,"INSERT * ");
        return $res;
    }

    public function deleteTask($id)
    {
        $res = mysqli_query($this->db, "DELETE t.*, ut.*
                                        FROM tasks t
                                        LEFT JOIN users_tasks ut ON t.id = ut.task_id
                                        WHERE t.id = '$id'");
        return $res;
    }
    public function deleteUser($id)
    {
        $res = mysqli_query($this->db, "DELETE users, tasks, users_tasks 
                                        FROM users
                                        INNER JOIN users_tasks INNER JOIN tasks
                                        WHERE users.id = '$id'
                                        AND users_tasks.task_id = tasks.id
                                        AND users_tasks.user_id = users.id;");
        return $res;
    }
}

