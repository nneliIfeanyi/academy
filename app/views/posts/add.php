<?php require APPROOT . '/views/inc2/header2.php'; ?>
<div class="container">
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light mt-2"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-3">
        <h2>Add Post</h2>
        <p></p>
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">
          <div class="form-group mb-2">
              <label>Title</label>
              <select name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                <option value="">Choose title</option>
                <option value="Anouncement">Anouncement</option>
                <option value="Assignment">Assignment</option>
              </select>
            
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group mb-1">
              <label>Body:<sup>*</sup></label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <input type="submit" class="btn btn-success mt-2" value="Submit">
        </form>
      </div>
</div>
<?php require APPROOT . '/views/inc2/footer2.php'; ?>
