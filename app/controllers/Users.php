<?php
class Users extends Controller
{
  public $userModel;
  private $uiModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->uiModel = $this->model('Ui');
  }

  public function index()
  {
    redirect('welcome');
  }

  public function register($param)
  {
    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      if ($param == '0') {
        $fullname = trim($_POST['name']);
        $data = [
          'name' => $fullname,
          'email' => trim($_POST['email']),
          'mobile' => trim($_POST['mobile']),
          'course' => trim($_POST['course']),
          'password' => "    ",
        ];
        //Check if user exist by email
        if ($this->userModel->findUserByEmail($data['email'])) {
          echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> An error occured, email is already taken..
          </p>
        ";
        } else {
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          if ($this->userModel->register($data)) {
            // Redirect to step two
            $redirect = URLROOT . '/users/register/2';
            // flash('msg', 'Your application is recieved, proceed to step 2');
            // redirect('users/register/2');
            echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Your application is recieved, proceeding...
          </p><meta http-equiv='refresh' content='3; $redirect'>
        ";
          } else {
            die('Something went wrong');
          }
        }
      } elseif ($param == '1') {
        $fullname = trim($_POST['surname']) . ' ' . trim($_POST['othername']);
        $data = [
          'name' => $fullname,
          'email' => trim($_POST['email']),
          'mobile' => trim($_POST['mobile']),
          'course' => trim($_POST['course']),
          'password' => "    ",
        ];
        $redirect = URLROOT . '/users/register/2';
        //Check if user exist by email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $_SESSION['email'] = $data['email'];
          echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Email is already taken, proceeding...
          </p><meta http-equiv='refresh' content='5; $redirect'>
        ";
        } else {
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          if ($this->userModel->register($data)) {
            $_SESSION['email'] = $data['email'];
            // Redirect to step two
            $redirect = URLROOT . '/users/register/2';
            // flash('msg', 'Your application is recieved, proceed to step 2');
            // redirect('users/register/2');
            echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Your application is recieved, proceeding...
          </p><meta http-equiv='refresh' content='5; $redirect'>
        ";
          } else {
            die('Something went wrong');
          }
        }
      } elseif ($param == '2') {
        // Step two application
      }
    } else {
      $coursedata = $this->uiModel->pullCourses();
      $data = [
        'param' => $param,
        'courses' => $coursedata
      ];
      $this->view('users/register', $data);
    }
  }
  // User registration function ends... //
  // User registration function ends... //
  // User registration function ends... //


  public function login()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('posts');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Check for email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email.';
      }

      // Check for name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name.';
      }

      // Check for user
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User Found
      } else {
        // No User
        $data['email_err'] = 'This email is not registered.';
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {

        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // User Authenticated!
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect.';
          // Load View
          $this->view('users/login', $data);
        }
      } else {
        // Load View
        $this->view('users/login', $data);
      }
    } else {
      // If NOT a POST

      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load View
      $this->view('users/login', $data);
    }
  }

  // Create Session With User Info
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;
    redirect('posts');
  }

  // Logout & Destroy Session
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('users/login');
  }

  // Check Logged In
  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
