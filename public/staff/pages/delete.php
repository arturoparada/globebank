<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
	redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

	$result = delete_page($id);
	redirect_to(url_for('/staff/pages/index.php'));

} else {
  $page = find_pages_by_id($id);
}

 ?>

<?php $page_title = 'Delete Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Delete Page</h1>
	<form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($id))); ?>" method="post">

	<div class="page show">

	<h2>Are you sure you want to delete this page?</h2>
	<?php echo h($page['menu_name']); ?>

	</div>

      <div id="operations">
        <input type="submit" value="Delete Page" />
      </div>
</form>
  </div>
  </div>



<?php include(SHARED_PATH . '/staff_footer.php'); ?>
