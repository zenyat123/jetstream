

<div>

    <x-slot name="header">

        <div class = "flex">

            <h2 class = "leading-tight text-gray-500">Aviones</h2>

        </div>

    </x-slot>

    <x-container>

        <x-jet-form-section submit="store">

            <x-slot name="title">Vincular avión</x-slot>

            <x-slot name="description">Información suministrada</x-slot>

            <x-slot name="form">

                <div class = "col-span-3 space-y-3">

                    <div>

                        <x-jet-label>Avión</x-jet-label>

                        <x-jet-input type="text" wire:model="airplane" class="w-full"/>

                    </div>

                    <div>

                        <x-jet-label>Línea</x-jet-label>

                        <x-jet-input type="text" wire:model="line" class="w-full"/>

                    </div>

                    <div>

                        <x-jet-label>Vuelo</x-jet-label>

                        <x-jet-input type="text" wire:model="flight" class="w-full"/>

                    </div>

                </div>

                <div class = "col-span-3">

                    <figure>

                        <img src = "{{ asset('img/airs.webp') }}" class = "object-cover object-center rounded-xl">

                    </figure>

                </div>

            </x-slot>

            <x-slot name="actions">

                <x-jet-action-message on="created" class="mr-3">Vinculado</x-jet-action-message>

                <x-jet-button>Vincular</x-jet-button>

            </x-slot>

        </x-jet-form-section>

        <x-jet-action-section class="mt-6">

            <x-slot name="title">Aviones</x-slot>

            <x-slot name="description">Vinculados actualmente</x-slot>

            <x-slot name="content">

                @if($airplanes->count())

                    <table class = "text-gray-800">

                        <thead class = "border-gray-300 border-b">

                            <tr class = "text-left">

                                <div class = "flex">

                                    <th class = "w-2/5 py-2">Avión</th>
                                    <th class = "w-1/5 py-2">Línea</th>
                                    <th class = "w-1/5 py-2">Vuelo</th>
                                    <th class = "w-1/5 py-2">Acciones</th>

                                </div>

                            </tr>

                        </thead>

                        <tbody class = "divide-y divide-gray-300">

                            @foreach($airplanes as $airplane)

                                <tr>

                                    <td class = "py-2">{{ $airplane->airplane }}</td>
                                    <td class = "py-2">{{ $airplane->line }}</td>
                                    <td class = "py-2">{{ $airplane->flight }}</td>
                                    <td class = "py-2">

                                        <div class = "flex justify-around">

                                            <a wire:click = "edit({{ $airplane->id }})" class = "cursor-pointer text-blue-800 mx-2">Actualizar</a>

                                            <a wire:click = "confirmDeletion({{ $airplane->id }})" class = "cursor-pointer text-red-800 mx-2">Eliminar</a>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @endif

            </x-slot>

        </x-jet-action-section>

    </x-container>

    <x-jet-dialog-modal wire:model="modal_edit">

        <x-slot name="title">Actualizar avión</x-slot>

        <x-slot name="content">

            <div>

                <x-jet-label>Avión</x-jet-label>

                <x-jet-input type="text" wire:model="airplane_edit" class="w-full my-3"/>

            </div>

            <div>

                <x-jet-label>Línea</x-jet-label>

                <x-jet-input type="text" wire:model="line_edit" class="w-full my-3"/>

            </div>

            <div>

                <x-jet-label>Vuelo</x-jet-label>

                <x-jet-input type="text" wire:model="flight_edit" class="w-full my-3"/>

            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('modal_edit', false)" class="mr-2">Cerrar</x-jet-secondary-button>

            <x-jet-button wire:click="update" wire:target="update" wire:loading.attr="disabled">Actualizar</x-jet-button>

        </x-slot>

    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="modal_delete">

        <x-slot name="title">Confirma la eliminación</x-slot>

        <x-slot name="content">

            Del aeroplano {{ $name }}

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('modal_delete', false)" class="mr-2">cerrar</x-jet-secondary-button>

            <x-jet-danger-button wire:click="destroy({{ $id_delete }})">eliminar</x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

</div>

