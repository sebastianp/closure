<?php
if (Plugins::is_loaded('RN Monthly Archives')) {
  // RN Monthly Archives Plugin required
  $theme->monthly_archives($theme->rn_archives_months);
} else {
  ?>
  Please install/activate the RN Archives Plugins. Thanx.
  <?php
}
?>