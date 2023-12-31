<x-guest-layout>
    <form method="POST" action="" enctype="multipart/form-data" class="px-10">
        @csrf

        <h1 class="text-3xl text-blue-500 text-center mb-12">Demande d'inscription</h1>

        <!-- Name -->
        <div>
            <x-input-label for="name" class="text-blue-600" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- lastname-->
        <div class="mt-4">
            <x-input-label for="lastname" class="text-blue-600" :value="__('Prenom')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"  required />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="text-blue-600" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- matricule-->
        <div class="mt-4">
            <x-input-label for="matricule" class="text-blue-600" :value="__('Matricule')" />
            <x-text-input id="matricule" class="block mt-1 w-full" type="text" name="matricule" required />
            <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
        </div>

        <!-- number-->
        <div class="mt-4">
            <x-input-label for="number" class="text-blue-600" :value="__('Numero telephone')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" required />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- spcéciality -->
        <div class="mt-4">
            <x-input-label for="speciality" :value="__('Spécialité')" />
            <x-text-input id="speciality" class="block mt-1 w-full" type="text" name="speciality" required />
            <x-input-error :messages="$errors->get('speciality')" class="mt-2" />
        </div>

        <!-- images -->
        <div class="mt-4">
            <x-input-label for="image" class="text-blue-600" :value="__('Images')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"/>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('login') }}">
                {{ __('Déja un compte? Se connecter') }}
            </a>

            <x-primary-button class="ml-4 bg-blue-400 hover:bg-blue-500">
                {{ __('Envoyer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
