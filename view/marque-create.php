{{ include('header.php', {title: 'Create marque'}) }}
    <main>
        {% if session.privilege == 1 %}
        <form action="{{path}}marque/store" method="post">
            <fieldset>
                <label>Marque nom:
                    <input type="text" name="nom">
                </label>
 
                <input type="submit" value="Enregistrer">
            </fieldset>
        </form>
        {% endif %}
    </main>
</body>
</html>