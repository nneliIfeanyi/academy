<?php

class Apply extends Controller
{
  private $uiModel;
  private $userModel;

  public function __construct()
  {
    $this->uiModel = $this->model('Ui');
    $this->userModel = $this->model('User');
  }





  public function index($param)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if (isset($_POST['surname'])) {
        $fullname = trim($_POST['surname']) . ' ' . trim($_POST['othername']);
      } else {
        $fullname = trim($_POST['name']);
      }

      $course = explode(',', trim($_POST['course']));
      $courseName = $course[1];
      $_SESSION['courseID'] = $course[0];
      $data = [
        'name' => $fullname,
        'email' => trim($_POST['email']),
        'mobile' => trim($_POST['mobile']),
        'course' => $courseName,
        'password' => "    ",
        'referal' => $param
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
          </p><meta http-equiv='refresh' content='4; $redirect'>
        ";
        } else {
          die('Something went wrong');
        }
      }
    }
    $coursedata = $this->uiModel->pullCourses();
    $data = [
      'param' => $param,
      'courses' => $coursedata,
    ];
    // Load view
    $this->view('apply/index', $data);
  }

  public function login($param)
  {
    // Init data
    $data = [
      'email' => '',
      'password' => '',
      'email_err' => '',
      'password_err' => '',
      'param' => $param
    ];

    // Load view
    $this->view('apply/login', $data);
  }

  public function welcome($param)
  {
    $coursedata = $this->uiModel->pullCourses();
    $coredata = $this->uiModel->pullCoreData();
    $whyus = $this->uiModel->pullWhyChooseUs();
    //Set Data
    $data = [
      'param' => $param,
      'courses' => $coursedata,
      'core' => $coredata,
      'whyus' => $whyus
    ];

    // Load view
    $this->view('apply/welcome', $data);
  }
}
