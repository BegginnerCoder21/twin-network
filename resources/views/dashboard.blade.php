<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TABLEAU DE BORD') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-7">
        <div class="justify-end flex mt-3 border-b-2 border-blue-500 py-5">
            <a class="bg-blue-500  px-8 py-2 text-white rounded-md hover:bg-white hover:text-blue-400 border-2 border-blue-500" href="{{ route('user.create') }}">
                Ajouter
            </a>
        </div>
        <div class=" border-b-2 border-blue-500 px-5 mt-4 space-y-8">
            <div class="py-5 flex items-center justify-between">
                <div class="flex space-x-9">
                    <div class="">
                       <span class="font-bold text-blue-400"> Matricule : </span> 21-ESATIC0303DF
                    </div>
                    <div class="">
                        <span class="font-bold text-blue-400"> Nom : </span> Teguera
                    </div>
                    <div class="">
                        <span class="font-bold text-blue-400"> Prenom : </span> Aboubacar
                    </div>
                </div>
                <div class="space-x-3">
                    <a class="bg-blue-500 text-white border-2 hover:bg-white hover:border-blue-500 hover:text-blue-400 rounded-md px-4 py-2" href="{{ route('user.edit',1) }}">Modifier</a>
                    <button class="bg-white text-blue-400 border-blue-500 border-2 hover:bg-blue-500 hover:border-blue-500 hover:text-white rounded-md px-4 py-1">Supprimer</button>
                </div>
            </div>
        </div>
        <div class=" border-b-2 border-blue-500 px-5 mt-4 space-y-8">
            <div class="py-5 flex items-center justify-between">
                <div class="flex space-x-9">
                    <div class="">
                       <span class="font-bold text-blue-400"> Matricule : </span> 21-ESATIC0303DF
                    </div>
                    <div class="">
                        <span class="font-bold text-blue-400"> Nom : </span> Teguera
                    </div>
                    <div class="">
                        <span class="font-bold text-blue-400"> Prenom : </span> Aboubacar
                    </div>
                </div>
                <div class="space-x-3">
                    <a class="bg-blue-500 text-white border-2 hover:bg-white hover:border-blue-500 hover:text-blue-400 rounded-md px-4 py-2" href="{{ route('user.edit',1) }}">Modifier</a>
                    <button class="bg-white text-blue-400 border-blue-500 border-2 hover:bg-blue-500 hover:border-blue-500 hover:text-white rounded-md px-4 py-1">Supprimer</button>
                </div>
            </div>
        </div>
        <div class=" border-b-2 border-blue-500 px-5 mt-4 space-y-8">
            <div class="py-5 flex items-center justify-between">
                <div class="flex space-x-9">
                    <div class="">
                       <span class="font-bold text-blue-400"> Matricule : </span> 21-ESATIC0303DF
                    </div>
                    <div class="">
                        <span class="font-bold text-blue-400"> Nom : </span> Teguera
                    </div>
                    <div class="">
                        <span class="font-bold text-blue-400"> Prenom : </span> Aboubacar
                    </div>
                </div>
                <div class="space-x-3">
                    <a class="bg-blue-500 text-white border-2 hover:bg-white hover:border-blue-500 hover:text-blue-400 rounded-md px-4 py-2" href="{{ route('user.edit',1) }}">Modifier</a>
                    <button class="bg-white text-blue-400 border-blue-500 border-2 hover:bg-blue-500 hover:border-blue-500 hover:text-white rounded-md px-4 py-1">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
aa