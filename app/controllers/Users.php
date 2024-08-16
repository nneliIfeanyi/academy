<?php
class Users extends Controller
{
  public $userModel;
  private $uiModel;
  private $smsModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->uiModel = $this->model('Ui');
    $this->smsModel = $this->model('Ebulksms');
  }

  public function index()
  {
    redirect('pages/welcome');
  }

  // Registeration Function Begins
  /////////////////////////////////////////
  public function register($param)
  {
    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      if ($param == '0') { // ie coming from the homepage
        $fullname = trim($_POST['name']);
        $course = explode(',', trim($_POST['course']));
        $courseName = $course[1];
        $_SESSION['courseID'] = $course[0];
        $data = [
          'name' => $fullname,
          'email' => trim($_POST['email']),
          'mobile' => trim($_POST['mobile']),
          'course' => $courseName,
          'password' => "    ",
        ];
        //Check if user exist by email
        if ($this->userModel->findUserByEmail($data['email'], $data['course'])) {
          $redirect = URLROOT . '/users/login';
          echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> An error occured, you already registered for this course..
          </p> <meta http-equiv='refresh' content='5; $redirect'>
        ";
        } else {
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          if ($this->userModel->register($data)) {
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['phone'] = $data['mobile'];
            $_SESSION['course'] = $data['course'];
            // Redirect to step two
            $redirect = URLROOT . '/users/register/2';
            // flash('msg', 'Your application is recieved, proceed to step 2');
            // redirect('users/register/2');
            echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Your application is recieved, Proceeding...
          </p><meta http-equiv='refresh' content='5; $redirect'>
        ";
          } else {
            die('Something went wrong');
          }
        }
      } elseif ($param == '1') { // ie coming from the register page step 1
        $fullname = trim($_POST['surname']) . ' ' . trim($_POST['othername']);
        $course = explode(',', trim($_POST['course']));
        $courseName = $course[1];
        $_SESSION['courseID'] = $course[0];
        $data = [
          'name' => $fullname,
          'email' => trim($_POST['email']),
          'mobile' => trim($_POST['mobile']),
          'course' => $courseName,
          'password' => trim($_POST['password']),
          'referal' => ''
        ];
        //$redirect = URLROOT . '/users/login';
        //Check if user exist by email
        if ($this->userModel->findUserByEmail($data['email'], $data['course'])) {
          echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> You already registered for this course..
          </p>
        ";
        } else {
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          if ($this->userModel->register($data)) {
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['phone'] = $data['mobile'];
            $_SESSION['course'] = $data['course'];
            // Redirect to step two
            $redirect = URLROOT . '/users/register/2';
            // flash('msg', 'Your application is recieved, proceed to step 2');
            // redirect('users/register/2');
            echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Your application is recieved, Proceeding...
          </p><meta http-equiv='refresh' content='5; $redirect'>
        ";
          } else {
            die('Something went wrong');
          }
        }
      } elseif ($param == '2') {
        // Step two application
        $data = [
          'soo' => trim($_POST['soo']),
          'address' => trim($_POST['address']),
          'dob' => $_POST['dob'],
          'gender' => $_POST['gender'],
          'email' => $_SESSION['email']
        ];
        if ($this->userModel->registerStep2($data)) {

          //Multitexter sms
          // fast_send_sms($_SESSION['phone'], $_SESSION['course']);

          if ($_SESSION['course'] == 'Mobile App Development' || $_SESSION['course'] == 'UX Design' || $_SESSION['course'] == 'Web development') {
            //Multitexter sms to student
            fast_send_sms($_SESSION['phone'], $_SESSION['course']);

            // Send Email To Student
            sendMail($_SESSION['email'], $_SESSION['course']);

            // Send Email To Admin
            sendMailToAdmin('stanvicbest@gmail.com', $_SESSION['name'], $_SESSION['phone'], $_SESSION['course']);
          } elseif ($_SESSION['course'] == 'Introduction to Machine learning with python') {
            $this->smsModel->sendSms($_SESSION['name'], $_SESSION['phone'], $_SESSION['course'], "2349079634127");
          }
          // Redirect to success page
          $redirect = URLROOT . '/users/register/success';
          echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i>  Application submitted successfully
          </p><meta http-equiv='refresh' content='0.9; $redirect'>
        ";
          unset($_SESSION['name']);
          unset($_SESSION['email']);
          unset($_SESSION['phone']);
          unset($_SESSION['course']);
        } else {
          die('Something went wrong');
        }
      }
    } else { // Server request not POST

      $coursedata = $this->uiModel->pullCourses();
      $data = [
        'param' => $param,
        'courses' => $coursedata,
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
      redirect('pages/welcome');
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

      // Check for user
      if (!$this->userModel->findUserByEmail2($data['email'])) {
        // User not found
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



  // Cart Page
  public function cart()
  {
    if (!$this->isLoggedIn()) {
      redirect('users/login');
    }
    $student = $this->userModel->getUserById($_SESSION['user_id']);
    $course = $this->userModel->getCourseByTitle($student->course);
    $data = [
      'name' => $student,
      'course' => $course
    ];
    $this->view('users/cart', $data);
  }
  /////////////////////////////////////
  // Payment Page
  public function pay($param)
  {
    if (!$this->isLoggedIn()) {
      redirect('users/login');
    }
    $student = $this->userModel->getUserById($_SESSION['user_id']);
    $course = $this->userModel->getCourseByTitle($student->course);
    $code = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $code = trim($_POST['code']);

      if (!$this->userModel->checkPromoCode($code)) {
        echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Successfull..
          </p><meta http-equiv='refresh' content='2; $course->paylink'>
        ";
      } else {
        echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Promo code is invalid or has expired.
          </p>
        ";
      }
    } else {

      $data = [
        'name' => $student,
        'course' => $course
      ];
      $this->view('users/pay', $data);
    }
  }





  // Create Session With User Info
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    redirect('users/cart');
  }

  // Logout & Destroy Session
  public function logout()
  {
    unset($_SESSION['user_id']);
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
