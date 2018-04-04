<?php

class Users
{
    private $name;
    private $email;

    public function __construct()
    {

    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setUser($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function getUser()
    {
        return ['name' => $this->name,'email'=>$this->email];
    }
}