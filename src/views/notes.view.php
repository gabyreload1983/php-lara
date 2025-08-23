 <? require("partials/head.php") ?>
 <? require("partials/nav.php") ?>
 <? require("partials/banner.php") ?>

 <main>
     <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">
         <ul class="my-6">

             <?php foreach($notes as $note): ?>
             <li class="mb-4 list-none">
                 <a href="/note?id=<?= $note['id'] ?>"
                     class="block rounded-lg bg-gray-800 p-6 hover:bg-gray-700 transition-colors">
                     <?php echo htmlspecialchars($note['body']) ?>
                 </a>
             </li>
             <?php endforeach; ?>
         </ul>
         <a href="/notes/create" class="rounded-lg bg-blue-800 p-3 hover:bg-blue-700 transition-colors">Create Note</a>
     </div>
 </main>

 <? require("partials/footer.php") ?>