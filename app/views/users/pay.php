<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-7 mx-auto">
                <h1 class="h4 p-4 text-center">Enter Promo Code</h1>
                <form id="promo">
                    <input type="text" required name="code" class="form-control">
                    <div class="d-grid my-3">
                        <input type="submit" id="submit" class="btn btn-outline-dark">
                    </div>
                </form>
                <p class="fs-6 text-center"><a href="<?php echo $data['course']->paylink; ?>">I don't have a promo code</a></p>
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
                                <p style="font-size: 24px;"><?php echo $data['course']->discount ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    $('#promo').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo URLROOT; ?>/users/pay/promo",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#submit').attr('disabled', 'disabled');
                $('#submit').val('Processing, pls wait ....');

            },
            success: function(data) {
                $('#submit').attr('disabled', false);
                $('#submit').val('Submit');
                $('#success-msg').html(data);
            }
        });
    })
</script>