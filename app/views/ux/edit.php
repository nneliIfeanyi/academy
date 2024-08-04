<?php require APPROOT . '/views/inc/header.php'; ?>
<?php if ($data['param'] == 'advance') : ?>
  <div class="row">
    <div class="col-md-8 mx-auto pt-2 mb-6">
      <a href="<?php echo URLROOT; ?>/ux/add/course" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-2">
        <h2>Edit Course</h2>
        <p>Change the details of this course</p>
        <form action="<?php echo URLROOT; ?>/ux/edit/advance" method="post">
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
          <div class="form-group mb-4">
            <label style="font-size: small;">Course payment link</label>
            <input type="text" name="paylink" class="form-control form-control-lg <?php echo (!empty($data['paylink_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['course']->paylink; ?>">
            <span class="invalid-feedback"><?php echo $data['paylink_err']; ?></span>
          </div>
          <div class="form-group mb-4">
            <label style="font-size: small;">Discounted Price</label>
            <input type="text" name="discount" class="form-control form-control-lg <?php echo (!empty($data['discount_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['course']->discount; ?>">
            <span class="invalid-feedback"><?php echo $data['discount_err']; ?></span>
          </div>
          <div class="form-group mb-4">
            <label style="font-size: small;">Add Course Objectives</label>
            <textarea name="objectives" class="form-control form-control-lg <?php echo (!empty($data['objectives_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['course']->objectives; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['objectives_err']; ?></span>
          </div>
          <div class="form-group mb-4">
            <label style="font-size: small;">Add Curriculum</label>
            <textarea name="curriculum" class="form-control form-control-lg"><?php echo $data['course']->curriculum; ?></textarea>
          </div>
          <input type="submit" class="btn btn-success" value="Submit">
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
  tinymce.init({
    selector: 'textarea', // change this value according to your HTML
    plugins: 'a_tinymce_plugin',
    a_plugin_option: true,
    a_configuration_option: 400
  });
</script>