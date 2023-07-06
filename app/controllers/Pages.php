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
        'title' => ''
      ];

      $this->view('pages/verify', $data);
    }



  public function verify2($id){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $data = [
        'id' => $id,
        'status' => 'yes',
      ];

      if($this->userModel->verify($data)){
        flash('verify_success', 'Verify Successful');
        redirect('admin');
      } else {
        die('Something went wrong');
      }

    }
    $this->view('pages/verify', $data);
  }


    public function reverse($id){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $data = [
        'id' => $id,
        'status' => 'no',
      ];

      if($this->userModel->verify($data)){
        flash('verify_success', 'Reverse Successful');
        redirect('admin');
      } else {
        die('Something went wrong');
      }

    }
    $this->view('pages/verify', $data);
  }

  }