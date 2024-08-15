<?php

class Apply extends Controller
{
  private $uiModel;

  public function __construct()
  {
    $this->uiModel = $this->model('Ui');
  }





  public function index($param)
  {
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
