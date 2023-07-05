<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
<div class="container d-flex justify-content-between align-items-center">

<a class="navbar-brand text-success logo h2 align-self-center" href="<?=URLROOT?>/pages/index">
<?=SITENAME2?>
</a>

<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
<div class="flex-fill">
<ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
<?php if(isset($_SESSION['user_id'])) : ?>
<li class="nav-item">
<a class="nav-link" href="<?=URLROOT?>/pages">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?=URLROOT?>/posts/blog">Community</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?=URLROOT?>/users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
</li>
 <?php else : ?>
 <li class="nav-item">
<a class="nav-link" href="<?=URLROOT?>/pages">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?=URLROOT?>/users/login">Login</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?=URLROOT?>/users/register">Register</a>
</li>
<?php endif; ?>
</ul>
</div>
</div>

</div>
</nav>

<!-- Close Header -->

