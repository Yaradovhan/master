<?php

class Task
{
    private $id;
    private $text;
    private $img;
    private $date;

    //private $data = [];

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function setTask($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : 0;
        $this->text = $data['text'];
        $this->img = $data['img'];
        $this->date = $data['date'];
    }

    public function getTask()
    {
        return ['id' => $this->id, 'text' => $this->text, 'img' => $this->img, 'date' => $this->date];
    }
}