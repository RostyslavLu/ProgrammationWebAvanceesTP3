{{ include('header.php', {title: 'Information'}) }}

    <main>
        <section>
            <p><strong>Année fabrication: </strong>{{voiture.annee}}</p>
            <p><strong>Prix par jour: </strong>{{voiture.prix_par_jour}}</p>
                        {% if voiture.disponible == 1 %}
                            <p><strong>Disponibilité: </strong>Oui</p>
                        {% else %}
                            <p><strong>Disponibilité: </strong>Non</p>
                        {% endif %}
            
            <p><strong>Marque: </strong>{{nom}}</p>
            <img src="{{ voiture.photo_path }}" alt="photo_voiture">
        </section>
        {% if session.privilege == 1 %}
        <div class="bouton"><a href="{{path}}voiture/edit/{{voiture.id}}">Mise à jour</a></div>
        {% endif %}
        </body>
    </main>
</html>