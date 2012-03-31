<div class="alert alert-block alert-info fade in <?php echo !empty($options['sticky']) ? $options['sticky'] : ''; ?>}">
	<?php if (isset($options['closeable'])) { ?><a class="close" data-dismiss="alert" href="#">×</a> <?php } ?>
	<?php echo $messages; ?>
</div>