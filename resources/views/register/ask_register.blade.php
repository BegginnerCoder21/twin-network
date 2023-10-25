<x-mail::message>

# DEMANDE D'INSCRIPTION SUR TWIN NETWORK

- NOM : {{$donnee['name']}}

- PRENOM : {{$donnee['lastname']}}

- MATRICULE : {{$donnee['matricule']}}


<x-mail::button :url="''">
<a href="{{route('register',['donnee',$donnee])}}">Button</a>
</x-mail::button>

Thanks,<br>
</x-mail::message>
