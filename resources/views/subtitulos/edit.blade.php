<x-app-layout title="Actualizar subtitulo">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Actualizar subtitulo {{$subtitulo->Idioma}} del capitulo "{{$capitulo->Nombre}}" de {{$capitulo->temporada->anime->Titulo}} 
        </h2>
        <form action="{{route('subtitulo.update', $subtitulo->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese el idioma" id="Idioma" name="Idioma"  value="{{$subtitulo->Idioma}}">
                        <x-jet-input-error for="Idioma" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">URL</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese la url del archivo vtt" id="Url" name="Url" value="{{$subtitulo->Url}}">
                        <x-jet-input-error for="Url" />
                </label>
               

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Abreviatura</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese la abreviatura del idioma (Español = es)" id="Abreviatura" name="Abreviatura" value="{{$subtitulo->Abreviatura}}">
                        <x-jet-input-error for="Abreviatura" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Subtitulo por defecto</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese true o false" id="Default" name="Default" value="{{$subtitulo->Default}}">
                        <x-jet-input-error for="Default" />
                </label>
        

                <label for="countries" class="block mb-2 text-sm text-gray-700 dark:text-gray-400">Seleciona El capitulo</label>
                <select id="countries" name="capitulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
                    
                        <option selected value="{{$capitulo->id}}">{{$capitulo->Nombre}}</option>
                   
                </select> 




                <div class="flex mt-6 text-sm ">
                    <a href="{{route('anime.index')}}" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                        
                            
                            Cancelar
                        
                    </a>
                    <button type="submit"
                        class=" ml-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Actualizar
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>