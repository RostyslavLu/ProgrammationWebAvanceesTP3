{{ include('header.php', {title: 'Welcome page'}) }}
{# comments #}
<main>
    <h1>Bienvenue!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt rerum beatae eveniet deleniti non, veritatis quod hic reiciendis facere reprehenderit recusandae assumenda sequi dolor vitae incidunt ex tenetur unde accusantium.</p>
    {% if session.privilege == 1 %}
    <div>
    <h1>Logbook</h1>
    <table>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>IP Address</th>
        <th>Visited Page</th>
        <th>Timestamp</th>
    </tr>
    {% for entry in logEntries %}
    <tr>
        <td>{{ entry.id }}</td>
        <td>{{ entry.nom }}</td>
        <td>{{ entry.ip_address }}</td>
        <td>{{ entry.visited_page }}</td>
        <td>{{ entry.timestamp }}</td>
    </tr>
    {% endfor %}
</table>
    </div>
{% endif %}
</main>
</body>

</html>