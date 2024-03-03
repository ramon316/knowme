<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex mb-6">
                <x-button wire:click.prevent="edit" class="float-right">
                    {{ __('Crear nuevo post') }}
                </x-button>
            </div>
            <x-table wire:loading.class="opacity-75">
                <x-slot name="header">
                    <x-table.header>No.</x-table.header>
                    <x-table.header sortable wire:click.prevent="sortBy('title')"
                        :direction="$sortField === 'title' ? $sortDirection : null">Título</x-table.header>
                    <x-table.header sortable wire:click.prevent="sortBy('content')"
                        :direction="$sortField === 'content' ? $sortDirection : null">Contenido</x-table.header>
                    <x-table.header>Acciones</x-table.header>
                </x-slot>
                <x-slot name="body">
                    @php
                    $i = (request()->input('page', 1) - 1) * $perPage;
                    @endphp
                    @forelse ($records as $key => $record)
                    <x-table.row>
                        <x-table.cell> {{ ++$i }}</x-table.cell>
                        <x-table.cell>{{ $record->title }}</x-table.cell>
                        <x-table.cell> {{ $record->content }}</x-table.cell>
                        <x-table.cell>
                            <x-button wire:click="edit('{{ $record->id }}')">Editar</x-button>
                            <x-button wire:click="deleteId('{{ $record->id }}')">Eliminar</x-button>
                        </x-table.cell>
                    </x-table.row>
                    @empty
                    <x-table.row>
                        <x-table.cell colspan=4>
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-400 text-xl">
                                    Aun no existen Posts...
                                </span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
            @if ($records->hasPages())
            <div class="p-3">
                {{ $records->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <x-modals.form wire:model.live="isFormOpen">
        <x-slot name="title">
            {{ __('Agregar/Editar Registros') }}
        </x-slot>

        <x-slot name="content">
            @if ($image)
            <div class="col-span-6 sm:col-span-4 mb-6">
                <img src="{{$image->temporaryUrl()}}" alt="">
            </div>
            @endif
            <div class="col-span-6 sm:col-span-4 mb-6">
                <x-label for="title" value="{{ __('Título') }}" />
                <x-input id="title" type="text" class="mt-1 block w-full" wire:model="title" />
                <x-input-error for="title" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mb-6">
                <x-label for="title" value="{{ __('Contenido') }}" />
                <textarea id="content" wire:model='content' class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
                <x-input-error for="content" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mb-6">
                <x-label for="image" value="{{ __('Imagen') }}" />
                <x-input id="image" type="file" class="mt-1 block w-full" wire:model="image" />
                <x-input-error for="image" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mb-6">
                <x-label for="category" value="{{ __('Categoria') }}" />
                <x-input id="category" type="text" class="mt-1 block w-full" wire:model="category" />
                <x-input-error for="category" class="mt-2" />
            </div>
        </x-slot>
    </x-modals.form>
    <!-- Delete Confirmation Modal -->
    <x-confirmation-modal wire:model.live="isDeleteModalOpen">
        <x-slot name="title">
            {{ __('Eliminar Registro') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Estas seguro que deseas eliminar este registro para siempre?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click.prevent="closeDelete">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click.prevent="delete" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
