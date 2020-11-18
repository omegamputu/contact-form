<?php include 'partials/header.php'; ?>

<main role="main" class="container">
	<div class="row">
		<div class="col-md-5">
			<h2 class="mb-4">Formulaire de contact</h2>
			<form action="traitement.php" method="post" role="form">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="name">Votre nom complet</label>
						<input type="text" id="name" name="name" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email Adress</label>
						<input type="email" id="email" name="email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea id="message" name="message" class="form-control" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</form>
		</div>
	</div>
</main>

<?php include 'partials/footer.php' ?>