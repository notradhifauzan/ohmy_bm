<?php
class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function isEmailExist($email)
    {
        $this->db->query('select * from student where email=:email');
        $this->db->bind(':email', $email);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isUsernameExist($username)
    {
        $this->db->query('select * from student where username=:username');
        $this->db->bind(':username', $username);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isPasswordCorrect($username, $password)
    {
        return true;
    }

    public function register($data)
    {
        $this->db->query('insert into student (username,email,password) values(:username,:email,:password);');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($data)
    {
        //finding the user with that email
        $this->db->query('SELECT * FROM student WHERE username=:username');
        $this->db->bind(':username', $data['username']);

        //single method will return the whole row as object
        //so you can treat $row as an object, and access the password
        $row = $this->db->single();

        if (password_verify($data['password'], $row->password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function getFeedbacksFromDarjah($darjahId)
    {
        $this->db->query('SELECT posts.postId, student.username, posts.darjahId, posts.post, posts.date_created
        FROM posts
        JOIN student ON posts.userId = student.studentId
        WHERE posts.darjahId = :darjahId
        ORDER BY posts.date_created DESC;');

        $this->db->bind(':darjahId',$darjahId);
        $this->db->execute();

        return $this->db->resultSet();
    }

    public function addFeedbacks($data)
    {
        $this->db->query('insert into posts (userId,darjahId,post) values (:userId,:darjahId,:post);');
        $this->db->bind(':userId',$data['userId']);
        $this->db->bind(':darjahId',$data['darjahId']);
        $this->db->bind(':post',$data['post']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
