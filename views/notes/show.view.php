<?php require(base_dir('views/partails/head.php')) ?>
<?php require(base_dir('views/partails/nav.php')) ?>
<?php require(base_dir('views/partails/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= htmlentities($note['body']) ?></p>
    </div>
    <form class="m-2" method="POST">
        <input type="text" name="_method" value="DELETE" hidden>
        <input name="id" type="text" hidden value="<?= $note['id'] ?>">
        <button class="text-red-400 " type="submit">Delete</button>
        <a href="/note/edit?id=<?= $note['id'] ?>" class="text-blue-400 mx-3 border border-blue-400 p-2 rounded">Edit</a>

    </form>
</main>
<?php require(base_dir('views/partails/footer.php')) ?>