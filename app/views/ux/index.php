<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row my-5">
  <div id="success-msg"></div>
  <div class="col-lg-6 ">
    <div class="card text-bg-primary">
      <div class="card-header">
        <h4>Add Course UI</h4>
      </div>
      <div class="card-body">
        <form action="" method="POST" id="course">
          <div class="my-4">
            <input type="text" name="icon" class="form-control form-control-lg rounded-0 border-0" placeholder="fa-icon" required data-parsley-trigger="keyup" />
          </div>
          <div class="my-4">
            <input type="text" name="title" class="form-control form-control-lg rounded-0 border-0" placeholder="Course title" required data-parsley-trigger="keyup" />
          </div>
          <div class="my-4">
            <input type="text" name="dsc" class="form-control form-control-lg rounded-0 border-0" placeholder="Course description" required data-parsley-trigger="keyup" />
          </div>
          <div class="my-4">
            <input type="text" name="duration" class="form-control form-control-lg rounded-0 border-0" placeholder="Duration" required data-parsley-trigger="keyup" />
          </div>
          <div class="my-4">
            <input type="text" name="venue" class="form-control form-control-lg rounded-0 border-0" placeholder="venue" required data-parsley-trigger="keyup" />
          </div>
          <div class="my-4">
            <input type="text" name="price" class="form-control form-control-lg rounded-0 border-0" placeholder="Price" required data-parsley-trigger="keyup" />
          </div>
          <div class="d-grid mt-4">
            <!-- <input type="submit" id="submit" class="btn btn-outline-dark" value="Add course to UI" /> -->
            <button class="btn btn-outline-dark"><i class="fa fa-paper-plane"></i> Add course</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <div class="col-lg-5">
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
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
  var course = document.querySelector('#course');
  $('#course').parsley();
  $('#course').on('submit', function(event) {
    event.preventDefault();
    if ($('#course').parsley().isValid()) {
      $.ajax({
        url: "<?php echo URLROOT; ?>/ux/add/course",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#submit').attr('disabled', 'disabled');
          $('#submit').val('Saving details, pls wait ......');

        },
        success: function(data) {
          course.reset();
          $('#submit').attr('disabled', false);
          $('#submit').val('Add course to UI');
          $('#success-msg').html(data);
        }
      })
    }

  })
</script>
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