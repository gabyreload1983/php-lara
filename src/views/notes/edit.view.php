 <? require base_path("views/partials/head.php") ?>
 <? require base_path("views/partials/nav.php") ?>
 <? require base_path("views/partials/banner.php") ?>

 <main>
     <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">
         <form method="POST" action="/note">
             <input type="hidden" name="_method" value="PATCH">
             <input type="hidden" name="id" value="<?= $note['id'] ?>">
             <div class="space-y-12">
                 <div class="border-b border-white/10 pb-12">
                     <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                         <div class="col-span-full">
                             <label for="body" class="block text-sm/6 font-medium text-white">body</label>
                             <div class="mt-2">
                                 <textarea id="body" name="body" rows="3" required class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 
                                     outline-white/10 focus:outline-2 focus:-outline-offset-2 
                                     focus:outline-indigo-500 sm:text-sm/6"><?= $note['body'] ?></textarea>
                                 <?php if(isset($errors['body'])) : ?>
                                 <p class="text-red-500 text-sm mt-2">
                                     <?= $errors['body']; ?>
                                 </p>
                                 <?php endif; ?>
                             </div>
                         </div>

                         <div class="mt-6 flex items-center justify-end gap-x-6">
                             <a href="/notes" class="text-sm/6 font-semibold text-white cursor-pointer">Cancel</a>
                             <button type="submit"
                                 class="cursor-pointer rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
                         </div>
                     </div>
                 </div>
             </div>
         </form>

     </div>
 </main>

 <? require base_path("views/partials/footer.php") ?>