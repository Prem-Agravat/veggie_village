<?php require('layout/header.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
						
<?php
if (isset($_SESSION['msg'])) {
	echo '<div class="section white-text" style="background-color: #155724;color:white;border-radius:10px;">'.$_SESSION['msg'].'</div>';
	unset($_SESSION['msg']);
}
?>

<div class="content">

	<h4 style="padding-top:35px;">Dashboard</h4>
	
	<div class="row" style="padding:60px;">
		<div class="col s12">

			<a class="dash-btn" href="food-list.php"><div class="sec">Foods</div></a>
			<a class="dash-btn" href="category-list.php"><div class="sec">Categories</div></a>
			<a class="dash-btn" href="order-list.php"><div class="sec">Orders</div></a>

		</div>

	</div>

</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>