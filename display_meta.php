<?php
if ( isset( $error ) && ( $error == 'Bad credentials' ) ) {
?>
  <?php _e('That login is incorrect.'); ?>

<?php
}
if ( isset( $user ) && ( $user instanceOf User ) ) {
?>
  <?php _e('Logged in as'); ?> <a href="<?php URL::out( 'admin', 'page=user&user=' . $user->username ) ?>" title="<?php _e('Edit Your Profile'); ?>"><?php echo $user->username; ?></a>.<br />
  <?php _e('Go to ') ?><a href="<?php URL::out('admin') ?>">Dashboard</a><br />
  <a href="<?php Site::out_url( 'habari' ); ?>/user/logout"><?php _e('Logout'); ?></a>?
<?php
}
else {
?>
	<?php Plugins::act( 'theme_loginform_before' ); ?>
     <form method="post" action="<?php URL::out( 'user', array( 'page' => 'login' ) ); ?>" id="loginform">
      <p>
       <label for="habari_username"><?php _e('Username:'); ?></label>
       <input type="text" size="15" name="habari_username" id="habari_username" />
      </p>
      <p>
       <label for="habari_password"><?php _e('Password :'); ?></label>
       <input type="password" size="15" name="habari_password" id="habari_password" />
      </p>
      <?php Plugins::act( 'theme_loginform_controls' ); ?>
      <p>
       <input type="submit" value="<?php _e('Sign in'); ?>" />
      </p>
     </form>
     <?php Plugins::act( 'theme_loginform_after' ); ?>
<?php
}
?>
