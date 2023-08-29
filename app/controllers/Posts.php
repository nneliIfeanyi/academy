<?php
  class Posts extends Controller{
    public function __construct(){
      // Load Models
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');

    }

    // Load All Posts
    public function index(){
       if(!$this->userModel->paid($_SESSION['user_name'])) {
        redirect('pages/verify');
      }
      $posts = $this->postModel->getPosts();

      $data = [
        'title' => 'Web Academy',
        'description' => 'August 2023 Boot Camp',
        'posts' => $posts
      ];
      
      $this->view('posts/index', $data);
    }


     // Load All Posts
    public function blog(){
      $posts = $this->postModel->getPosts();
      $data = [
       'posts' => $posts
      ];
      
      $this->view('posts/blog', $data);
    }

    // Show Single Post
    public function show($id){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post, 
        'user' => $user
      ];

      $this->view('posts/show', $data);
    }

    // Add Post
    public function add(){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        if($result_file = $_FILES['result']['name']){
        $file_nameArr = explode(".", $result_file);
        $extension = end($file_nameArr);
        $ext = strtolower($extension);
        $unique_name = rand(100, 999).rand(100, 999).'.'.$ext;

        $result_folder = "uploaded/".$unique_name;
        $db_result_file = "uploaded/".$unique_name;
        
        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'post_pic' => $db_result_file,
          'body_err' => '',
          move_uploaded_file($_FILES['result']['tmp_name'],$result_folder)
        ];

        if(empty($data['body'])){
            $data['body_err'] = 'Please enter the post body';
          }
       // Make sure there are no errors
        if( empty($data['body_err']) ){
          
          if($this->postModel->addPost2($data)){

            // Redirect to login
            flash('post_added', 'Post Added');
            redirect('posts/blog');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('posts/add', $data);
        }

        }

        else{

          $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'body_err' => ''
        ];

        if(empty($data['body'])){
            $data['body_err'] = 'Please enter the post body';
          }
       // Make sure there are no errors
        if( empty($data['body_err']) ){
          
          if($this->postModel->addPost($data)){

            // Redirect to login
            flash('post_added', 'Post Added');
            redirect('posts/blog');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('posts/add', $data);
        }


        }
        
        }else {
        $data = [
          'title' => '',
          'body' => '',
        ];

        $this->view('posts/add', $data);
      }
    }

    // Edit Post
    public function edit($id){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'body_err' => ''
        ];
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter the post body';
          }

        // Make sure there are no errors
        if(empty($data['body_err'])){
      
          //Execute
          if($this->postModel->updatePost($data)){
          // Redirect to login
          flash('post_message', 'Post Updated');
          redirect('posts/blog');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('posts/edit', $data);
        }
      }else {
        // Get post from model
        $post = $this->postModel->getPostById($id);

        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('posts');
        }

        $data = [
          'id' => $id,
          'title' => $post->title,
          'body' => $post->body,
        ];

        $this->view('posts/edit', $data);
      }
    }

    // Delete Post
    public function delete($id){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost($id)){
          // Redirect to login
          flash('post_message', 'Post Removed', 'alert alert-danger');
          redirect('posts/blog');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('posts');
      }
    }



     // comments on Post
    public function comment($id){
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);
      $comments = $this->postModel->getComments($id);
      $date = date('Y-m-d');
      $time = date('H:i:s');

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
         
          'post_id' => $id,
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'user_name' => $_SESSION['user_name'],
          'date' => $date,
          'time' => $time,
          'body_err' => ''
        ];

       
          // Validate post body
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter your comment';
          }

        // Make sure there are no errors
        if(empty($data['body_err'])){
          // Validation passed
          //Execute
          if($this->postModel->addComment($data)){
            // Redirect to login
            flash('post_added', 'Comment Added');
            redirect('posts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('posts/add', $data);
        }

      }

     
      $data = [
        'comments' => $comments,
        'post' => $post, 
        'user' => $user,
        'title' => '',
        'body' => '',
      ];

      $this->view('posts/comment', $data);
    }


  }