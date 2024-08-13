<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-7 mx-auto">
                <h1 class="h4 p-4 text-center">You have successfully registered for <span class="text-primary"><?php echo $data['name']->course; ?></span>, your payment status is pending.</h1>
                <div class="card mb-4 p-3">
                    <div class="card-body text-center">
                        <i class="<?php echo $data['course']->icon; ?> fa-5x text-primary bg-light rounded-circle p-3 my-4"></i>
                        <h5 class="card-title"><?php echo $data['course']->title ?></h5>
                        <br>
                        <p class="card-text">
                            <?php echo $data['course']->dsc ?>
                        </p>
                        <ul class="list-group text-start">
                            <li class="list-group-item  d-flex">
                                <i class="fas fa-clock fa-2x me-2"></i>
                                <p class="fw-semibold"><?php echo $data['course']->duration ?></p>
                            </li>
                            <li class="list-group-item d-flex">
                                <i class="fas fa-map-marker fa-2x me-2"></i>
                                <p class="fw-semibold"><?php echo $data['course']->venue ?></p>
                            </li>
                            <li class="list-group-item  d-flex">
                                <i class="fas fa-certificate fa-2x me-2"></i>
                                <p class="fw-semibold">Certificate of Completion</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-around text-bg-dark">
                                <p style="font-size: 24px;font-weight:bold;"><?php echo $data['course']->price ?></p>
                            </li>
                        </ul>
                        <div class="d-grid mt-3">
                            <a href="javascript:void" class="btn btn-outline-primary">
                                Pay <?php echo $data['course']->price ?>
                            </a>
                        </div>
                        <p class="lead mt-4">Click <a href="<?php echo URLROOT; ?>/users/pay/promo">here</a> if you have a <strong>promo code</strong> to access course discount.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>