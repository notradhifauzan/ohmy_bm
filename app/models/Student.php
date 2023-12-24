<?php
class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function isEmailExist($email){
        $this->db->query('select * from student where email=:email');
        $this->db->bind(':email',$email);
        $this->db->execute();

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function isUsernameExist($username){
        $this->db->query('select * from student where username=:username');
        $this->db->bind(':username',$username);
        $this->db->execute();

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function isPasswordCorrect($username,$password){
        return true;
    }

    public function register($data){
        $this->db->query('insert into student (username,email,password) values(:username,:email,:password);');
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function login($data){
        
    }
}
