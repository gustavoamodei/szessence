
<?php if (! empty($errors)) : ?>
	<div class="row align-self-center d-flex justify-content-center  mt-1 ">
		<div class="alert alert-danger col-11 col-md-6  " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
			<div class="errors" role="alert">
				<ul>
				<?php foreach ($errors as $error) : ?>
					<li><?= esc($error) ?></li>
				<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
<?php endif ?>
