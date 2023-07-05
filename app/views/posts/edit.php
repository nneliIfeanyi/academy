<?php require APPROOT . '/views/inc2/header2.php'; ?>
<div class="container">
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light mt-2"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light my-3">
        <h2>Edit Post</h2>
        <p>Change the details of this post</p>
        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group mb-2">
              <label>Title:<sup>*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group mb-2">
              <label>Body:<sup>*</sup></label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <input type="submit" class="btn btn-success" value="Submit">
        </form>
      </div>
    </div>
<?php require APPROOT . '/views/inc2/footer2.php'; ?>
