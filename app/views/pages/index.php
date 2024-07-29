<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<!-- Header -->
<header class="header py-7 vh-100">
  <div class="container">
    <div class="row mb-5 text-center">
      <div class="col-12 text-container">
        <h1 class="display-3 text-white mt-3">
          <?php echo $data['core']->showcaseh1; ?>
        </h1>
        <p class="lead text-white w-75 m-auto mb-4">
          <?php echo $data['core']->showcasep; ?>
        </p>
        <a href="#enroll" class="btn btn-primary text-uppercase">
          Join us &nbsp;<i class="fa fa-chevron-down"></i>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <!-- Image Slider -->
        <div id="slider" class="carousel slide" data-bs-ride="">
          <div class="carousel-inner rounded-5">
            <div class="carousel-item active d-block d-md-none">
              <img src="<?php echo URLROOT; ?>/images/coder.png.webp" alt="" height="280" class="d-block w-100 rounded-5" />
            </div>
            <div class="carousel-item active d-none d-md-block">
              <img src="<?php echo URLROOT; ?>/images/coder.png.webp" alt="" height="500" class="d-block w-100 rounded-5" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Register -->
<section class="register bg-primary py-4  overflow-hidden">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2>Join us today, Enroll for an affordable tech program to help you build skills fast</h2>
        <p>
          Our wide range of training and seminar sections are designed to
          empower you with valuable knowledge and skills.
        </p>

        <ul class="list-unstyled vstack gap-3">
          <li>
            <i class="fas fa-square"></i>
            <strong>Gain Expertise:</strong> Our course contents provide in-depth
            insights and practical tips to enhance your expertise in various
            domains.
          </li>
          <li>
            <i class="fas fa-square"></i>
            <strong>Stay Updated:</strong> Stay up-to-date with the latest
            industry trends and advancements through our informative and
            up-to-date videos.
          </li>
          <li>
            <i class="fas fa-square"></i>
            <strong>Expand Your Network:</strong> Connect with like-minded
            individuals and industry experts, fostering new connections and
            opportunities.
          </li>
          <li>
            <i class="fas fa-square"></i>
            <strong>Affordality:</strong> We are committed in keeping our price to the minimum
            even as we are open to installmental payment strategy.
          </li>
        </ul>
      </div>
      <div class="col-lg-6 p-4">
        <form action="<?php echo URLROOT; ?>/users/register" method="POST" id="enroll">
          <div class="my-4">
            <input type="text" name="name" class="form-control form-control-lg rounded-0 border-0" placeholder="Enter name" required data-parsley-trigger="keyup" />
          </div>
          <div class="my-4">
            <input type="email" name="email" class="form-control form-control-lg rounded-0 border-0" placeholder="Enter email" required data-parsley-type="email" data-parsley-trigger="keyup" />
          </div>
          <div class="my-4">
            <input type="tel" name="mobile" class="form-control form-control-lg rounded-0 border-0" placeholder="Whatsapp number" required data-parsley-type='number' maxlength="11" data-parsley-length="[11, 11]" data-parsley-trigger="keyup" pattern="\d{11}" />
          </div>
          <div class="my-4">
            <select class="form-control form-control-lg rounded-0 border-0" name="course" required>
              <option value="">Select course</option>
              <?php foreach ($data['courses'] as $course) : ?>
                <option value="<?php echo $course->title; ?>"><?php echo $course->title; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" value="" name="terms" />
            <label for="terms" class="form-check-label">
              I agree to the terms and conditions
            </label>
          </div> -->
          <div class="d-grid mt-4">
            <button class="btn btn-outline-dark">Register &nbsp;<i class="fa fa-chevron-right"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section id="about" class="summary bg-light mt-5 w-75 m-auto">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center mt-5">Why Choose Us</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="bg-white p-4">
          <ul class="list-unstyled">
            <?php $i = 1;
            foreach ($data['whyus'] as $whychooseus) : ?>
              <li class="pb-3">
                <h5><?php echo $i . '.' . ' ' . $whychooseus->title; ?></h5>
                <p>
                  <?php echo $whychooseus->info; ?>
                </p>
              </li>
            <?php $i++;
            endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Invitation OR Event-->
<section class="invitation mb-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="invitation-bg text-center py-6 rounded-5">
          <div class="text-white w-75 m-auto">
            <h2 class="display-5 fw-bold">Next Resumption</h2>
            <p>
              We cordially invite you to enroll for the <strong style="font-size: large;"><?php echo $data['core']->sessiontag; ?></strong>
              training session to kickstart
              <strong style="font-size: large;"><?php echo $data['core']->nextresumedate; ?></strong> through <strong style="font-size: large;"><?php echo $data['core']->enddate; ?></strong>. It will be an
              engaging session where you can gain valuable practical knowledge about the latest trend in the tech industry.
              Don't miss out on this opportunity to enhance your life and
              broaden your horizons. Join us and be a part of this enriching
              experience!
            </p>
            <a href="#enroll" class="btn btn-primary btn-lg">
              Register Now &nbsp;<i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Takeaways -->
