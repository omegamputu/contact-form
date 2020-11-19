<?php 
include '_inc.php';
include 'partials/header.php'; 
?>

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
			<?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>
			<form action="traitement.php" method="post" role="form">
				<?= $form->text('name', 'Votre nom complet'); ?>
				<?= $form->email('email', 'Votre adresse email'); ?>
				<?= $form->select('objet', 'Objet', ["Demande d'informations", "Dépanage"]); ?>
				<?= $form->textarea('message', 'Votre message'); ?>
				<?= $form->csrfInput(); ?>
				<?= $form->submit('submit', 'Envoyer'); ?>
			</form>
		</div>
	</div>
</main>

<?php include 'partials/footer.php' ?>