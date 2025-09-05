 <? require base_path("views/partials/head.php") ?>
 <? require base_path("views/partials/nav.php") ?>
 <? require base_path("views/partials/banner.php") ?>

 <main>
     <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">

         <p class="block rounded-lg bg-gray-800 p-6 hover:bg-gray-700 transition-colors mb-4">
             <?= htmlspecialchars($note['body']) ?>
         </p>

         <a class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
             href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
     </div>
 </main>

 <? require base_path("views/partials/footer.php") ?>