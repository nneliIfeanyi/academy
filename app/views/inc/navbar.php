 <div class="sticky-top">
   <div class="alert alert-info alert-dismissible fade show" style="position: relative;">
     <i class="fa fa-info-circle"></i>&nbsp;More than 20% discount on all courses valid till &nbsp;<span class="fw-bold bg-dark badge text-primary" id="countDown"></span>
     <button class="close" data-bs-dismiss="alert" style="position: absolute; right: 0; top:0;border:none"><i class="fa fa-times"></i></button>
   </div>
 </div>
 <nav class="navbar navbar-expand-lg text-bg-dark navbar-dark" style="margin-top: -13px;">
   <div class="container">
     <a href="<?php echo URLROOT; ?>/pages" class="navbar-brand fw-bold">
       <?php echo SITENAME; ?>
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <ul class="navbar-nav ms-auto">
         <li class="nav-item">
           <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/pages/welcome#home">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="<?php echo URLROOT; ?>/pages/welcome#about">About</a>
         </li>

         <li class="nav-item">
           <a class="nav-link" href="<?php echo URLROOT; ?>/pages/welcome#courses">Courses</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="<?php echo URLROOT; ?>/users/register/1">Enroll</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="<?php echo URLROOT; ?>/pages/welcome#contact">Contact</a>
         </li>
       </ul>
       <span class="nav-item">
         <span class="fa-stack">
           <a href="#">
             <i class="fas fa-circle fa-stack-2x"></i>
             <i class="fab fa-facebook-f fa-stack-1x text-white"></i>
           </a>
         </span>
       </span>
       <span class="nav-item">
         <span class="fa-stack">
           <a href="#">
             <i class="fas fa-circle fa-stack-2x"></i>
             <i class="fab fa-twitter fa-stack-1x text-white"></i>
           </a>
         </span>
       </span>
     </div>
   </div>
 </nav>