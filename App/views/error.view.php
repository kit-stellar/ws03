<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="flex justify-center items-center mt-20">
  <div class="bg-white p-10 rounded shadow text-center">
    <h1 class="text-6xl font-bold text-red-500"><?= $status ?></h1>
    <p class="text-2xl mt-4"><?= $message ?></p>
    <a href="/" class="mt-6 inline-block bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 mr-3">
      Go Back Home
    </a>
    <a href="/listings" class="mt-6 inline-block text-indigo-600 underline block">
      Go back to listings
    </a>
  </div>
</section>

<?php loadPartial('footer'); ?>