
<x-guest-layout>

    <form class="px-10" method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <h1 class="text-3xl text-blue-500 text-center mb-8">MODIFICATION</h1>

        @foreach ($errors->all() as $error)
                <div class="text-red-500 mt-2xx">
                    {{$error}}
                </div>
            @endforeach
        <!-- Name -->
        <div>
            <x-input-label for="name" class="text-blue-600" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- lastname-->
        <div class="mt-4">
            <x-input-label for="lastname" class="text-blue-600" :value="__('Prenom')" />
            <x-text-input id="lastname" class="block mt-1 w-full" value="{{ $user->lastname }}" type="text" name="lastname"  required />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="text-blue-600" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- matricule-->
        <div class="mt-4">
            <x-input-label for="number" class="text-blue-600" :value="__('Numero')" />
            <x-text-input id="number" class="block mt-1 w-full" value="{{ $user->number }}" type="text" name="number" required />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- matricule-->
        <div class="mt-4">
            <x-input-label for="matricule" class="text-blue-600" :value="__('Matricule')" />
            <x-text-input id="matricule" class="block mt-1 w-full" value="{{ $user->matricule }}" type="text" name="matricule" required />
            <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
        </div>

        <!-- spcéciality -->
        <div class="mt-4">
            <x-input-label for="speciality" :value="__('Spécialité')" />
            <x-text-input id="speciality" class="block mt-1 w-full" value="{{ $user->speciality }}" type="text" name="speciality" required />
            <x-input-error :messages="$errors->get('speciality')" class="mt-2" />
        </div>

        <!-- images -->
        <div class="mt-4">
            <x-input-label for="image" class="text-blue-600" :value="__('Images')" />
            <x-text-input id="image" class="block mt-1 w-full"  type="file" name="image"/>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- admin -->
        <div class="mt-4">
            <x-input-label for="admin" class="text-blue-600" :value="__('Admin')" />
            <select name="admin" id="admin">
                <option  value="0">0</option>
                <option  value="1">1</option>
            </select>
            <x-input-error :messages="$errors->get('admin')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="text-blue-600" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="text-blue-600" :value="__('Confirmer mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">


            <x-primary-button class="ml-4 bg-blue-400 hover:bg-blue-500">
                {{ __('Enregistrer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
