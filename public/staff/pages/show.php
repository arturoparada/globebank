<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$pages = find_pages_by_id($id);

?>

<?php $page_title = 'Show Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="pages show">

    <h1>pages:<?php echo h($pages['menu_name']); ?></h1>

    <div class="attributes">
      <dl>
  			<dt>Menu name</dt>
  			<dd><?php echo h($pages['menu_name']);?></dd>
  		</dl>
  		<dl>
  			<dt>Position</dt>
  			<dd><?php echo h($pages['position']);?></dd>
  		</dl>
  		<dl>
  			<dt>Visible</dt>
  			<dd><?php echo h($pages['visible'] == '1' ? 'true' : 'false');?></dd>
  		</dl>
  	</div>
  </div>
