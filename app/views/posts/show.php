<?php require APPROOT . '/views/inc2/header2.php'; ?>
<div class="container">
  <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light my-2"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
  <br>
  <h1 class="h2"><?php echo $data['post']->title; ?></h1>
  <div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data['user']->user_name; ?> on <?php echo $data['post']->created_at; ?>
  </div>
  <p><?php echo $data['post']->body; ?></p>
  <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <a class="btn btn-dark mb-3" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>">Edit</a>

    <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
      <input type="submit" class="btn btn-danger mb-3" value="Delete">
    </form>
  <?php endif; ?>
</div>
<?php require APPROOT . '/views/inc2/footer2.php'; ?>