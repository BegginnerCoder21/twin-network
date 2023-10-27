<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="principal">

                    <div class="flex justify-center">
                        <img src="{{ asset('Image/twinner.jpg') }}" alt="">
                    </div>
        <main>
            <div class="actu">
                <h1>Actualités 📰</h1>
                <div class="actu-box overflow overflow-auto">
                    <div class="actu-box-left">
                        <img class="h-full" src="{{ asset('Image/IMG-20230331-WA0001.jpg') }}" alt="actu">
                        <h3>Femmes du TIC</h3>
                    </div>

                    <div class="actu-box-mid">
                        <img src="{{ asset('Image/IMG-20221223-WA0003.jpg') }}" alt="actu">
                        <h3>Formation orange</h3>
                    </div>

                    <div class="actu-box-right">
                        <img src="{{ asset('Image/IMG-20230227-WA0019.jpg') }}" alt="actu">
                        <h3>Culture générale</h3>
                    </div>
                </div>
            </div><hr>

            <div class="histo" id="histo">
                <h1 >Historique 📜</h1>
                <div class="histo-box">
                    <div class="histo-box-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at tortor 
                            sed mauris facilisis malesuada. Morbi suscipit nisl purus, ut rutrum erat
                            eleifend et. Nulla facilisi. Nulla hendrerit aliquam justo, tincidunt maximus 
                            purus scelerisque sed. Etiam id sapien ut quam finibus malesuada quis
                            non odio. Donec consequat at justo id rutrum. Donec sem est, tempor a 
                            augue et, condimentum rutrum nisi. Sed fringilla condimentum placerat. 
                            Nulla pharetra turpis lacinia lacus sollicitudin mollis. Aenean facilisis ut 
                            nunc sed varius.
                        </p> 
                    </div>

                </div>
            </div>
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
                <li><a href="#histo">Historique</a></li>
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
                    <a href="#"><img src="{{ asset('Image/WhatsApp.png') }}" alt="Whatsapp"></a>
                    <a href="#"><img src="{{ asset('Image/Instagram.png') }}" alt="Instagram"></a>
                    <a href="#"><img src="{{ asset('Image/linkedIn.png') }}" alt="linkedIn"></a>
                </div>
            </div>
        </div>
        
    </footer>

</x-app-layout>