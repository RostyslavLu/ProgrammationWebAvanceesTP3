{{ include('header.php', {title: 'Liste marque de voitures'}) }}
    <main>
        <h1>Liste marque de voitures</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Marque</th>

            </tr>
    
            {% for marque in marques %}
    
                <tr>
                    <td>{{ marque.id }}</a></td>
                    <td>{{ marque.nom }}</td>
                </tr>
    
            {% endfor %}
        </table>
    </main>
</body>
</html>