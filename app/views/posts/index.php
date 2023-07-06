<?php require APPROOT . '/views/inc2/header2.php'; ?>
<section style="background-image: url('');">
  <div class="mt-2"><?php flash('login_success');?></div>
  <div class="jumbotron jumbotron-fluid mt-3 shadow">
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
      <div class="col-lg-9 pb-3 mb-3 text-center">
       <h3 class="fw-bold">A Welcome Address</h3>
      </div>
    </div>
  </div>
   

        

<?php require APPROOT . '/views/inc2/footer2.php'; ?>