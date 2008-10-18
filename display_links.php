<ul class="no-list-style">
  <?php
    if($theme->links_list) {
      foreach($theme->links_list as $link_text => $link) {
        echo "<li><a href=\"".$link."\" title=\"$link_text\">".$link_text."</a></li>";
      }
    } else {
      ?>
      Please define your links list in theme.php.
      <?php
    }
  ?>
</ul>