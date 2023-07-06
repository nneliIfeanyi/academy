<?php require APPROOT . '/views/inc2/header2.php'; ?>
<section style="background-image: url('');">
  <div class="jumbotron jumbotron-fluid mt-3 shadow">
    <div class="container">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead text-success"><?php echo $data['description']; ?></p>
    </div>
  </div>
</section>

<div class="container my-5">
  <div class="row">
    <div class="col-lg-3">
      <h1 class="h2 pb-2">Dashboard</h1>
      <ul class="list-unstyled templatemo-accordion">
          <li class="pb-2">
              <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                  Students
                  <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
              </a>
              <ul class="collapse show list-unstyled pl-3">
                  <li><a class="text-decoration-none" href="">Registered</a></li>
                  <li><a class="text-decoration-none" href="">Paid</a></li>
              </ul>
          </li>
        </ul>
      </div>
   
    <div class="col-lg-9 pb-3 mb-3 text-center">
     <h3 class="fw-bold">All Registered Students</h3>
     <?php flash('verify_success');?>
      <div style="overflow-x: scroll;width: 100%;">
        <table class="w3-table-all">
          <thead>
            <tr class="w3-text-black">
              <th><b>S/N</b></th>
              <th><b>Name</b></th>
               <th><b>Sex</b></th>
              <th><b>phone</b></th>
              <th><b>Pic</b></th>
               <th><b>payment</b></th>
              <th><b>Action</b></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($data['students'] as $student) : ?>
            <tr class="w3-text-dark-grey">
              <td><?= $student->id; ?></td>
              <td><?= $student->full_name; ?></td>
              <td><?= $student->sex; ?></td>
              <td><?= $student->phone; ?></td>
              <td><a href="<?= URLROOT ."/". $student->passport ?>"><img src="<?= URLROOT ."/". $student->passport ?>" height="80px" width="95px"></a></td>
              <td><?= $student->payment; ?></td>
              <td>
               <form action="<?= URLROOT; ?>/pages/verify2/<?=$student->id?>" method="POST">
                 <input type="submit" value="Verify" class="text-success">
               </form>
                <form action="<?= URLROOT; ?>/pages/reverse/<?=$student->id?>" method="POST">
                 <input type="submit" value="Reverse" class="text-danger mt-1">
               </form>
             </td>
              

            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>




    </div>
  </div>
</div>
   
<?php require APPROOT . '/views/inc2/footer2.php'; ?>