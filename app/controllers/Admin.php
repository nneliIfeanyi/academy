<?php
  class Admin extends Controller {

    public function __construct(){
     $this->userModel = $this->model('User');
     
    }
    
    
    public function index(){
      //auth
      if ($_SESSION['user_password'] != '88888') {
       redirect('posts');
     }

      $students = $this->userModel->allStudent();
      $data = [
        'title' => 'Welcome Admin',
        'description' => 'Stanvic Web Academy Management Panel',
        'students' => $students
      ];
     
      $this->view('admin/index', $data);
    }


  }