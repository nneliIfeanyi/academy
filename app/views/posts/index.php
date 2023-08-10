<?php require APPROOT . '/views/inc2/header2.php'; ?>
<section style="background-image: url('');" class="jumbotron jumbotron-fluid">
  <div class="mt-2 container"><?php flash('login_success');?></div>
  <div class="mt-3">
    <div class="container">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead text-success"><?php echo $data['description']; ?></p>
      <div class="row">
        <div class="col-md-6">
          <p class="">We focus on teaching our students the fundamentals of the latest and greatest technologies to prepare them for their first dev role</p>
        </div>
      </div>
    </div>
  </div>
</section>
  <div class="container my-5">
    <div class="row">
      <?php require APPROOT . '/views/inc2/nav.php'; ?>
      <div class="col-lg-9 pb-3 my-5 text-center">
       <h3 class="fw-bold">Click <a class="btn btn-outline-success rounded-2" href="<?php echo URLROOT ?>/posts/blog">here</a> to view community interations.</h3>
      </div>
    </div>
  </div>
   

        

<?php require APPROOT . '/views/inc2/footer2.php'; ?>