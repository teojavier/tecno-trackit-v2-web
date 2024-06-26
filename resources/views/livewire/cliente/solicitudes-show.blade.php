<div>
    <div>
        <div class="grid grid-cols-3 px-4">
            <div class="pr-3">
                <label class="font-bold " for="">Soporte Asigando:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $soporte->name }}"
                    id="name" readonly>
            </div>
            <div class="pr-3">
                <label class="font-bold " for="">Solicitante:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text"
                    value="{{ $cliente->name }}" id="name" readonly>
            </div>
            <div class="pr-3">
                <label class="font-bold " for="">Categoría:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text"
                    value="{{ $categoria->name }}" id="name" readonly>
            </div>
        </div>
        <div class="grid grid-cols-3 px-4 pt-5">
            <div class="pr-3 col-span-2">
                <label class="font-bold " for="">Descripción:</label>
                <textarea class="w-full text-black" name="description" id="" cols="30" rows="5" readonly>{{ $solicitud->description }}</textarea>
            </div>
            <div class="pr-3 col-span-1">
                <div class="grid grid-cols-2">
                    <div class="">

                        <label class="font-bold" for="">Estado:</label>
                        <div class="mt-5">
                            @if ($status->id == 1)
                                <span class="bg-green-500 rounded-lg px-5 py-3 font-bold">{{ $status->name }}</span>
                            @endif
        
                            @if ($status->id == 2)
                                <span class="bg-yellow-500 rounded-lg px-5 py-3 font-bold">{{ $status->name }}</span>
                            @endif
        
                            @if ($status->id == 3)
                                <span class="bg-blue-500 rounded-lg px-5 py-3 font-bold">{{ $status->name }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="">
                        @if ($mora != null)
                                                                                  
                            <label class="font-bold " for="">Estado de Mora:</label>
                            <div class="mt-5">
                                
                                @if ($mora->arrear_statu_id == 1)
                                <span class="bg-green-500 rounded-lg px-5 py-3 font-bold">{{ $mora->arrearstatu->name }}</span>
                                @endif
                                
                                @if ($mora->arrear_statu_id == 2)
                                <span class="bg-red-500 rounded-lg px-5 py-3 font-bold">{{ $mora->arrearstatu->name }}</span>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="col-span-2 mt-6">

                        @if ($mora != null && $status->id > 1)
                        @if ($mora->date_end != null)
                            <div class="pr-3">
                                <label class="font-bold " for="">Fecha maxima para antender la solicitud:</label>
                                <input class="rounded-lg focus:outline-none w-full text-black" type="text"
                                    value="{{ $mora->date_end }}" id="mora" readonly>
                            </div>
                        @endif
                                               
                    @endif 
                    </div>

                </div>

            </div>
           
                
           
        </div>
        
        
          
        <div class="grid grid-cols-3 px-4 mt-2">
            <div class="pr-3">
                <label class="font-bold " for="">Fecha de Solicitud:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text"
                    value="{{ $date_request }}" id="sol" readonly>
            </div>
            @if ($status->id > 1)
                <div class="pr-3">
                    <label class="font-bold " for="">Fecha de Aceptación:</label>
                    <input class="rounded-lg focus:outline-none w-full text-black" type="text"
                        value="{{ $date_accept }}" id="ace" readonly>
                </div>
            @endif

            @if ($status->id == 3)
                <div class="pr-3">
                    <label class="font-bold " for="">Fecha de Finalización:</label>
                    <input class="rounded-lg focus:outline-none w-full text-black" type="text"
                        value="{{ $date_finish }}" id="fin" readonly>
                </div>
            @endif
        </div>

        @if ($status->id == 2)
            <div class="grid grid-cols-3 px-4 pt-5">
                <div class="pr-3 col-span-2">
                    <label class="font-bold " for="">Conclusión:</label>
                    <textarea class="w-full text-black" wire:model="conclution" id="conclution" cols="30" rows="5">{{ $solicitud->conclution }}</textarea>
                    @error('conclution')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
            </div>
        @endif

        @if ($status->id == 3)
            <div class="grid grid-cols-3 px-4 pt-5">
                <div class="pr-3 col-span-2">
                    <label class="font-bold " for="">Conclusión:</label>
                    <textarea class="w-full text-black" id="conclution2" cols="30" rows="5" readonly>{{ $solicitud->conclution }}</textarea>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr class="border bg-primary text-primary text-white uppercase text-sm leading-normal">
                                <th class="bg-primary">Acción</th>
                                <th class="bg-primary">Tiempo</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 dark:text-light ">
                            <tr class="border border-gray-200 hover:bg-gray-100 hover:text-black">
                                <td class="">
                                    <div class="flex items-center">
                                        <span class="font-medium">Tiempo en Aceptar</span>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center">
                                        <span class="font-medium">
                                            @if ($solicitud_aceptacion->ano != 0)
                                                {{ $solicitud_aceptacion->ano }} Años
                                            @endif
                                            @if ($solicitud_aceptacion->mes != 0)
                                                {{ $solicitud_aceptacion->mes }} meses
                                            @endif
                                            @if ($solicitud_aceptacion->dia != 0)
                                                {{ $solicitud_aceptacion->dia }} dias
                                            @endif
                                            @if ($solicitud_aceptacion->hora != 0)
                                                {{ $solicitud_aceptacion->hora }} horas
                                            @endif
                                            @if ($solicitud_aceptacion->min != 0)
                                                {{ $solicitud_aceptacion->min }} min
                                            @endif
                                            @if ($solicitud_aceptacion->seg != 0)
                                                {{ $solicitud_aceptacion->seg }} seg
                                            @endif
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border border-gray-200 hover:bg-gray-100 hover:text-black">
                                <td class="">
                                    <div class="flex items-center">
                                        <span class="font-medium">Tiempo en Finalizar</span>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center">
                                        <span class="font-medium">
                                            @if ($aceptacion_finalizacion->ano != 0)
                                                {{ $aceptacion_finalizacion->ano }} Años
                                            @endif
                                            @if ($aceptacion_finalizacion->mes != 0)
                                                {{ $aceptacion_finalizacion->mes }} meses
                                            @endif
                                            @if ($aceptacion_finalizacion->dia != 0)
                                                {{ $aceptacion_finalizacion->dia }} dias
                                            @endif
                                            @if ($aceptacion_finalizacion->hora != 0)
                                                {{ $aceptacion_finalizacion->hora }} horas
                                            @endif
                                            @if ($aceptacion_finalizacion->min != 0)
                                                {{ $aceptacion_finalizacion->min }} min
                                            @endif
                                            @if ($aceptacion_finalizacion->seg != 0)
                                                {{ $aceptacion_finalizacion->seg }} seg
                                            @endif
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border border-gray-200 hover:bg-gray-100 hover:text-black">
                                <td class="">
                                    <div class="flex items-center">
                                        <span class="font-medium">Tiempo Total de Atención</span>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center">
                                        <span class="font-medium">
                                            @if ($tiempo_total->ano != 0)
                                                {{ $tiempo_total->ano }} Años
                                            @endif
                                            @if ($tiempo_total->mes != 0)
                                                {{ $tiempo_total->mes }} meses
                                            @endif
                                            @if ($tiempo_total->dia != 0)
                                                {{ $tiempo_total->dia }} dias
                                            @endif
                                            @if ($tiempo_total->hora != 0)
                                                {{ $tiempo_total->hora }} horas
                                            @endif
                                            @if ($tiempo_total->min != 0)
                                                {{ $tiempo_total->min }} min
                                            @endif
                                            @if ($tiempo_total->seg != 0)
                                                {{ $tiempo_total->seg }} seg
                                            @endif
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
      
    </div>

</div>
