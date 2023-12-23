<?php
    /* controller.Users.php */
    class Users extends Controller{
        private $userModel;

        public function __construct()
        {
            //what is userModel variable?
            //we use userModel variable to fetch data from database
            $this->userModel = $this->model('User');
            $this->tweetModel = $this->model('Tweet');
        }

        public function register(){
            //this function will handle two things
            // 1. loads our registration form
            // 2. handles register form submission

            //check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process the form

                //sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //validation
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                } else {
                    //check email
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'email is already taken';
                    }
                }
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter your name';
                }
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter your password';
                } else if(strlen($data['password'])<6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Password do not match';
                    }
                }

                //make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err'])  
                        && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //validated
                    //hash the password (1-way hashing algorithm)
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->userModel->register($data)){
                        //redirect to home page
                        flash('register_success', 'You are registered and can log in');
                        redirect('users/login');
                    } else {
                        die('something went wrong');
                    }

                } else {
                    //Load view with errors
                    $this->view('users/register', $data);
                }

            } else {
                //init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //load view
                $this->view('users/register', $data);
            }
        }

        public function login(){
            //check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process the login form
                //sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                 //init data
                $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err' => '',
                'password_err' => '',
                ];

                
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter your password';
                }

                //check for user/mail
                if($this->userModel->findUserByEmail($data['email'])){
                    //user found
                } else {
                    $data['email_err'] = 'No user found';
                }

                //make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //validated
                    //Check and set logged in user

                    $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                    if($loggedInUser){
                        //create session
                        $this->createUserSession($loggedInUser);
                        die('Successful login');
                    } else {
                        $data['password_err'] = 'Password Incorrect';
                        $this->view('users/login',$data);
                    }
                } else {
                    //Load view with errors
                    $this->view('users/login', $data);
                }
                
            } else {
                //init data
                $data = [
                    'email' => '',
                    'password' => '',

                    'email_err' => '',
                    'password_err' => '',
                ];

                //load view
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            //why not just store the object as a session?
            /*
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name; */

            //storing object into the session variable
            $_SESSION['currentUser'] = $user;
            redirect('posts');
        }

        public function logout(){
            unset($_SESSION['currentUser']);
            session_destroy();
            redirect('users/login');
        }

        public function profile(){
            //you need to update the currentUser session

            $mypost = $this->userModel->getUserPosts($_SESSION['currentUser']->id);
            $_SESSION['currentUser'] = $this->userModel->updateSession($_SESSION['currentUser']->id);
            $data = [
                'currentUser' => $_SESSION['currentUser'],
                'mypost' => $mypost
            ];
            $this->view('users/profile', $data);
        }

        public function editBio(){
            //you can call this function if the profile page is your profile page
            //in this function, you will only need the current logged in userid
            $userid = $_SESSION['currentUser']->id;
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process the bio update form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                //get the newbio input
                $newBio = $_POST['newBio'];

                if($this->userModel->updateBio($newBio,$userid)){
                    flash('bioUpdate_success','successfully updated your bio');
                    redirect('users/profile');
                } else {
                    flash('bioUpdate_fail','bio update unsuccessful','alert alert-danger');
                    redirect('users/profile');
                }
            }
        }

        /*
            sometime we use redirect, sometime we load the view. it depends
        */

        public function editPost($postid){
            $userid = $_SESSION['currentUser']->id;

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process the post update form
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                //GET THE NEW POST
                $newpost = $_POST['newpost'.$postid];
                
                if($this->tweetModel->updatePost($postid,$newpost)){
                    flash('edit_success', 'successfully update your post');
                    redirect('users/profile');
                } else {
                    flash('edit_fail', 'fail to edit your post','alert alert-danger');
                    redirect('users/profile');
                }
            }
        }

        public function postTweets(){
            $id = getCurrentid();
            //get the tweet input
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                //get the new tweet
                $newTweet = $_POST['tweetInput'];
                if($this->tweetModel->newTweet($id,$newTweet)){
                    flash('upload_success', 'new tweet uploaded');
                    redirect('pages');
                } else {
                    flash('upload_fail', 'fail to upload tweet','alert alert-danger');
                    redirect('pages');
                }
            }
        }

    }