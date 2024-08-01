<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php if ($data['param'] == '1') : ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5 py-5">
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
                <option value="<?php echo $course->title; ?>"><?php echo $course->title; ?></option>
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
      <div class="card card-body bg-light mt-5 py-5">
        <h2 class="text-center text-primary">Application Form <strong>-</strong> Step 2 of 3</h2>

        <hr />
        <form action="<?php echo URLROOT; ?>/users/register/2" method="post">
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
            <input type="submit" class="btn btn-primary" value="Register">
          </div>
        </form>
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