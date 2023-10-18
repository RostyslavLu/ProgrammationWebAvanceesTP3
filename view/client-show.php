{{ include('header.php', {title: 'Information'}) }}

    <main>
        <section>
            <p><strong>Nom: </strong>{{client.nom}}</p>
            <p><strong>Adresse: </strong>{{client.addresse}}</p>
            <p><strong>Courriel: </strong>{{client.courriel}}</p>
            <p><strong>Phone: </strong>{{client.phone}}</p>
            <p><strong>Ville: </strong>{{ville}}</p>
            
            <div class="bouton"><a  href="{{path}}client/edit/{{client.id}}">Mise à jour</a></div>
        </section>
    </main>

    </body>
</html>