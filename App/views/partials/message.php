<?php
    use Framework\Session;

    $successMessage = Session::getFlashMessage('success_message');
    $errorMessage = Session::getFlashMessage('error_message');
?>

<?php if ($successMessage) : ?>
  <div class="bg-green-100 p-3 m-3 rounded">
    <?= $successMessage ?>
  </div>
<?php endif; ?>

<?php if ($errorMessage) : ?>
  <div class="bg-red-100 p-3 m-3 rounded">
    <?= $errorMessage ?>
  </div>
<?php endif; ?>