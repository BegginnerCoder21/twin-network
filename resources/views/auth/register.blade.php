<x-guest-layout>
    <form class="" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="text-3xl text-blue-500 text-center mb-12">ENREGISTREMENT</h1>

        <div class="ml-28">
            @foreach ($errors->all() as $error)
                <div class="text-red-500 mt-2xx">
                    {{$error}}
                </div>
            @endforeach
            <!-- Name -->
            <div class="">
                <x-input-label for="lastname" class="text-blue-600" :value="__('Nom')" />
                <x-text-input id="name" class="block mt-1 w-3/4" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- lastname-->
            <div class="mt-4">
                <x-input-label for="lastname" class="text-blue-600" :value="__('Prenom')" />
                <x-text-input id="lastname" class="block mt-1 w-3/4" type="text" name="lastname"  required />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- matricule-->
            <div class="mt-4">
                <x-input-label for="matricule" class="text-blue-600" :value="__('Matricule')" />
                <x-text-input id="matricule" class="block mt-1 w-3/4" type="text" name="matricule" required />
                <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
            </div>

            <!-- Numero-->
            <div class="mt-4">
                <x-input-label for="number" class="text-blue-600" :value="__('Numero')" />
                <x-text-input id="number" class="block mt-1 w-3/4" type="text" name="number" required />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" class="text-blue-600" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-3/4" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <!-- spcéciality -->
            <div class="mt-4">
                <x-input-label for="speciality" :value="__('Spécialité')" />
                <x-text-input id="speciality" class="block mt-1 w-3/4" type="text" name="speciality" required />
                <x-input-error :messages="$errors->get('speciality')" class="mt-2" />
            </div>

            <!-- images -->
            <div class="mt-4">
                <x-input-label for="image" class="text-blue-600" :value="__('Images')" />
                <x-text-input id="image" class="block mt-1 w-3/4" type="file" name="image"/>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- admin -->
            <div class="mt-4">
                <x-input-label for="admin" class="text-blue-600" :value="__('Admin')" />
                <select name="admin" id="admin">
                    <option value="0">NON</option>
                    <option value="1">OUI</option>
                </select>
                <x-input-error :messages="$errors->get('admin')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" class="text-blue-600" :value="__('Mot de passe')" />

                <x-text-input id="password" class="block mt-1 w-3/4"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" class="text-blue-600" :value="__('Confirmer mot de passe')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-3/4"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ml-4 bg-blue-400 hover:bg-blue-500">
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </div>

    </form>
</x-guest-layout>
