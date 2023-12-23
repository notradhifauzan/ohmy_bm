<?php

    class User{
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        // Register User
        public function register($data){
            $this->db->query('INSERT INTO users (name,email,password) VALUES(:name,:email,:password)');
            // Bind values
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function followAccount($followedUser){
            $currentUser = getCurrentid();
            //insert new row to user_relation table
            $this->db->query('INSERT INTO user_relation (user, FOLLOWED_BY)
            VALUES (:targetUser, :currentUser);');

            $this->db->bind(':targetUser',$followedUser);
            $this->db->bind(':currentUser',$currentUser);

            if($this->db->execute()){
                //update following count for current user
                $this->db->query('update users set following_count =
                (select count(followed_by) from user_relation
                 where followed_by = :currentUser)
                 where id = :currentUser;');

                 $this->db->bind(':currentUser',$currentUser);

                if($this->db->execute()){
                   //update follower count for followed user
                   $this->db->query('update users set follower_count =
                   (select count(user) from user_relation
                    where user = :followedUser)
                    where id = :followedUser;');
                    
                    $this->db->bind(':followedUser',$followedUser);

                    if($this->db->execute()){
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function updateUserInformation($data){
            $this->db->query('UPDATE users
            SET bio = :bio,
                link = :link,
                birthday = :birthday,
                country = :country
            WHERE id=:userid;');

            $this->db->bind(':bio',$data['bio']);
            $this->db->bind(':link',$data['link']);
            $this->db->bind(':birthday',$data['birthday']);
            $this->db->bind(':country',$data['country']);
            $this->db->bind(':userid',$_SESSION['currentUser']->id);

            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        //Login user
        public function login($email,$password){
            //finding the user with that email
            $this->db->query('SELECT * FROM users WHERE email=:email');
            $this->db->bind(':email',$email);

            //single method will return the whole row as object
            //so you can treat $row as an object, and access the password
            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        //update session
        public function updateSession($userid){
            $this->db->query('select * from users where id=:userid');
            $this->db->bind(':userid',$userid);

            $row = $this->db->single();

            return $row;
        }

        // Find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            //bind the value to the email 
            $this->db->bind(':email' , $email);

            $row = $this->db->single();

            //check row
            if($this->db->rowCount() > 0){
                return true;
            } else return false;
        }

        // Find user by id
        public function getUserByID($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            //bind the value to the email 
            $this->db->bind(':id' , $id);

            $row = $this->db->single();

            return $row;
        }
                                     //id
        public function isFollowing($currentViewedProfile){
            $currentUser = getCurrentid();
            $this->db->query('select * from user_relation where user = :currentViewedProfile and FOLLOWED_BY = :currentUser');

            $this->db->bind(':currentViewedProfile',$currentViewedProfile);
            $this->db->bind(':currentUser',$currentUser);

            $this->db->execute();

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }

        }
    }

