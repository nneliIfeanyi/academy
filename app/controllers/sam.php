<?php require APPROOT . '/views/inc/header.php'; ?>
<style type="text/css">
  .contact_section a {
    border: none;
    display: inline-block;
    background-color: #f7941d;
    color: #ffffff;
    padding: 12px 35px;
    border-radius: 0;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    border: none;
    font-size: 15px;
    color: #fff;
    margin-top: 7px;
    font-weight: 600;
}
</style>
<section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mx-auto">
            <div class="heading_container">
               <p><?=flash('register_success')?></p>
              <h2>
               Your Registration is Pending
              </h2>
               <p class="w3-opacity">Please kindly upload a screenshoot of the reciept of your payment of <span style="color: #0a1b89;">&#8358;5500</span> to<br>AccountDetails...8122321931...Nneli Ifeanyi Victor...PalmPay</p>
              <p><?=flash('login_msg')?></p>
            </div>
            
              <div class="row">
                <div class="col-md-6">
                  <a href="https://wa.me/8122321931?text=I%20just%20paid%20now%20here%20is%20my%20reciept" class="btn">
                  <i class="fa fa-whatsapp fa-fw"></i> Upload on WhatsApp
                  </a>
                </div>

                <div class="col-md-6">
                <a href="<?= URLROOT;?>/posts" class="btn" style="background-color: #0a1b89;">
                Proceed
                </a>
                </div>
              </div>
      </div>
    </div>
  </section> 

  <?php require APPROOT . '/views/inc/footer.php'; ?>