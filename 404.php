<?php $theme->display('header'); ?>
<div id="page">
  <!-- sidebar  -->
  <div id="sidebar">
    <!-- darkbox -->
    <div id="darkbox">
      <div id="darkbox-header"></div>
      <div id="darkbox-body">
        <?php include('darkbox.php') ?>
      </div>
      <div id="darkbox-footer"></div>
    </div>

    <!-- lightbox -->
    <div id="lightbox">
      <div id="lightbox-header"></div>
      <div id="lightbox-body">
        <?php include('lightbox.php') ?>
      </div>
      <div id="lightbox-footer"></div>
    </div>							
  </div>
  <!-- end sidebar -->
  
  <h1>Sorry, page not found!</h1>
  <p>Please look around though :)</p>
  <p>Did you tried the search form on the right ?</p>
</div> <!-- end page --> 
<?php $theme->display('footer'); ?>
