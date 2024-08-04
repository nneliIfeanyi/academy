<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php if ($data['param'] == '1') : ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5 py-5">
        <h2 class="text-center text-primary">Application Form</h2>
        <p class="text-center text-muted">Your application is your first step to your new future. Get started now.</p>
        <hr />
        <form id="enroll">
          <div class="form-group mb-2">
            <label>Surname</label>
            <input type="text" name="surname" required class="form-control form-control-lg">
          </div>
          <div class="form-group mb-2">
            <label>Others Name</label>
            <input type="text" name="othername" class="form-control form-control-lg">
          </div>
          <div class="form-group mb-2">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control form-control-lg">
          </div>
          <div class="form-group mb-3">
            <label>Whatsapp number</label>
            <input type="number" name="mobile" class="form-control form-control-lg">
          </div>
          <div class="form-group mb-4">
            <label>Which course are you interested in?</label>
            <select class="form-control form-control-lg" name="course" required>
              <option value="">Select course</option>
              <?php foreach ($data['courses'] as $course) : ?>
                <option value="<?php echo $course->id . ',' . $course->title; ?>"><?php echo $course->title; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <p style="font-size: small;">By providing your information you consent to recieve occational promotion offers and education opportunities by phone, text message or email from <strong>Stanvic Academy</strong>.</p>
          <div class="d-grid">
            <input type="submit" id="submit" class="btn btn-primary" value="Register Now">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php require APPROOT . '/views/inc/copyright.php'; ?>
<?php elseif ($data['param'] == '2') : ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5 py-5">
        <h2 class="text-center text-primary">Application Form <strong>-</strong> Step 2 of 3</h2>

        <hr />
        <form id="step2">
          <div class="form-group mb-4">
            <label>State of origin</label>
            <input type="text" name="soo" required class="form-control form-control-lg">
          </div>
          <div class="form-group mb-4">
            <label>Residential address</label>
            <input type="text" required name="address" class="form-control form-control-lg">
          </div>
          <div class="form-group mb-4">
            <label>Date of birth</label>
            <input type="date" name="dob" class="form-control form-control-lg">
          </div>
          <div class="form-group mb-5">
            <label>Gender</label>
            <select class="form-control form-control-lg" name="gender" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <p style="font-size: 15;"><strong>Acknowledgement:</strong>The application you are submitting is for addmissionn to a training course it is not an application for employement.</p>
          <input type="checkbox" name="acknowledge" required>&nbsp; I Understand.
          <div class="d-grid mt-4">
            <input type="submit" class="btn btn-primary" value="Continue">
          </div>
        </form>
      </div>
    </div>
  </div>
<?php elseif ($data['param'] == '3') : ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5 py-5">
        <h2 class="text-center text-primary">Application Form <strong>-</strong> Step 3 of 3</h2>
        <p class="text-center text-muted fw-bold">You are almost there, so lets get this done.</p>
        <hr />
        <p class="text-center">Based on your selected course of interest, paying online before <strong>resumption date </strong> will attract a discount of <strong><?php echo $data['course']->discount; ?></strong> instead of <strong class="text-danger" style="text-decoration: line-through;"><?php echo $data['course']->price; ?></strong> click <a href="https://paystack.com/pay/stanvicacad1">here</a> to proceed. <a href="<?php echo URLROOT; ?>/users/register/later">I will do this later.</a></p>
        <div class="card mb-4 p-3">
          <div class="card-body text-center">
            <i class="<?php echo $data['course']->icon; ?> fa-5x text-primary bg-light rounded-circle p-3 my-4"></i>
            <h5 class="card-title"><?php echo $data['course']->title ?></h5>
            <p class="card-text">
              <?php echo $data['course']->dsc ?>
            </p>
            <ul class="list-group text-center">
              <li class="list-group-item  d-flex gap-3">
                <i class="fas fa-clock" style="font-size: 20px;"></i>
                <p class="fw-semibold"><?php echo $data['course']->duration ?></p>
              </li>
              <li class="list-group-item  d-flex gap-2">
                <i class="fas fa-map-marker" style="font-size: 20px;"></i>
                <p class="fw-semibold" style="font-size: 13px;"><?php echo $data['course']->venue ?></p>
              </li>
              <li class="list-group-item  d-flex gap-2">
                <i class="fas fa-certificate" style="font-size: 20px;"></i>
                <p class="fw-semibold" style="font-size: 13px;">Certificate of Completion</p>
              </li>
              <li class="list-group-item  text-center text-bg-dark">
                <p style="font-size: 28px; font-weight:bolder"><i class="fas fa-naira"></i><?php echo $data['course']->price ?></p>
              </li>
            </ul>
            <div class="d-grid mt-3">
              <a href="<?php echo URLROOT; ?>/users/register/venue" class="btn btn-primary">
                I will pay <?php echo $data['course']->price ?> at the venue
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($data['param'] == 'venue') : ?>
  <div class="col-md-6 mx-auto my-6">
    <div class="card mb-4 p-3">
      <div class="card-body text-center">
        <h2 class="text-center text-primary">Your Application is Completed Successfully</h2>
        <hr />
        <p class="my-5"><i class="fa fa-circle-check fa-5x"></i></p>
        <p class="lead">We are glad you made it through this application process, other informations or details will be communicated to you via text message, phone call or the email you provided.<br><strong class="fw-bold">Stay Strong and Stay Safe.</strong></p>
        <p style="font-size: small;">For more inquiries contact us on <a class="mt-4" style="text-decoration: none;" href="https://wa.me/2349168655298"><i class="fab fa-whatsapp"></i> 09168655298</a></p>
        <a href="<?php echo URLROOT; ?>/pages" class="btn btn-outline-dark">Back to homepage</a>
      </div>
    </div>
  </div>
