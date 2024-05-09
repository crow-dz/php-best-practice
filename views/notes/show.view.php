<?php require(base_dir('views/partails/head.php')) ?>
<?php require(base_dir('views/partails/nav.php')) ?>
<?php require(base_dir('views/partails/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= htmlentities($note['body']) ?></p>
    </div>
    <form class="m-2" method="POST">
        <input name="id" type="text" hidden value="<?= $note['id'] ?>">
        <button class="text-red-400 " type="submit">Delete</button>
    </form>
</main>
<?php require(base_dir('views/partails/footer.php')) ?>