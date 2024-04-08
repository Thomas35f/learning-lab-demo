<div class="p-4 rounded border-solid border-[2px] border-gray-200">
    <form wire:submit.prevent="submitTask(Object.fromEntries(new FormData($event.target)))" class="flex flex-col gap-4">
        <div>
            <label for="title" class="font-bold mb-2">Titre</label>
            <input type="text" name="title" class="w-full border-2 border-solid border-gray-400 rounded" required>
        </div>
        <div>
            <label for="content" class="font-bold mb-2">Contenu</label>
            <textarea name="content" class="w-full border-2 border-solid border-gray-400 rounded h-14" required></textarea>
        </div>
        <div>
            <label for="category" class="font-bold mb-2">Catégorie</label>
            <select name="category" class="border-2 border-solid border-gray-400 rounded">
                <option value="job">Travail</option>
                <option value="administration">Administration</option>
                <option value="hobby">Hobby</option>
                <option value="family">Famille</option>
            </select>
        </div>
        <div class="flex gap-4">
            <input type="submit" value="Envoyer"
                class="text-white bg-green-600 border-green-600 border-2 border-solid hover:text-green-600 hover:bg-white transition-200 px-4 py-2 rounded w-fit font-bold cursor-pointer">
            <div wire:loading wire:target="submitTask">
                <div class=" z-50 inset-0 flex justify-center ml-10">
                    @svg('spinner', 'text-gray-dark w-12 h-12 animate-spin')
                </div>
            </div>
        </div>
    </form>

    @script
        <script>
            $wire.on('post-created', () => {
                alert('La tâche a été créé')
            });
        </script>
    @endscript
</div>
