<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste IT') }}
        </h2>
    </x-slot>

    <div class="principal">
        <header>
            <div class="flex justify-center">
                <img src="{{ asset('Image/twinner2.jpg') }}" alt="">
            </div>

        <main>
            <h1>LISTE DES TWINNERS</h1>
          
            @foreach ($users as $user)
            <div class="twinner">
                <div class="twinner-left">
                    <div class="twinner-left-image">
                        <img src="" alt="pp">
                    </div>
                    <div class="twinner-left-info">
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->lastname }}</p>
                        <p>{{ $user->email }}</p>
                    </div>
                </div><hr class="twin-bar">
                <div class="twinner-right">
                    <h2>{{ $user->speciality }}</h2>
                </div>
            </div>
                
            @endforeach
        </main>
        
    </div>
    <footer>
        <div class="propos">
            <h1>À propos</h1>
            <p>
                Lorem ipsum dolor sit amet <br>
                consectetur adipisicing elit. <br>
                Debitis laboriosam consequatur,<br> 
                illo quasi magnam deserunt excepturi <br>
                delectus, molestias unde distinctio quas <br>
                modi beatae! Magni ipsum nisi,<br> 
                quia nihil sunt nobis.
            </p>
        </div>

        <div class="rubrique">
            <h1>Nos rubriques</h1>
            <ul>
                <li><a href="{{ route('user.list') }}">Twinners</a></li>
                <li><a href="{{ route('acceuil') }}">Actualités</a></li>
                <li><a href="{{ route('acceuil') }}">Historique</a></li>
            </ul>
        </div>
        <div class="new">
            <div class="newlester">
                <h1>Newlestter</h1>
                <input type="mail" placeholder="Adresse e-mail">
                <button type="submit">S'inscrire</button>
            </div>
            <div class="suivre">
                <h1>Suivez-nous</h1>
                <div class="img">
                    <a href="#"><img src="../Image/WhatsApp.png" alt="Whatsapp"></a>
                    <a href="#"><img src="../Image/Instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="../Image/linkedIn.png" alt="linkedIn"></a>
                </div>
            </div>
        </div>
        
    </footer>

</x-app-layout>