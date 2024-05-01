<?php require(base_dir('views/partails/head.php')) ?>
<?php require(base_dir('views/partails/nav.php')) ?>
<?php require(base_dir('views/partails/banner.php')) ?>
<main>
  <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">

    <div class="mx-auto px-2 pt-4 max-w-6xl text-gray-500">
      <a type="button" href="note/create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</a>
    </div>
    <section>
      <div class="mx-auto px-2 max-w-6xl text-gray-500">
        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
          <?php foreach ($notes as $note) : ?>
            <a href="/note/?id=<?= $note['id'] ?>" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 truncate">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Note Tite</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400"><?= htmlentities($note['body']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

    </section>
  </div>
</main>
<?php require(base_dir('views/partails/footer.php')) ?>