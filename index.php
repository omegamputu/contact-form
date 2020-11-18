<?php include 'partials/header.php'; ?>

<main role="main" class="container">
	<div class="row">
		<div class="col-md-5">
			<h2 class="mb-4">Formulaire de contact</h2>

			<?php if(array_key_exists('errors', $_SESSION)):  ?>
				<div class="alert alert-danger">
					<?= implode('<br>', $_SESSION['errors']); ?>
				</div>
			<?php unset($_SESSION['errors']); endif;  ?>
			<?php if(array_key_exists('success', $_SESSION)):  ?>
				<div class="alert alert-success">
					<?= $_SESSION['success']; ?>
				</div>
			<?php unset($_SESSION['success']); endif;  ?>
			<form action="traitement.php" method="post" role="form">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="name">Votre nom complet</label>
						<input type="text" id="name" name="name" class="form-control" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email Adress</label>
						<input type="email" id="email" name="email" class="form-control" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea id="message" name="message" class="form-control" rows="3"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?>
					</textarea>
				</div>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</form>
		</div>
	</div>
</main>

<?php include 'partials/footer.php' ?>