<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="flex justify-center items-center mt-20">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-4xl text-center font-bold mb-4">Register</h2>

    <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

    <form method="POST" action="/register">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Full Name</label>
        <input type="text" name="name"
          placeholder="Full Name"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($user) ? $user['name'] ?? '' : '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Email Address</label>
        <input type="email" name="email"
          placeholder="Email Address"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($user) ? $user['email'] ?? '' : '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">City</label>
        <input type="text" name="city"
          placeholder="City"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($user) ? $user['city'] ?? '' : '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">State</label>
        <input type="text" name="state"
          placeholder="State"
          class="border rounded w-full py-2 px-3"
          value="<?= isset($user) ? $user['state'] ?? '' : '' ?>" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Password</label>
        <input type="password" name="password"
          placeholder="Password"
          class="border rounded w-full py-2 px-3" />
      </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation"
                placeholder="Confirm Password"
                class="border rounded w-full py-2 px-3" />
        </div>

      <button type="submit"
        class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
        Register
      </button>

      <p class="mt-4 text-center">
        Already have an account?
        <a href="/login" class="text-green-500 hover:underline">Login</a>
      </p>
    </form>
  </div>
</section>

<?php loadPartial('footer'); ?>