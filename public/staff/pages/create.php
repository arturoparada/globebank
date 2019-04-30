<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  // Handle form values sent by new.php

  $pages = [];
  $pages ['menu_name'] = $_POST['menu_name'] ?? '';
  $pages ['position'] = $_POST['position'] ?? '';
  $pages ['visible'] = $_POST['visible'] ?? '';

  $result = insert_pages($pages);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));

} else {
  redirect_to(url_for('/staff/pages/new.php'));
}

?>
