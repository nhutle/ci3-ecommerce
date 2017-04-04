<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); } ?>

<html>
	<head>
		<?php $this->load->view('admin/head'); ?>
	</head>

	<body>
		<div id="left_content">
			<?php $this->load->view('admin/left'); ?>
		</div>
		<div id="rightSide">
			<?php $this->load->view('admin/header'); ?>

			<!-- main content -->
			<?php $this->load->view($temp, $this->data); ?>
			<!-- end main content -->

			<?php $this->load->view('admin/footer'); ?>
		</div>
		<div class="clear"></div>
	</body>
</html>