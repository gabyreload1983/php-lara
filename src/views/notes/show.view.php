 <? require base_path("views/partials/head.php") ?>
 <? require base_path("views/partials/nav.php") ?>
 <? require base_path("views/partials/banner.php") ?>

 <main>
     <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">

         <p class="block rounded-lg bg-gray-800 p-6 hover:bg-gray-700 transition-colors">
             <?= htmlspecialchars($note['body']) ?>
         </p>

     </div>
 </main>

 <? require base_path("views/partials/footer.php") ?>