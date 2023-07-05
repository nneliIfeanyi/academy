<?php require APPROOT . '/views/inc2/header2.php'; ?>
<div class="container">
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6 mt-3">
    <h1>Welcome to the Community</h1>
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Post</a>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title text-success fw-bold"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $post->user_name; ?> on <?php echo $post->created_at; ?>
      </div>
      <p class="card-text"><?php echo $post->body; ?></p>
      <a class="btn btn-dark" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
    </div>
  <?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc2/footer2.php'; ?>