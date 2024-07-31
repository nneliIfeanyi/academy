<?php
class Ux extends Controller
{
  public $uiModel;
  public $userModel;
  public function __construct()
  {
    // if (!isset($_SESSION['user_id'])) {
    //   redirect('pages');
    // }
    // Load Models
    $this->uiModel = $this->model('Ui');
    $this->userModel = $this->model('User');
  }

  // Load All ux
  public function index()
  {
    $coursedata = $this->uiModel->pullCourses();
    $coredata = $this->uiModel->pullCoreData();
    $whyus = $this->uiModel->pullWhyChooseUs();

    $data = [
      'courses' => $coursedata,
      'core' => $coredata,
      'whyus' => $whyus
    ];

    $this->view('ux/index', $data);
  }

  // Add to the ui //
  public function add($param)
  {
    if ($param == 'course') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'icon' => trim($_POST['icon']),
          'title' => trim($_POST['title']),
          'dsc' => trim($_POST['dsc']),
          'duration' => trim($_POST['duration']),
          'venue' => trim($_POST['venue']),
          'price' => trim($_POST['price']),
          'requirement' => trim($_POST['requirement'])
        ];

        if ($this->uiModel->addCourse($data)) {
          echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Course was added successfully.
          </p>
        ";
        } else {
          echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-ban'></i> Something went wrong.
          </p>
        ";
        }
      }
    } elseif ($param == 'whyus') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'title' => trim($_POST['title']),
          'info' => trim($_POST['info']),
        ];

        if ($this->uiModel->addWhyChooseUs($data)) {
          echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Why choose us added successfully.
          </p>
        ";
        } else {
          echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-ban'></i> Something went wrong.
          </p>
        ";
        }
      }
    } else {
      die('Something went wrong..');
    }
  }


  // Edit the ui //
  public function edit($param)
  {
    if ($param == 'course') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'id' => trim($_POST['id']),
          'icon' => trim($_POST['icon']),
          'title' => trim($_POST['title']),
          'dsc' => trim($_POST['dsc']),
          'duration' => trim($_POST['duration']),
          'venue' => trim($_POST['venue']),
          'price' => trim($_POST['price']),
          'requirement' => trim($_POST['requirement']),
          'details' => trim($_POST['details'])
        ];

        if ($this->uiModel->updateCourse($data)) {
          flash('msg', 'Course Edited Successfully..');
          redirect('ux');
        } else {
          flash('msg', 'An error occured..', 'alert alert-danger');
          redirect('ux');
        }
      }
    } elseif ($param == 'whyus') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p class='alert alert-success alert-dismissible fade show' role='alert'>
    <i class='fas fa-check-circle'></i> Student namewas added successfully.
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">×</span>
    </button>
</p>";
      }
    } elseif ($param == 'coredata') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'showcaseh1' => trim($_POST['showcaseh1']),
          'showcasep' => trim($_POST['showcasep']),
          'nextresumedate' => trim($_POST['nextresumedate']),
          'enddate' => trim($_POST['enddate']),
          'sessiontag' => trim($_POST['sessiontag'])
        ];

        if ($this->uiModel->updateCoreData($data)) {
          echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i>Update successfull.
          </p>
        ";
        } else {
          echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-ban'></i> Something went wrong.
          </p>
        ";
        }
      }
    } else {
      die('Something went wrong..');
    }
  }

  // Delete Function
  public function delete($param)
  {
    if ($param == 'course') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        //Execute
        if ($this->uiModel->deleteCourse($id)) {
          // Redirect to login
          flash('msg', 'Course Removed', 'alert alert-danger');
          redirect('ux');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('ux');
      }
    } else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        //Execute
        if ($this->uiModel->deleteWhyChooseUs($id)) {
          // Redirect to login
          flash('msg', 'Why Choose Us Removed', 'alert alert-danger');
          redirect('ux');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('ux');
      }
    }
  }

  // Message Here
  public function sendMessage()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'phone' => trim($_POST['phone']),
        'messages' => trim($_POST['messages']),
      ];

      if ($this->uiModel->insertMessage($data)) {
        echo "<p class='alert alert-success msg-flash fade show' role='alert'>
            <i class='fa fa-check-circle'></i> Message sent successfully.
          </p>
        ";
      } else {
        echo "<p class='alert alert-danger msg-flash fade show' role='alert'>
            <i class='fa fa-ban'></i> Something went wrong.
          </p>
        ";
      }
    }
  }
  // // Show Single Post
  // public function show($id)
  // {
  //   $post = $this->postModel->getPostById($id);
  //   $user = $this->userModel->getUserById($post->user_id);

  //   $data = [
  //     'post' => $post,
  //     'user' => $user
  //   ];

  //   $this->view('ux/show', $data);
  // }

  // // Add Post


  //     // Validate email
  //     if (empty($data['title'])) {
  //       $data['title_err'] = 'Please enter name';
  //       // Validate name
  //       if (empty($data['body'])) {
  //         $data['body_err'] = 'Please enter the post body';
  //       }
  //     }

  //     // Make sure there are no errors
  //     if (empty($data['title_err']) && empty($data['body_err'])) {
  //       // Validation passed
  //       //Execute
  //       if ($this->postModel->addPost($data)) {
  //         // Redirect to login
  //         flash('post_added', 'Post Added');
  //         redirect('ux');
  //       } else {
  //         die('Something went wrong');
  //       }
  //     } else {
  //       // Load view with errors
  //       $this->view('ux/add', $data);
  //     }
  //   } else {
  //     $data = [
  //       'title' => '',
  //       'body' => '',
  //     ];

  //     $this->view('ux/add', $data);
  //   }
  // }

  // // Edit Post
  // public function edit($id)
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     // Sanitize POST
  //     $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  //     $data = [
  //       'id' => $id,
  //       'title' => trim($_POST['title']),
  //       'body' => trim($_POST['body']),
  //       'user_id' => $_SESSION['user_id'],
  //       'title_err' => '',
  //       'body_err' => ''
  //     ];

  //     // Validate email
  //     if (empty($data['title'])) {
  //       $data['title_err'] = 'Please enter name';
  //       // Validate name
  //       if (empty($data['body'])) {
  //         $data['body_err'] = 'Please enter the post body';
  //       }
  //     }

  //     // Make sure there are no errors
  //     if (empty($data['title_err']) && empty($data['body_err'])) {
  //       // Validation passed
  //       //Execute
  //       if ($this->postModel->updatePost($data)) {
  //         // Redirect to login
  //         flash('post_message', 'Post Updated');
  //         redirect('ux');
  //       } else {
  //         die('Something went wrong');
  //       }
  //     } else {
  //       // Load view with errors
  //       $this->view('ux/edit', $data);
  //     }
  //   } else {
  //     // Get post from model
  //     $post = $this->postModel->getPostById($id);

  //     // Check for owner
  //     if ($post->user_id != $_SESSION['user_id']) {
  //       redirect('ux');
  //     }

  //     $data = [
  //       'id' => $id,
  //       'title' => $post->title,
  //       'body' => $post->body,
  //     ];

  //     $this->view('ux/edit', $data);
  //   }
  // }

  // // Delete Post

}
