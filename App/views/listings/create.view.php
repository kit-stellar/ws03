<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('topBanner'); ?>

<section class="flex justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg mt-8">
    <h2 class="text-4xl text-center font-bold mb-4">Create Job Listing</h2>

    <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

    <form method="POST" action="/listings">
      <!-- Job Info -->
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
        Job Info
      </h2>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Job Title</label>
        <input
          type="text"
          name="title"
          placeholder="Software Engineer"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->title ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Job Description</label>
        <textarea
          name="description"
          class="border rounded w-full py-2 px-3"
          rows="4"
          placeholder="We are seeking a skilled software engineer..."
        ><?= isset($listing) ? $listing->description ?? '' : '' ?></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Annual Salary</label>
        <input
          type="number"
          name="salary"
          placeholder="90000"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->salary ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Requirements</label>
        <textarea
          name="requirements"
          class="border rounded w-full py-2 px-3"
          rows="3"
          placeholder="Bachelor's degree, 3+ years experience..."
        ><?= isset($listing) ? $listing->requirements ?? '' : '' ?></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Benefits</label>
        <textarea
          name="benefits"
          class="border rounded w-full py-2 px-3"
          rows="3"
          placeholder="Health insurance, 401k..."
        ><?= isset($listing) ? $listing->benefits ?? '' : '' ?></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Tags (comma separated)</label>
        <input
          type="text"
          name="tags"
          placeholder="development, coding, java, python"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->tags ?? '' : '' ?>"
        />
      </div>

      <!-- Company Info -->
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
        Company Info
      </h2>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Company Name</label>
        <input
          type="text"
          name="company"
          placeholder="Company name"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->company ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Address</label>
        <input
          type="text"
          name="address"
          placeholder="123 Main St"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->address ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">City</label>
        <input
          type="text"
          name="city"
          placeholder="Chicago"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->city ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">State</label>
        <input
          type="text"
          name="state"
          placeholder="IL"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->state ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Phone</label>
        <input
          type="text"
          name="phone"
          placeholder="555-555-5555"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->phone ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Email</label>
        <input
          type="email"
          name="email"
          placeholder="email@example.com"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->email ?? '' : '' ?>"
        />
      </div>

      <div>
        <button
          class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none"
          type="submit"
        >
          Save
        </button>
        <a href="/listings" class="block text-center text-gray-500 mt-4">
          Cancel
        </a>
      </div>
    </form>
  </div>
</section>

<?php loadPartial('footer'); ?>