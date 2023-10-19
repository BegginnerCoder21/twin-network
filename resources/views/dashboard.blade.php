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
        @foreach ($users as $user)
            <div class=" border-b-2 border-blue-500 px-5 mt-4 space-y-8">
                <div class="py-5 flex items-center justify-between">
                    <div class="flex space-x-9">
                        <div class="">
                        <span class="font-bold text-blue-400"> Matricule : </span> {{ $user->matricule }}
                        </div>
                        <div class="">
                            <span class="font-bold text-blue-400"> Nom : </span> {{ $user->name }}
                        </div>
                        <div class="">
                            <span class="font-bold text-blue-400"> Prenom : </span> {{ $user->lastname }}
                        </div>
                    </div>
                    <div class="space-x-3">
                        <a class="bg-blue-500 text-white border-2 hover:bg-white hover:border-blue-500 hover:text-blue-400 rounded-md px-4 py-2" href="{{ route('user.edit',$user->id) }}">Modifier</a>
                        <button class="bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:border-blue-500 hover:text-white rounded-md px-4 py-1" onclick="event.preventDefault(); document.getElementById('deleteUser{{ $user->id }}').submit();" >
                        <form action="{{ route('user.destroy',$user->id) }}" method="post" id="deleteUser{{ $user->id }}">
                        @csrf
                            @method('delete')
                                Supprimer
                            </form>
                        </button>
                       
                    </div>
                </div>
            </div>   
        @endforeach
    </div>
</x-app-layout>
