<?php

class Pages extends Controller
{

  public function __construct()
  {
    $this->uiModel = $this->model('Ui');
  }

  // Load Homepage
  public function index()
  {
    $uidata = $this->uiModel->pullCourses();
    $coredata = $this->uiModel->pullCoreData();
    $whyus = $this->uiModel->pullWhyChooseUs();
    // If logged in, redirect to posts
    if (isset($_SESSION['user_id'])) {
      redirect('ui');
    }

    //Set Data
    $data = [
      'ui' => $uidata,
      'core' => $coredata,
      'whyus' => $whyus
    ];

    // Load homepage/index view
    $this->view('pages/index', $data);
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
