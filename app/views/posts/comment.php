<?php require APPROOT . '/views/inc2/header2.php'; ?>
<div class="container">
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-5">
        <p class="lead"><?= $data['post']->body;?></p>
        <p><i class="fa fa-pencil fa-2x text-success" aria-hidden="true"></i> Write your comment</p>
        <form action="<?php echo URLROOT; ?>/posts/comment/<?= $data['post']->id;?>" method="post">
            
          <div class="form-group  mb-2">
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>

          <input type="submit" class="btn btn-success" value="Submit">
        </form>
      </div>
      <br><br>
      <h5>Comments</h5>
      <?php foreach($data['comments'] as $post) : ?>
        <div class="card mb-3">
          <div class="card-body">
            <p class="card-text"><?php echo $post->comment; ?></p>
            <small class="text-success text-muted">By: <?= $post->commenter;?></small>
          </div>
         
        </div>
      <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc2/footer2.php'; ?>
