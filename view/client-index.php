{{ include('header.php', {title: 'Liste clients'}) }}
    <main>
        <h1>Clients</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Phone</th>
                <th>Courriel</th>
            </tr>
            {% for client in clients %}
                <tr>
                    <td><a href='{{path}}client/show/{{client.id}}'>{{ client.nom }}</a></td>
                    <td>{{ client.addresse }}</td>
                    <td>{{ client.phone }}</td>
                    <td>{{ client.courriel }}</td>
                </tr>
            {% endfor %}
        </table>
    </main>
</body>
</html>