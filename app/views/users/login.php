<?php require APPROOT . '/views/inc/header.php'; ?>

 <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mx-auto">
          <div class="form_container">
            <div class="heading_container">
               <p><?=flash('register_success')?></p>
              <h2>
                Login to your account
              </h2>
              <div class="ml-5">
              <?php if (!empty($data['user_name_err'])):?>
                  <span class="w3-text-red"><?= $data['user_name_err'] ?></span>
             
              <?php elseif (!empty($data['password_err'])):?>
                  <span class="w3-text-red"><?= $data['password_err'] ?></span>
              <?php endif ;?>
            </div>
            </div>
            <form action="<?= URLROOT ?>/users/login" method="POST">
              <div>
                <label>Enter your middle name</label>
                <input type="text" name="m_name"  />
              </div>

              <div>
                <label>Password is your phone number</label>
                <input type="number" name="phone"  />
                
              </div>
             
              <div class="d-flex ">
                <button>
                 Login
                </button>
              </div>
             <a href="<?=URLROOT?>/users/register" class="btn text-white mt-4" style="background-color: #0a1b89;">
              Register Instead
            </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
