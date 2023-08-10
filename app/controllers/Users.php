<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      redirect('welcome');
    }

    public function register(){

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $full_name = trim($_POST['f_name']) . " " . trim($_POST['m_name']) . " " . trim($_POST['surname']);
        $profile_pic = basename($_FILES["profile_pic"]["name"]);
        $uploadPath = "uploaded/";
        $db_image_profile_pic =  $uploadPath . $profile_pic;
        $reg_date = date('d-m-Y');

        $data = [
          'full_name' => $full_name,
          'user_name' => trim($_POST['m_name']),
          'sex' => $_POST['sex'],
          'phone' => trim($_POST['phone']),
          'profile_pic' => $db_image_profile_pic,
          'reg_date' => $reg_date,
          'f_name_err' => '',
          'm_name_err' => '',
          'surname_err' => '',
          'phone_err' => '',
          'sex_err' => '',
          'profile_pic_err' => ''
        ];

        // Validate inputs

        if(empty(trim($_POST['f_name']))){
            $data['f_name_err'] = 'Name is Required';
           $this->view('users/register', $data);
         }elseif(empty(trim($_POST['m_name']))){
            $data['m_name_err'] = 'Middle name is Required';
           $this->view('users/register', $data);
         }elseif(empty(trim($_POST['surname']))){
            $data['surname_err'] = 'Input your surname';
           $this->view('users/register', $data);
         }elseif(empty($_POST['sex'])) {
            $data['sex_err'] = 'Your sex Required';
           $this->view('users/register', $data);
         }elseif(empty(trim($_POST['phone']))){
            $data['phone_err'] = 'Phone number is Required';
           $this->view('users/register', $data);
         }elseif(strlen(trim($_POST['phone'])) < 10 ){
            $data['phone_err'] = 'input a valid phone number';
           $this->view('users/register', $data);
         }elseif($this->userModel->findUserByPhone($data['phone'])){
            $data['phone_err'] = 'Phone number is already taken.';
            $this->view('users/register', $data);

        }elseif(empty($profile_pic)){
            $data['profile_pic_err'] = 'Passport is required';
           $this->view('users/register', $data);
         }else{; 
            $imageUploadPath2 = $uploadPath . $profile_pic;
            $fileType2 = pathinfo($imageUploadPath2, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','PNG'); 
            if(!in_array($fileType2, $allowTypes)) { 
              
               flash('image_invalid', 'INVALID IMAGE TYPE', 'alert alert-danger');
               redirect('users/register');
            }else{ 
              $imageTemp2 = $_FILES["profile_pic"]["tmp_name"]; 
               
              // Compress size and upload image 
              compressImage($imageTemp2, $imageUploadPath2, 9);

              if($this->userModel->register($data)){
                flash('register_success', 'Registration Successful, You Can Now Login');
                redirect('users/login');
              } else {
                die('Something went wrong');
              } 
            }   

         }
        
      } else {
        // IF NOT A POST REQUEST
        $full_name = '';
        $_POST['f_name'] = '';
        $_POST['m_name'] = '';
        $_POST['surname'] = '';
        // Init data
        $data = [
          'user_name' => '',
          'sex' => '',
          'phone' => '',
          'f_name' => '',
          'surname' => '',
          'm_name' => '',
          'sex_err' => '',
          'phone_err' => '',
          'f_name_err' => '',
          'surname_err' => '',
          'm_name_err' => '',
          'profile_pic_err' => '',
        ];

        // Load View
        $this->view('users/register', $data);
      }
    }

    public function login(){

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'user_name' => trim($_POST['m_name']),
          'password' => trim($_POST['phone']),        
          'user_name_err' => '',
          'password_err' => '',       
        ];

        if(empty($data['user_name'])){
            $data['user_name_err'] = 'Enter your middle name';
           $this->view('users/login', $data);
         }elseif(!$this->userModel->findUser($data['user_name'])){
            $data['user_name_err'] = 'User does not exist.';
            $this->view('users/login', $data);
         }elseif(empty($data['password'])){
            $data['password_err'] = 'Enter password';
           $this->view('users/login', $data);
         }else{
          $loggedInUser = $this->userModel->login($data['user_name'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            $this->createUserSession($loggedInUser);
            flash('login_success', 'Login Successful');
            redirect('posts/blog');
           
          } else {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('users/login', $data);
          }
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'user_name' => '',
          'password' => '',
          'user_name_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('users/login', $data);
      }
    }

    // Create Session With User Info
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id; 
      $_SESSION['user_name'] = $user->user_name;
      $_SESSION['user_password'] = $user->phone;
      //redirect('posts');
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_password']);
      session_destroy();
      redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
  }