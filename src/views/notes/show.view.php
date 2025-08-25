 <? require base_path("views/partials/head.php") ?>
 <? require base_path("views/partials/nav.php") ?>
 <? require base_path("views/partials/banner.php") ?>

 <main>
     <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">

         <p class="block rounded-lg bg-gray-800 p-6 hover:bg-gray-700 transition-colors">
             <?= htmlspecialchars($note['body']) ?>
         </p>

         <form method="POST" class="inline">
             <input type="hidden" name="_method" value="DELETE">
             <input type="hidden" name="id" value="<?= $note['id'] ?>">
             <button class="mt-4 rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">Delete</button>
         </form>
     </div>
 </main>

 <? require base_path("views/partials/footer.php") ?>