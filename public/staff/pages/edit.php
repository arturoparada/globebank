<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    // Handle form values sent by new.php

    $pages = [];
    $pages ['id'] = $id;
    $pages ['menu_name'] = $_POST['menu_name'] ?? '';
    $pages ['position'] = $_POST['position'] ?? '';
    $pages ['visible'] = $_POST['visible'] ?? '';

  $result = update_pages($pages);
  redirect_to(url_for('/staff/pages/show.php?id=' . $id));

  } else {

     $pages = find_pages_by_id($id);

     $pages_set = find_all_pages();
     $pages_count = mysqli_num_rows($pages_set);
     mysqli_free_result($pages_set);

     }

  ?>
<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h1>Edit Page</h1>

    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($pages['menu_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
            for ($i=0; $i < $pages_count ; $i++) {
              echo "<option value = \"{$i}\"";
              if ($pages["position"] == $i) {
                echo "selected";
              }
              echo "> {$i}</option>";
            }
             ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if($pages['visible'] == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