<section id="courses" class="takeaways my-5 bg-light">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col-md-8 offset-md-2">
        <h2>Key Takeaways</h2>
        <p class="lead">
          An overview of our courses
        </p>
      </div>
    </div>

    <!-- Row 1 -->
    <div class="row">
      <?php foreach ($data['courses'] as $course) : ?>
        <div class="col-md-4">
          <div class="card mb-4 rounded-0 border-0 p-3">
            <div class="card-body text-center">
              <i class="<?php echo $course->icon; ?> fa-5x text-primary bg-light rounded-circle p-3 my-4"></i>
              <h5 class="card-title"><?php echo $course->title ?></h5>
              <p class="card-text">
                <?php echo $course->dsc ?>
              </p>
              <ul class="list-group">
                <li class="list-group-item  d-flex gap-3">
                  <i class="fas fa-clock" style="font-size: 20px;"></i>
                  <p class="fw-semibold"><?php echo $course->duration ?></p>
                </li>
                <li class="list-group-item  d-flex gap-2">
                  <i class="fas fa-map-marker" style="font-size: 20px;"></i>
                  <p class="fw-semibold" style="font-size: 13px;"><?php echo $course->venue ?></p>
                </li>
                <li class="list-group-item  text-center text-bg-dark">
                  <p style="font-size: 28px; font-weight:bolder"><i class="fas fa-naira"></i><?php echo $course->price ?></p>
                </li>
              </ul>
              <div class="d-grid">
                <a href="#" class="btn btn-primary mt-3">Reserve a seat &nbsp;<i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Question Form -->
<section id="contact" class="subscribe my-5">
  <div class="container py-3">
    <div class="row">
      <div class="col-md-6 offset-md-3 text-center">
        <h2>
          Got Questions <strong style="font-size: large;">?</strong>
          <strong style="font-size: larger;">?</strong>
          <strong style="font-size: xx-large;">?</strong>
        </h2>
        <form>
          <div class="my-4">
            <input class="form-control form-control-lg" placeholder="Send us a message" />
            <div class="form-text">
              Your inquiries are welcomed
            </div>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary"> <i class="fa fa-paper-plane"></i> Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<footer class="footer mt-4 text-bg-dark py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>Next Resumption</h5>
        <ul class="list-unstyled">
          <li class="list-group-item  d-flex gap-3">
            <a href="javascript:void()"><i class="fa fa-chart-bar"></i></a>
            <p style="font-size: 12px;"><?php echo $data['core']->nextresumedate; ?></p>
          </li>
          <li class="list-group-item  d-flex gap-3">
            <a href="javascript:void()"><i class="fas fa-clock"></i></a>
            <p style="font-size: 12px;">10:00 AM Daily</p>
          </li>
          <li class="list-group-item  d-flex gap-3">
            <a href="javascript:void()"> <i class="fas fa-map-marker"></i></a>
            <p style="font-size: 12px;">Model commercial college<br>beside union bank Suleja</p>
          </li>
          <li class="list-group-item  d-flex gap-3">
            <a href=""><i class="fab fa-whatsapp"></i></a>
            <p style="font-size: 12px;">081224444448</p>
          </li>
          <li class="list-group-item  d-flex gap-3">
            <a href="tel:2348122321931"><i class="fas fa-phone"></i></a>
            <p style="font-size: 12px;">08122321931</p>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#courses">Courses</a></li>
          <li><a href="#enroll">Enroll</a></li>
          <li><a href="#contact">Contact us</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Connect</h5>
        <div class="d-flex gap-3">
          <a href="#"><i class="fab fa-facebook fa-3x text-white"></i></a>
          <a href="#"><i class="fab fa-twitter fa-3x text-white"></i></a>
          <!-- <a href="#"><i class="fab fa-linkedin fa-3x text-white"></i></a>
          <a href="#"><i class="fab fa-instagram fa-3x text-white"></i></a>
          <a href="#"><i class="fab fa-youtube fa-3x text-white"></i></a> -->
        </div>
      </div>
    </div>

  </div>
</footer>
<div class="text-bg-dark text-center p-2">
  <p>&copy; <?php echo date('Y'); ?> Stanvic Concepts</p>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
  $('#enroll').parsley();
</script>