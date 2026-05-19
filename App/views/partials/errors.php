<?php if (!empty($errors)) : ?>
  <?php foreach ($errors as $error) : ?>
    <div class="bg-red-100 p-3 my-3 rounded">
      <?= $error ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>