<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php if ($data['param'] == '1') : ?>
  <div class="row">
    <div class="col-lg-6 col-md-9 mx-auto">
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
            <input type="text" name="othername" required class="form-control form-control-lg">
          </div>
          <div class="form-group mb-2">
            <label>Email Address</label>
            <input type="email" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" class="form-control form-control-lg">
          </div>
          <div class="form-group mb-3">
            <label>Whatsapp number</label>
            <input type="number" name="mobile" required required data-parsley-type='number' maxlength="11" data-parsley-length="[11, 11]" data-parsley-trigger="keyup" pattern="\d{11}" class=" form-control form-control-lg">
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
          <div class="form-group mb-4">
            <label>Password</label>
            <input type="password" required name="password" class="form-control form-control-lg">
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
    <div class="col-lg-6 col-md-9 mx-auto">
      <div class="card card-body bg-light my-5 py-5">
        <h2 class="text-center text-primary">Application Form <strong>-</strong> Step 2 of 2</h2>

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
            <input type="submit" class="btn btn-primary" id="submit" value="Continue">
          </div>
        </form>
      </div>
    </div>
  </div>
<?php elseif ($data['param'] == 'success') : ?>
  <div class="col-lg-6 col-md-9 mx-auto my-6">
    <div class="card mb-4 p-3">
      <div class="card-body text-center">
        <h2 class="text-center text-primary">Your Application is Completed Successfully</h2>
        <hr />
        <p class="my-5"><i class="fa fa-check fa-5x"></i></p>
        <p class="lead">We are glad you made it through this application process, other informations or details will be communicated to you via text message, phone call or the email you provided.<br><strong class="fw-bold">Stay Strong and Stay Safe.</strong></p>
        <p style="font-size: small;">For more inquiries contact us on <a class="mt-4" style="text-decoration: none;" href="https://wa.me/2349168655298"><i class="fab fa-whatsapp"></i> 09168655298</a></p>
        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-outline-dark">Proceed to login</a>
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