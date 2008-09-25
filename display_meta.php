<ul class="no-list-style margin-l10">
<?php if(!$user) { ?>
  <li><a href="user/login">Log in</a></li>
<?php } else { ?>
  <li><strong>Welcome back <?php echo $user->username ?>!</strong>
    <a href="user/logout">Logout.</a>
  </li>
<?php } ?>
</uL>