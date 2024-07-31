<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container-fluid">
  <div class="row my-5">

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
            <div class="my-4">
              <input type="text" name="requirement" class="form-control form-control-lg rounded-0 border-0" placeholder="Enter Course requirements" required data-parsley-trigger="keyup" />
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
  <section class="my-5">
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th>Course</th>
              <th>Duration</th>
              <th>venue</th>
              <th>Action</th>
            </tr>
            <?php foreach ($data['courses'] as $course) : ?>
              <tr>
                <td><?php echo $course->title; ?></td>
                <td><?php echo $course->duration; ?></td>
                <td><?php echo $course->venue; ?></td>
                <td>
                  <div class="d-flex gap-2">
                    <i class="fa fa-eye text-primary" data-bs-toggle="modal" data-bs-target="#eye<?php echo $course->id; ?>"></i>
                    <!-- Extra Large Modal -->

                    <div class="modal fade" id="eye<?php echo $course->id; ?>" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- <h5 class="modal-title">Extra Large Modal</h5> -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="card mb-4 rounded-0 border-0">
                              <div class="card-body text-center">
                                <i class="<?php echo $course->icon; ?> fa-5x text-primary bg-light rounded-circle p-3 my-4"></i>
                                <h5 class="card-title"><?php echo $course->title ?></h5>
                                <p class="card-text">
                                  <?php echo $course->dsc ?>
                                </p>
                                <ul class="list-group">
                                  <li class="list-group-item  d-flex gap-3">
                                    <i class="fas fa-clock" style="font-size: 20px;"></i>
                                    <p class="fw-semibold"><?php echo $course->duration ?></p>
                                  </li>
                                  <li class="list-group-item  d-flex gap-2">
                                    <i class="fas fa-map-marker" style="font-size: 20px;"></i>
                                    <p class="fw-semibold" style="font-size: 13px;"><?php echo $course->venue ?></p>
                                  </li>
                                  <li class="list-group-item  text-center text-bg-dark">
                                    <p style="font-size: 28px; font-weight:bolder"><i class="fas fa-naira"></i><?php echo $course->price ?></p>
                                  </li>
                                </ul>
                                <!-- <div class="btn-group mt-3">
                                  <a href="#" class="btn btn-primary">Reserve a seat</a>
                                  <button class="dropdown-toggle dropdown-toggle-split btn btn-primary" data-bs-toggle="dropdown">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu navbar-dark">
                                    <li><a href="#" class="dropdown-item">Course Overview &nbsp;<i class="fa fa-chevron-right"></i></a></li>
                                  </ul>
                                </div> -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- End Extra Large Modal-->
                    <i class="fa fa-pencil text-warning" data-bs-toggle="modal" data-bs-target="#eidtCourse<?php echo $course->id; ?>"></i>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="eidtCourse<?php echo $course->id; ?>" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Course Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="<?php echo URLROOT; ?>/ux/edit/course" method="POST">
                              <input type="hidden" name="id" value="<?php echo $course->id; ?>">
                              <div class="my-3">
                                <input type="text" name="icon" value="<?php echo $course->icon; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="fa-icon" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <input type="text" name="title" value="<?php echo $course->title; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Course title" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <input type="text" name="dsc" value="<?php echo $course->dsc; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Course description" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <input type="text" name="duration" value="<?php echo $course->duration; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Duration" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <input type="text" name="venue" value="<?php echo $course->venue; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="venue" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <input type="text" name="price" value="<?php echo $course->price; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Price" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-4">
                                <input type="text" name="requirement" value="<?php echo $course->requirement; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Enter Course requirements" required data-parsley-trigger="keyup" />
                              </div>
                              <textarea name="details" class="tinymce-editor"><?php echo $course->details; ?></textarea>
                              <div class="modal-footer">
                                <div class="d-flex justify-content-between">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <input type="submit" class="btn btn-primary" value="Save Changes">
                                </div>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div><!-- End edit Modal-->
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" data-bs-target="#delete"></i>
                    <!-- Delete Modal -->

                    <div class="modal fade" id="delete" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>This action cannot be reversed..</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                            <form action="<?php echo URLROOT; ?>/ux/delete/course" method="POST">
                              <input type="hidden" name="id" value="<?php echo $course->id; ?>">
                              <input type="submit" value="Continue" class="btn btn-danger">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div><!-- End Extra Large Modal-->
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>

  </section>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
  tinymce.init({
    selector: 'textarea', // change this value according to your HTML
    plugins: 'a_tinymce_plugin',
    a_plugin_option: true,
    a_configuration_option: 400
  });
</script>

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
<script>
  const quill = new Quill('.quill-editor-full', {
    theme: 'snow'
  });
</script>