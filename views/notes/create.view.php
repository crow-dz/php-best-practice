<?php require(base_dir('views/partails/head.php')) ?>
<?php require(base_dir('views/partails/nav.php')) ?>
<?php require(base_dir('views/partails/banner.php')) ?>
<main>
  <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">
    <section>

      <div class="mx-auto px-2 max-w-6xl text-gray-500">
        <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
 
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <form method="POST" >
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
              <div class="col-span-full">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                <div class="mt-2">
                  <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"> <?= $_POST['body'] ?? trim('') ?></textarea>
                  <p class="pt-2 text-red-500">
                    <?= empty($errors['body'])?'':$errors['body'] ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <a type="button" href="/notes" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
        </form>

      </div>

    </section>
  </div>
</main>
<?php require(base_dir('views/partails/footer.php')) ?>