<?php elseif ($data['param'] == 'later') : ?>
  <div class="col-md-6 mx-auto mt-6">
    <div class="card mb-4 p-3">
      <div class="card-body text-center">
        <h2 class="text-center text-primary">Your Application is Completed Successfully</h2>
        <hr />
        <p class="my-5"><i class="fa fa-circle-check fa-5x"></i></p>
        <p class="lead">We are glad you made it through this application process, other informations or details will be communicated to you via text message, phone call or the email you provided.<br><strong class="fw-bold">Stay Strong and Stay Safe.</strong></p>
        <p style="font-size: small;">For more inquiries contact us on <a class="mt-4" style="text-decoration: none;" href="https://wa.me/2349168655298"><i class="fab fa-whatsapp"></i> 09168655298</a></p>
        <a href="<?php echo URLROOT; ?>/pages" class="btn btn-outline-dark">Back to homepage</a>
        <a href="https://paystack.com/pay/stanvicacad1" class="btn btn-dark mt-2">Proceed online payment &nbsp;<i class="fa fa-chevron-right"></i></a>
      </div>
    </div>
  </div>
<?php elseif ($data['param'] == 'success') : ?>
  <div class="col-md-6 mx-auto my-6">
    <div class="card mb-4 p-3">
      <div class="card-body text-center">
        <h2 class="text-center text-primary">Your Application is Completed Successfully And Your Payment Recieved.</h2>
        <hr />
        <p class="my-5"><i class="fa fa-circle-check fa-5x"></i></p>
        <p class="lead">We are glad you made it through this application process, other informations or details will be communicated to you via text message, phone call or the email you provided.<br><strong class="fw-bold">Stay Strong and Stay Safe.</strong></p>
        <p style="font-size: small;">For more inquiries contact us on <a class="mt-4" style="text-decoration: none;" href="https://wa.me/2349168655298"><i class="fab fa-whatsapp"></i> 09168655298</a></p>
        <a href="<?php echo URLROOT; ?>/pages" class="btn btn-outline-dark">Back to homepage</a>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
  //var enrollForm = document.querySelector('#enroll');
  $('#enroll').parsley();
  $('#enroll').on('submit', function(event) {
    event.preventDefault();
    if ($('#enroll').parsley().isValid()) {
      $.ajax({
        url: "<?php echo URLROOT; ?>/users/register/1",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#submit').attr('disabled', 'disabled');
          $('#submit').val('Processing, pls wait ....');

        },
        success: function(data) {
          //enrollForm.reset();
          $('#submit').attr('disabled', false);
          $('#submit').val('Register Now');
          $('#success-msg').html(data);
        }
      })
    }

  })
</script>
<script>
  $('#step2').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: "<?php echo URLROOT; ?>/users/register/2",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      beforeSend: function() {
        $('#submit').attr('disabled', 'disabled');
        $('#submit').val('Submitting, pls wait ....');

      },
      success: function(data) {
        // $('#submit').attr('disabled', false);
        // $('#submit').val('Register Now');
        $('#success-msg').html(data);
      }
    });

  });
</script>