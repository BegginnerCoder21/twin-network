<x-mail::message>

    # DEMANDE D'INSCRIPTION SUR TWIN NETWORK

            - MATRICULE  : {{ ucfirst($donnee['matricule']) }}

            - NOM        : {{ ucfirst($donnee['name']) }}

            - PRENOM     : {{ ucfirst($donnee['lastname']) }}

            - EMAIL      : {{ $donnee['email'] }}

            - SPECIALITE : {{ ucfirst($donnee['speciality']) }}

            - NUMERO TELEPHONE : {{ $donnee['number']}}




Thanks,<br>
twin network
</x-mail::message>
