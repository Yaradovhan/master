<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 16:17
 */

/**
 * Class TaskRepository
 */
class TaskRepository implements IRepo
{
    public $data = [];
    /**
     * @var ConnectionMySql
     */
    protected $connection;

    /**
     * TaskRepository constructor.
     */
    public function __construct()
    {
        $this->connection = new ConnectionMySql();
    }

    public function save()
    {
        $res = mysqli_query($this->connection->getConnection(), "INSERT INTO `tasks`(`text`, `img`) VALUES ('dovhan','dovhan')");
        $res .= mysqli_query($this->connection->getConnection(),"INSERT INTO `users`(`name`, `email`) VALUES ('dovhan','dovhan')");
        $res .= mysqli_query($this->connection->getConnection(),"INSERT INTO `users_tasks` ( user_id, task_id ) VALUES ((SELECT max(id) FROM users),(SELECT max(id) FROM tasks))");
        return $res;
    }

    public function getAll()
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT t.id, t.text, t.img, t.date, u.name, u.email 
                                                FROM tasks t 
                                                LEFT JOIN users_tasks ut 
                                                ON t.id = ut.task_id 
                                                LEFT JOIN users u 
                                                ON u.id = ut.user_id");
        if (!$res) {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $task = new Task();
            $task->setTask(['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
            $user = new Users();
            $user->setUser(['email' => $all['email'], 'name' => $all['name']]);
            $this->data[$i]['task'] = $task->getTask();
            $this->data[$i]['user'] = $user->getUser();
        }
        return $this->data;
    }

    public function getAllById($id)
    {

    }

    public function deleteById($id)
    {
        $res = mysqli_query($this->connection->getConnection(), "DELETE t.*, ut.*
                                        FROM tasks t
                                        LEFT JOIN users_tasks ut ON t.id = ut.task_id
                                        WHERE t.id = '$id'");
        return $res;
    }

    public function updateById($id)
    {
        $res = mysqli_query($this->connection->getConnection(), "INSERT * ");
        return $res;
    }

    public function getAllByName()
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT t . id, t . text, t . img, t . date, u . name, u . email
                                                FROM tasks t
                                                LEFT JOIN users_tasks ut
                                                ON t . id = ut . task_id
                                                LEFT JOIN users u
                                                ON u . id = ut . user_id
                                                ORDER BY u . name DESC");
        if (!$res) {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $task = new Task();
            $task->setTask(['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
            $user = new Users();
            $user->setUser(['email' => $all['email'], 'name' => $all['name']]);
            $this->data[$i]['task'] = $task->getTask();
            $this->data[$i]['user'] = $user->getUser();
        }
        return $this->data;
    }

    public function getAllByEmail()
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT t . id, t . text, t . img, t . date, u . name, u . email
                                                FROM tasks t
                                                LEFT JOIN users_tasks ut
                                                ON t . id = ut . task_id
                                                LEFT JOIN users u
                                                ON u . id = ut . user_id
                                                ORDER BY u . email DESC");
        if (!$res) {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $task = new Task();
            $task->setTask(['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
            $user = new Users();
            $user->setUser(['email' => $all['email'], 'name' => $all['name']]);
            $this->data[$i]['task'] = $task->getTask();
            $this->data[$i]['user'] = $user->getUser();
        }
        return $this->data;
    }


}