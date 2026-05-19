<?php
    use Framework\Authorization;

    loadPartial('head');
    loadPartial('navbar');
    loadPartial('topBanner');
?>

<section>
  <div class="container mx-auto p-4 mt-4">

    <?php loadPartial('message'); ?>

    <div class="bg-white rounded-lg shadow-md p-8">
      <h2 class="text-3xl font-bold mb-4"><?= $listing->title ?></h2>
      <p class="text-gray-700 text-lg mb-4"><?= $listing->description ?></p>

      <ul class="my-4 bg-gray-100 p-8 rounded">
        <li class="mb-2">
          <strong>Salary:</strong> <?= formatSalary($listing->salary) ?>
        </li>
        <li class="mb-2">
          <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
        </li>
        <?php if (!empty($listing->tags)) : ?>
        <li class="mb-2">
          <strong>Tags:</strong> <?= $listing->tags ?>
        </li>
        <?php endif; ?>
        <?php if (!empty($listing->requirements)) : ?>
        <li class="mb-2">
          <strong>Requirements:</strong> <?= $listing->requirements ?>
        </li>
        <?php endif; ?>
        <?php if (!empty($listing->benefits)) : ?>
        <li class="mb-2">
          <strong>Benefits:</strong> <?= $listing->benefits ?>
        </li>
        <?php endif; ?>
        <?php if (!empty($listing->email)) : ?>
        <li class="mb-2">
          <strong>Email:</strong>
          <a href="mailto:<?= $listing->email ?>"><?= $listing->email ?></a>
        </li>
        <?php endif; ?>
        <?php if (!empty($listing->phone)) : ?>
        <li class="mb-2">
          <strong>Phone:</strong> <?= $listing->phone ?>
        </li>
        <?php endif; ?>
      </ul>

      <div class="flex gap-4 mt-4">
        <a href="/listings"
          class="px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
          Back to Listings
        </a>

        <?php if (Authorization::isOwner($listing->user_id)) : ?>
          <a href="/listings/edit/<?= $listing->id ?>"
            class="px-5 py-2.5 shadow-sm rounded border text-base font-medium text-white bg-yellow-500 hover:bg-yellow-600">
            Edit
          </a>

          <form method="POST" action="/listings/<?= $listing->id ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit"
              class="px-5 py-2.5 shadow-sm rounded border text-base font-medium text-white bg-red-500 hover:bg-red-600"
              onclick="return confirm('Are you sure you want to delete this listing?')">
              Delete
            </button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>