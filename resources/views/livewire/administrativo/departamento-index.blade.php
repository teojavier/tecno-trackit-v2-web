<div class="">
    <div class="p-5">
        <div class="flex ml-5">
            <span
                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                    <path
                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
                </svg>
            </span>
            <input type="text"
                class="w-3/6 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block text-sm border-blackp-2.5  dark:bg-gray-700 dark:border-gray-600
             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar" wire:model="search">

            <a href="{{ route('departments.create') }}" class="px-3 py-2 ml-5 bg-primary text-white rounded-md ">Registrar</a>
        </div>
    </div>

    @if ($departamentos->count())
        <div class="overflow-x-auto">
            <div class=" bg-primary-dark flex items-center justify-center font-sans  overflow-hidden">
                <div class="w-full lg:w-5/6">
                    <div class="bg-white dark:bg-dark shadow-md rounded">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="border bg-primary text-primary text-white uppercase text-sm leading-normal">
                                    <th class="border py-3 px-6 text-left">ID</th>
                                    <th class="border py-3 px-6 text-left">Nombre</th>
                                    <th class="border py-3 px-6 text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-light ">
                                @foreach ($departamentos as $departamento)
                                    <tr class="border border-gray-200 hover:bg-gray-100 hover:text-black">
                                        <td class="border py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{ $departamento->id }}</span>
                                            </div>
                                        </td>

                                        <td class="border py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $departamento->name }}</span>
                                            </div>
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <div class="w-4 mr-2 transform hover:text-primary hover:scale-110">
                                                    <a href="{{ route('departments.edit', $departamento->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <button class="focus:outline-none"
                                                    wire:click="eventDestroyDepartment({{ $departamento->id }})">
                                                    <div class="w-4 mr-2 transform hover:text-primary hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="px-6 py-4">
            <strong class="text-red-800 animate-pulse">No existe ningun registro
                coincidente</strong>
        </div>

    @endif
    <script>
        Livewire.on('event-destroy-department', function(departamento) {
            Swal.fire({
                title: 'Estas seguro de eliminar a: ' + departamento.name + ' ?',
                text: "Si aceptas no abrá vuelta atras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, estoy seguro'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'departamento Eliminado Correctamente.',
                        'success'
                    )
                    Livewire.emit('eventDestroyDepartmentAccept', departamento.id);
                }
            })

        });
    </script>
</div>