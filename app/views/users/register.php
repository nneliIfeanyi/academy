<?php require APPROOT . '/views/inc/header.php'; ?>
		<div class="container w3-card-4 w3-margin">

			<div class="w3-container heading">
				<h1 class="w3-serif" style="color: #0a1b89;font-weight: bolder;">REGISTRATION FORM</h1>
			</div>

			<div class="w3-container">
				 	<p>Registration fee is &#8358;500<br>While tuition fee is &#8358;5000</p>
				 	<p style="font-weight: bold;"> Total payment is <span style="color: #0a1b89;">&#8358;5500</span></p>
				 	<p class="w3-opacity">Please kindly pay to the following account before filling this form<br>AccountDetails...8122321931...Nneli Ifeanyi Victor...PalmPay</p>
          <p>
            Resgistration closes on 29th july, 2023.
          </p>
          <p><?=flash('image_invalid')?></p>
			</div>
		
			<form action="<?= URLROOT ?>/users/register" method="POST" enctype="multipart/form-data">
				<div class="inputs w3-padding w3-border w3-margin">

					<div class=" w3-margin">
						<input type="text" name="f_name" class="w3-input" placeholder="First name" value="<?= $_POST['f_name'] ?>">
            <span class="w3-text-red"><?= $data['f_name_err'] ?></span>
					</div>

					<div class="contents w3-margin">
						<input type="text" name="m_name" class="w3-input" placeholder="Middle name" value="<?= $_POST['m_name'] ?>">
             <span class="w3-text-red"><?= $data['m_name_err'] ?></span>
					</div>				
	
					<div class="contents w3-margin">
						<input type="text" name="surname" class="w3-input" placeholder="Surname" value="<?= $_POST['surname'] ?>">
             <span class="w3-text-red"><?= $data['surname_err'] ?></span>
					</div>

					<div class="contents w3-margin w3-border-bottom">
						<input type="radio" name="sex" value="male"> male
						<input type="radio" name="sex" value="female"> female
             <span class="w3-text-red"><?= $data['sex_err'] ?></span>
					</div>	
	
					<div class="contents w3-margin">
						<input type="number" name="phone" class="w3-input" placeholder="Phone number" value="<?= $data['phone'] ?>">
             <span class="w3-text-red"><?= $data['phone_err'] ?></span>
					</div>
					<!--<div class="contents w3-margin">
						<label class="w3-small">Screenshot of payment reciept of &#8358;500</label><br>
						<input type="file" name="reciept" class="w3-input">
             <span class="w3-small w3-text-red"><?= $data['reciept_err'] ?></span>
					</div>-->
					<div class="contents w3-margin">
						<label class="w3-small">Profile Pic</label><br>
						<img src="<?= URLROOT ?>/img/avatar_boy.png" height="80" width="80">
						<input type="file" name="profile_pic" class="w3-input">
             <span class="w3-text-red"><?= $data['profile_pic_err']; ?></span>
					</div>

					<div class="w3-margin w3-sans-serif">
						<input type="submit" name="submit" value="SUBMIT" class="w3-btn w3-padding-large w3-round w3-text-white" style="background-color: #0a1b89;">
						<a href="<?= URLROOT ?>/pages" class="btn btn-light w3-padding">Go Back</a>
					</div>


				</div>
			</form>
		</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
