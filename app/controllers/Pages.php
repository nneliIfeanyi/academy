<?php

class Pages extends Controller
{
  private $uiModel;
  public function __construct()
  {
    $this->uiModel = $this->model('Ui');
  }

  // Load Homepage
  public function index()
  {
    redirect('pages/welcome');
  }


  public function welcome()
  {
    $coursedata = $this->uiModel->pullCourses();
    $coredata = $this->uiModel->pullCoreData();
    $whyus = $this->uiModel->pullWhyChooseUs();

    //Set Data
    $data = [
      'courses' => $coursedata,
      'core' => $coredata,
      'whyus' => $whyus
    ];

    // Load homepage/index view
    $this->view('pages/welcome', $data);
  }

  public function about()
  {
    //Set Data
    $data = [
      'version' => '1.0.0'
    ];

    // Load about view
    $this->view('pages/about', $data);
  }
}
