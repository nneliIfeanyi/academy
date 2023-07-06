<?php
  class Posts extends Controller{
    public function __construct(){
      // Load Models
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');

      if(!$this->userModel->paid($_SESSION['user_name'])) {
        redirect('pages/verify');
      }
    }

    // Load All Posts
    public function index(){
      $posts = $this->postModel->getPosts();

      $data = [
        'title' => 'Web Academy',
        'description' => 'August 2023 Boot Camp, Coming Soon.',
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
        
        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],   
          'title_err' => '',
          'body_err' => ''
        ];

         // Validate email
         if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
          // Validate name
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter the post body';
          }
        }

        // Make sure there are no errors
        if(empty($data['title_err']) && empty($data['body_err'])){
          // Validation passed
          //Execute
          if($this->postModel->addPost($data)){
            // Redirect to login
            flash('post_added', 'Post Added');
            redirect('posts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('posts/add', $data);
        }

      } else {
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
          'title_err' => '',
          'body_err' => ''
        ];

         // Validate email
         if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
          // Validate name
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter the post body';
          }
        }

        // Make sure there are no errors
        if(empty($data['title_err']) && empty($data['body_err'])){
          // Validation passed
          //Execute
          if($this->postModel->updatePost($data)){
          // Redirect to login
          flash('post_message', 'Post Updated');
          redirect('posts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('posts/edit', $data);
        }

      } else {
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
          redirect('posts');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('posts');
      }
    }
  }