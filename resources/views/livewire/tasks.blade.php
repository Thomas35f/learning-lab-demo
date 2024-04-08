<div>
    <div class="p-4 rounded border-solid border-[2px] border-gray-200">
        <h2 class="font-bold text-xl mb-4">Ajouter une tâche</h2>
        <form wire:submit.prevent="submitTask(Object.fromEntries(new FormData($event.target)))"
            class="flex flex-col gap-4">
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
                    <option value="Travail">Travail</option>
                    <option value="Administration">Administration</option>
                    <option value="Hobby">Hobby</option>
                    <option value="Famille">Famille</option>
                    <option value="Ecole">Ecole</option>
                </select>
            </div>
            <div class="flex gap-4">
                <input type="submit" value="Envoyer"
                    class="text-white bg-green-600 border-green-500 border-2 border-solid hover:text-green-600 hover:bg-white transition-200 px-4 py-2 rounded w-fit font-bold cursor-pointer">
                <div wire:loading wire:target="submitTask">
                    <div class=" z-50 inset-0 flex justify-center ml-10">
                        @svg('spinner', 'text-gray-dark w-12 h-12 animate-spin')
                    </div>
                </div>
            </div>
        </form>
    </div>

    <hr class="my-10">

    <div id="listing-tasks">
        <h2 class="font-bold text-xl">Liste des tâches</h2>
        {{-- Filtres --}}
        <div id="filters">
            <div x-data="{ showDropdownCategories: false }">
                <label x-on:click="showDropdownCategories = !showDropdownCategories" class="block mb-1">Tri par
                    catégorie</label>
                <div class="relative sm:mr-2 lg:mr-0">

                    <div @click="showDropdownCategories = !showDropdownCategories"
                        class="border-solid border-gray-200 border-2 text-white bg-gray-200 p-2 w-fit rounded flex gap-2">
                        @if ($chosenCategory)
                            <p>
                                {{ $chosenCategory }}</p>
                            <p class="ml-auto lg:ml-2 text-white" wire:click="resetCategory"> X</p>
                        @else
                            <p>Toutes les catégories</p>
                            <i class="ml-auto lg:ml-2 arrow down"></i>
                        @endif
                    </div>

                    <div x-cloak x-show="showDropdownCategories"
                        class="absolute top-14 left-0 z-10 shadow-md bg-white rounded-md z-40 z-10">
                        <form wire:submit.prevent="filterByCategory(Object.fromEntries(new FormData($event.target)))">
                            <ul class="p-4 rounded-lg min-w-64">
                                @foreach ($categories as $key => $value)
                                    <li>
                                        <label class="flex items-center">
                                            <input
                                                class="mr-4 focus:ring-0 checked:bg-gray-dark checked:hover:bg-gray-dark checked:focus:bg-gray-dark"
                                                type="radio" name="category" value="{{ $key }}"
                                                onclick="changeButtonStatus()" />
                                            <span>
                                                {{ $value }}
                                            </span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="flex gap-4">
                                <button @click="showDropdownCategories = false" id="statusbutton"
                                    class="cursor-pointer bg-gray-200 w-full p-4 font-bold text-center text-white rounded-b-md">
                                    Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{-- Liste tâches --}}
        <div class="flex flex-col gap-4 mt-6">
            @foreach ($tasks as $task)
                <div wire:key="{{ $task->id }}"
                    class="border-solid border-gray-200 border-2 rounded p-4 flex flex-col gap-2">
                    <div class="flex">
                        <p class="font-bold">{{ $task->title }}</p>
                        <p class="bg-gray-400 text-white font-bold p-2 rounded ml-auto">{{ $task->category }}</p>
                    </div>
                    <p>{{ $task->content }}</p>
                    <div class="flex gap-4">
                        <button class="bg-gray-400 text-white font-bold p-2 rounded"
                            wire:click="deleteTask('{{ $task->id }}')">Effacer</button>
                        <div wire:loading wire:target="deleteTask('{{ $task->id }}')">
                            <div class=" z-50 inset-0 flex justify-center ml-10">
                                @svg('spinner', 'text-gray-dark w-12 h-12 animate-spin')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @script
        <script>
            $wire.on('task-created', () => {
                alert('La tâche a été créé')
            });

            $wire.on('task-deleted', () => {
                alert('La tâche a été effacée')
            });
        </script>
    @endscript


</div>
