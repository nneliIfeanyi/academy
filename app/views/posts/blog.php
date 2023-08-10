<?php require APPROOT . '/views/inc2/header2.php'; ?>
<div class="container">
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6 mt-3">
      <?php if(!empty(flash('login_success'))):?>
        <div class="mt-2 container"><?php flash('login_success');?></div>
      <?php endif;?>
    <h1>Welcome to the Community</h1>
    <p class="lead text-muted">Here we will be releasing a step by step guide on how to code as a pro, feel free to comment at any point you are lost.<br><span class="text-success"> Welcome on board...</span></p>
    </div>
    <?php if($_SESSION['user_name'] == 'Victor'): ?>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Post</a>
    </div>
  <?php endif; ?>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
      <?php if(!empty($post->post_img)):?><a href="<?php echo URLROOT . "/" . $post->post_img; ?>"><div class="card-img"><img src="<?php echo URLROOT . "/" . $post->post_img; ?>" width="100%" height="200px"></div></a><?php endif;?>
      <h4 class="card-title text-success fw-bold"><?php echo $post->title; ?></h4>
      <!--<div class="bg-light p-2 mb-3">
        Posted by <?php echo $post->user_name; ?> on <?php echo $post->created_at; ?>
      </div>-->
      <p class="card-text"><?php echo $post->body; ?></p>
      <div class="card-footer">

        <a class="btn position-relative" href="<?php echo URLROOT; ?>/posts/comment/<?php echo $post->postId; ?>">
           <i class="fa fa-fw fa-comment text-success fa-2x"></i>Comments
           <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-dark text-light"><?= $this->postModel->getCommentRowCount($post->postId); ?></span>
            
          </a>
      </div>
      <?php if($post->user_id == $_SESSION['user_id']) : ?>
          <a class="btn btn-dark mb-3" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->postId; ?>">Edit</a>

          <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->id; ?>" method="post">
            <input type="submit" class="btn btn-danger mb-3" value="Delete">
          </form>
        <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc2/footer2.php'; ?>