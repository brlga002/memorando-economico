<?php foreach ($alert->getAlert() as $message): ?>
	<div class="col-sm-12">
		<div class="sufee-alert alert with-close alert-<?= $message["type"]; ?> alert-dismissible fade show" role="alert">
		<?= $message["text"]; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
	</div>
<?php endforeach ?>