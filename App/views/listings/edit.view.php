<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('topBanner'); ?>

<section class="flex justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg mt-8">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Job Listing</h2>

    <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

    <form method="POST" action="/listings/<?= $listing->id ?>">
      <input type="hidden" name="_method" value="PUT">

      <!-- Job Info -->
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Job Info</h2>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Job Title</label>
        <input type="text" name="title"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->title ?? '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Job Description</label>
        <textarea name="description" class="border rounded w-full py-2 px-3" rows="4"
        ><?= $listing->description ?? '' ?></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Annual Salary</label>
        <input type="number" name="salary"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->salary ?? '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Requirements</label>
        <textarea name="requirements" class="border rounded w-full py-2 px-3" rows="3"
        ><?= $listing->requirements ?? '' ?></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Benefits</label>
        <textarea name="benefits" class="border rounded w-full py-2 px-3" rows="3"
        ><?= $listing->benefits ?? '' ?></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Tags (comma separated)</label>
        <input type="text" name="tags"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->tags ?? '' ?>" />
      </div>

      <!-- Company Info -->
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Company Info</h2>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Company Name</label>
        <input type="text" name="company"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->company ?? '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Address</label>
        <input type="text" name="address"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->address ?? '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">City</label>
        <input type="text" name="city"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->city ?? '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">State</label>
        <input type="text" name="state"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->state ?? '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Phone</label>
        <input type="text" name="phone"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->phone ?? '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Email</label>
        <input type="email" name="email"
          class="border rounded w-full py-2 px-3"
          value="<?= $listing->email ?? '' ?>" />
      </div>

      <div>
        <button type="submit"
          class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
          Save Changes
        </button>
        <a href="/listings/<?= $listing->id ?>"
          class="block text-center text-gray-500 mt-4">
          Cancel
        </a>
      </div>
    </form>
  </div>
</section>

<?php loadPartial('footer'); ?>