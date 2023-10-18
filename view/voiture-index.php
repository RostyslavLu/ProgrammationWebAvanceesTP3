{{ include('header.php', {title: 'Liste voitures'}) }}
    <main>
        <h1>Liste des voitures</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Année</th>
                <th>Prix par jour</th>
                <th>Disponibilité</th>
            </tr>
    
            {% for voiture in voitures %}
    
                <tr>
                    <td>{{ voiture.id }}</td>
                    <td><a href='{{path}}voiture/show/{{voiture.id}}'>{{ voiture.nom }}</a></td>
                    <td>{{ voiture.annee }}</td>
                    <td>{{ voiture.prix_par_jour }}</td>
                    {% if voiture.disponible == 1 %}
                    <td>Oui</td>
                    {% else %}
                    <td>Non</td>
                    {% endif %}
                </tr>
    
            {% endfor %}
        </table>
    </main>
</body>
</html>