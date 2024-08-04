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
          <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/ux/logout"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- NAVBAR ENDS HERE -->


<div class="container">
  <div class="row mt-3 mb-7">
    <div class="col-lg-6 mx-auto">
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
              <textarea name="dsc" class="form-control form-control-lg rounded-0 border-0" placeholder="Course description" required data-parsley-trigger="keyup"></textarea>
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
              <textarea name="requirement" class="form-control form-control-lg rounded-0 border-0" placeholder="Enter Course requirements" required data-parsley-trigger="keyup"></textarea>
            </div>
            <div class="d-grid mt-4">
              <!-- <input type="submit" id="submit" class="btn btn-outline-dark" value="Add course to UI" /> -->
              <button class="btn btn-outline-dark"><i class="fa fa-paper-plane"></i> Add course</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <section class="my-5">
    <div class="row">
      <div class="col-md-8">
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
                  <div class="jjustify-content-between d-flex gap-3">


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
                                <label style="font-size: small;">Course Icon</label>
                                <input type="text" name="icon" value="<?php echo $course->icon; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="fa-icon" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <label style="font-size: small;">Course Title</label>
                                <input type="text" name="title" value="<?php echo $course->title; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Course title" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <label style="font-size: small;">Course Description</label>
                                <textarea name="dsc" class="form-control form-control-lg rounded-0 border-0" placeholder="Course description" required data-parsley-trigger="keyup"><?php echo $course->dsc; ?></textarea>
                              </div>
                              <div class="my-3">
                                <label style="font-size: small;">Course Duration</label>
                                <input type="text" name="duration" value="<?php echo $course->duration; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Duration" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <label style="font-size: small;">Course Venue</label>
                                <input type="text" name="venue" value="<?php echo $course->venue; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="venue" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-3">
                                <label style="font-size: small;">Course Price</label>
                                <input type="text" name="price" value="<?php echo $course->price; ?>" class="form-control form-control-lg rounded-0 border-0" placeholder="Price" required data-parsley-trigger="keyup" />
                              </div>
                              <div class="my-4">
                                <label style="font-size: small;">Course Requirements</label>
                                <textarea name="requirement" class="form-control form-control-lg rounded-0 border-0" placeholder="Enter Course requirements" required data-parsley-trigger="keyup"><?php echo $course->requirement; ?></textarea>
                              </div>


                              <div class="d-flex justify-content-between">
                                <a href="<?php echo URLROOT; ?>/ux/edit/advance?id=<?php echo $course->id; ?>" type="button" class="btn btn-secondary">Advance Edit</a>
                                <input type="submit" class="btn btn-primary" value="Save Changes">
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