<x-mail::message>

    # DEMANDE D'INSCRIPTION SUR TWIN NETWORK

            - NOM        : {{ ucfirst($donnee['name']) }} 
            
            - PRENOM     : {{ ucfirst($donnee['lastname']) }} 

            - EMAIL      : {{ $donnee['email'] }} 

            - MATRICULE  : {{ ucfirst($donnee['matricule']) }} 

            - SPECIALITE : {{ ucfirst($donnee['speciality']) }} 




Thanks,<br>
twin network
</x-mail::message>
