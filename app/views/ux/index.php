<?php require APPROOT . '/views/inc/header.php'; ?>
<nav class="navbar navbar-expand-lg text-bg-dark navbar-dark">
  <div class="container">
    <a href="<?php echo URLROOT; ?>/pages" class="navbar-brand fw-bold">
      <?php echo SITENAME; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/ux/add/course">Add a course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/ux/logout"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- NAVBAR ENDS HERE -->
<div class="container-fluid">
  <div class="row my-5">
    <div class="col-md-8 mx-auto">
      <div class="card text-bg-dark">
        <div class="card-header">
          <h5 class="m-0">Add Why Choose Us UI</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT; ?>/ux/add/whyus" method="POST" id="whyus">
            <div class="my-2">
              <input type="text" name="title" class="form-control rounded-0 border-0" placeholder="Title" required data-parsley-trigger="keyup" />
            </div>
            <div class="my-2">
              <input type="text" name="info" class="form-control rounded-0 border-0" placeholder="Details text" required data-parsley-trigger="keyup" />
            </div>
            <div class="d-grid mt-3">
              <button class="btn btn-outline-primary"><i class="fa fa-paper-plane"></i> Add why choose us</button>
            </div>
          </form>

        </div>
      </div>

      <div class="card mt-2 text-bg-secondary">
        <div class="card-header">
          <h5 class="m-0">Update Core Data</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT; ?>/ux/edit/coredata" method="POST" id="coredata">
            <div class="my-2">
              <input type="text" value="<?php echo $data['core']->showcaseh1; ?>" name="showcaseh1" class="form-control rounded-0 border-0" placeholder="Showcase h1" required data-parsley-trigger="keyup" />
            </div>
            <div class="my-2">
              <input type="text" value="<?php echo $data['core']->showcasep; ?>" name="showcasep" class="form-control rounded-0 border-0" placeholder="Showcase P" required data-parsley-trigger="keyup" />
            </div>
            <div class="my-2">
              <input type="text" value="<?php echo $data['core']->nextresumedate; ?>" name="nextresumedate" class="form-control rounded-0 border-0" placeholder="Next resume" required data-parsley-trigger="keyup" />
            </div>
            <div class="my-2">
              <input type="text" value="<?php echo $data['core']->enddate; ?>" name="enddate" class="form-control rounded-0 border-0" placeholder="End date" required data-parsley-trigger="keyup" />
            </div>
            <div class="my-2">
              <input type="text" value="<?php echo $data['core']->sessiontag; ?>" name="sessiontag" class="form-control rounded-0 border-0" placeholder="Session tag" required data-parsley-trigger="keyup" />
            </div>
            <div class="d-grid mt-3">
              <button class="btn btn-outline-primary"><i class="fa fa-paper-plane"></i> Update</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
  var whyus = document.querySelector('#whyus');
  $('#whyus').parsley();
  $('#whyus').on('submit', function(event) {
    event.preventDefault();
    if ($('#whyus').parsley().isValid()) {
      $.ajax({
        url: "<?php echo URLROOT; ?>/ux/add/whyus",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#submit').attr('disabled', 'disabled');
          $('#submit').val('Saving details, pls wait ......');

        },
        success: function(data) {
          whyus.reset();
          $('#submit').attr('disabled', false);
          $('#submit').val('Add Why Choose Us');
          $('#success-msg').html(data);
        }
      })
    }

  })
</script>
<script>
  $('#coredata').parsley();
  $('#coredata').on('submit', function(event) {
    event.preventDefault();
    if ($('#coredata').parsley().isValid()) {
      $.ajax({
        url: "<?php echo URLROOT; ?>/ux/edit/coredata",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#submit').attr('disabled', 'disabled');
          $('#submit').val('Saving details, pls wait ......');

        },
        success: function(data) {
          $('#submit').attr('disabled', false);
          $('#submit').val('Update');
          $('#success-msg').html(data);
        }
      })
    }

  })
</script>
<script>
  const quill = new Quill('.quill-editor-full', {
    theme: 'snow'
  });
</script>