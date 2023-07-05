<?php
  class Pages extends Controller {
    public function __construct(){
     $this->userModel = $this->model('User');
    }
    
    public function index(){
      if (isset($_SESSION['user_id'])) {
        redirect('posts');
      }


      $data = [
        'title' => '',
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => ''
      ];

      $this->view('pages/about', $data);
    }

     public function verify(){

    $data = [
        'id' => '',
        'img' => '',
      ];

    $this->view('pages/verify', $data);
  }

  }