<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/apply/navbar.php'; ?>

<div class="row">
    <div class="col-lg-6 col-md-9 mx-auto">
        <div class="card card-body bg-light my-5 py-5">
            <h2 class="text-center text-primary">Application Form</h2>
            <p class="text-center text-muted">Your application is your first step to your new future. Get started now.</p>
            <hr />
            <form id="enroll">
                <div class="form-group mb-2">
                    <label>Surname</label>
                    <input type="text" name="surname" required class="form-control form-control-lg">
                </div>
                <div class="form-group mb-2">
                    <label>Others Name</label>
                    <input type="text" name="othername" required class="form-control form-control-lg">
                </div>
                <div class="form-group mb-2">
                    <label>Email Address</label>
                    <input type="email" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" class="form-control form-control-lg">
                </div>
                <div class="form-group mb-3">
                    <label>Whatsapp number</label>
                    <input type="number" name="mobile" required required data-parsley-type='number' maxlength="11" data-parsley-length="[11, 11]" data-parsley-trigger="keyup" pattern="\d{11}" class=" form-control form-control-lg">
                </div>
                <div class="form-group mb-4">
                    <label>Which course are you interested in?</label>
                    <select class="form-control form-control-lg" name="course" required>
                        <option value="">Select course</option>
                        <?php foreach ($data['courses'] as $course) : ?>
                            <option value="<?php echo $course->id . ',' . $course->title; ?>"><?php echo $course->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>Password</label>
                    <input type="password" required name="password" class="form-control form-control-lg">
                </div>
                <p style="font-size: small;">By providing your information you consent to recieve occational promotion offers and education opportunities by phone, text message or email from <strong>Stanvic Academy</strong>.</p>
                <div class="d-grid">
                    <input type="submit" id="submit" class="btn btn-primary" value="Register Now">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
    //var enrollForm = document.querySelector('#enroll');
    $('#enroll').parsley();
    $('#enroll').on('submit', function(event) {
        event.preventDefault();
        if ($('#enroll').parsley().isValid()) {
            $.ajax({
                url: "<?php echo URLROOT; ?>/apply/index/<?php echo $data['param']; ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Processing, pls wait ....');

                },
                success: function(data) {
                    //enrollForm.reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Register Now');
                    $('#success-msg').html(data);
                }
            })
        }

    })
</script>