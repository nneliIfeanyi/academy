<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
.cssmarquee {
height: 50px;
overflow: hidden;
position: relative;
}
.cssmarquee h1 {
font-size: 1em;
position: absolute;
width: 100%;
height: 100%;
margin: 0;
line-height: 50px;
text-align: center;
transform:translateX(100%);
animation: cssmarquee 12s linear infinite;
}
@keyframes cssmarquee {
0% {
transform: translateX(100%);
}
100% {
transform: translateX(-100%);
}
}
</style>

    <!-- slider section -->
    <section class="slider_section position-relative">
      <div class="box">
        <div class="detail-box">
          <a class="navbar-brand" href="<?=URLROOT?>/pages">
            <span>
              <?=SITENAME?>
            </span>
          </a>
          <div class="carousel slide slider_text_carousel" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="heading_box">
                  <h1>
                    <span>
                     30 Days
                    </span>
                    <span>
                      Web
                    </span>
                    <span>
                     Development
                    </span>
                    <span>
                     Boot
                    </span>
                    <span>
                      Camp
                    </span>
                  </h1>
                </div>
              </div>
              <div class="carousel-item">
                <div class="heading_box">
                  <h1>
                    <span>
                      Happening
                    </span>
                    <span>
                      This
                    </span>
                    <span>
                      August
                    </span>
                    <span>
                     
                    </span>
                    <span>
                    
                    </span>
                  </h1>
                </div>
              </div>
              <div class="carousel-item">
                <div class="heading_box">
                  <h1>
                    <span>For</span>
                    <span>&#8358;5500</span>
                    <span> Only...</span>
                    <span style="font-size: 14px;">60% discount</span>
                    <span style="text-decoration: line-through;color: red;">&#8358;12000</span>
                  </h1>
                </div>
              </div>
            </div>
          </div>

          <div class="btn-box">
            <a class="btn-2">
             <span class="fw-bold">@</span> &#8358;5500 <span class="fs-6"> only</span>
            </a>
            <a href="<?=URLROOT?>/users/register" class="btn-1">
              Register Now
            </a>
            
            
          </div>
        </div>
        <div class="img-box">
          <div class="carousel slide slider_image_carousel carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?=URLROOT?>/img/webdesign.jpeg" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?=URLROOT?>/img/showcases.jpeg" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?=URLROOT?>/img/software1.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- feature section -->

  <section class="feature_section ">
    <div class="container-fluid service_container">
      <div class="row">
        <div class="col-3 col-lg-3 col-sm-6">
          <div class="box">
            <div class="number_box">
              <h5>
                01
              </h5>
            </div>
            <h4>
              Html
            </h4>
          </div>
        </div>
        <div class="col-3 col-lg-3 col-sm-6">
          <div class="box">
            <div class="number_box">
              <h5>
                02
              </h5>
            </div>
            <h4>
              CSS
            </h4>
          </div>
        </div>
        <div class="col-3 col-lg-3 col-sm-6">
          <div class="box">
            <div class="number_box">
              <h5>
                03
              </h5>
            </div>
            <h4>
            JS
            </h4>
          </div>
        </div>
        <div class="col-3 col-lg-3 col-sm-6">
          <div class="box">
            <div class="number_box">
              <h5>
                04
              </h5>
            </div>
            <h4>
              PHP
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end feature section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Learn To Code
              </h2>
            </div>
            <p>
              You can't afford to miss this life changing opportunity, get yourself equipped and enrich your future with the most relevant skill of our time<span style="color: #0a1b89;"> (WEB DEVELOPMENT)</span>. A step you will never regret taking throughout your life time.
            </p>
            <a href="<?=URLROOT?>/users/register">
              Register Now
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <div class="stripe_design sd1"></div>
            <div class="stripe_design sd2"></div>
            <div class="stripe_design sd3"></div>
            <div class="stripe_design sd4"></div>
            <div class="stripe_design sd5"></div>
            <div class="stripe_design sd6"></div>
            <img src="<?=URLROOT?>/img/capture.png" alt="coding-sample image" height="270px" />
          </div>
          <div class="cssmarquee">
            <h1><pre><b>Coding   is   Fun</b></pre></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

    <div class="container">
       <div class="heading_container py-3">
          <h2>
            Get Familiar With
          </h2>

        </div>
        <div class="row">

           <div class="col-3 col-md-3 px-6">
            <img src="<?= URLROOT;?>/img/html2.png" height="80" width="80" class="">
            <h4 class="py-2 h6 fw-bold">
              &nbsp;&nbsp;&nbsp;&nbsp;HTML5
            </h4>
           </div>

           <div class="col-3 col-md-3">
            <img src="<?= URLROOT;?>/img/css.jpeg" height="80" width="80" class="">
            <h4 class="py-2 h6 fw-bold">
              &nbsp;&nbsp;&nbsp;&nbsp;CSS3
            </h4>
           </div>

           <div class="col-3 col-md-3">
            <img src="<?= URLROOT;?>/img/js.png" height="80" width="80" class="">
            <h4 class="py-2 h6 fw-bold">
              JAVASCRIPT
            </h4>
           </div>

           <div class="col-3 col-md-3">
            <img src="<?= URLROOT;?>/img/php.jpg" height="80" width="80" class="">
            <h4 class="py-2 h6 fw-bold">
              &nbsp;&nbsp;&nbsp;&nbsp;PHP
            </h4>
           </div>
        </div>
           <div class="lead mt-4">And build websites of your own</div>
          <div class="lead">Master the basis, Proceed to advance</div>
           <div class="lead mb-4">Grow from no stack to full stack web developer</div>

            <a href="<?=URLROOT?>/users/register" class="btn text-white mb-4" style="background-color: #0a1b89;">
              Register Now
            </a>
            
      </div>

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h4>
              Learning Center
            </h4>
            <div class="contact_link_box">
              <a>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                 Model Commercial College Field Base Suleja
                </span>
              </a>
              <a href="tel:08122321931">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call 08122321931
                </span>
              </a>
              <a href="tel:08153054060">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call 08153054060
                </span>
              </a>
              <a href="mailto:webacademy4@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  stanvicbest@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>Registration fee is &#8358;500</p>
            <p>While tuition fee is &#8358;5000</p>
            <p>
              Resgistration closes on 29th july, 2023.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


<?php require APPROOT . '/views/inc/footer.php'; ?>