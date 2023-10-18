{{ include('header.php', {title: 'Edit client'}) }}
    <main>
        <form action="{{path}}client/update" method="post">
            <fieldset>
                <input type="hidden" name="id" value="{{client.id}}">
                <label for="nom">Nom:
                    <input type="text" name="nom" value="{{client.nom}}">
                </label>
                <label for="">Adresse:
                    <input type="text" name="addresse" value="{{client.addresse}}">
                </label>
                <label for="">Courriel:
                    <input type="email" name="courriel" value="{{client.courriel}}">
                </label>
                <label for="">Phone:
                    <input type="text" name="phone" value="{{client.phone}}">
                </label>
                <label>
                    <select name="ville_id">
                        <option selected></option>
                        {% for ville in villes %}
                        <option value="{{ ville.id }}" {% if ville.id == client.ville_id %} selected {% endif %}>{{ ville.ville }}</option>
                        {% endfor %}
                    </select>
                </label>
                <input class="bouton" type="submit" value="Modifier">
        </form>
        <form action="{{path}}client/destroy" method="post">
            <input type="hidden" name="id" value="{{client.id}}">
            <input class="bouton" type="submit" value="Effacer">
        </form>
        </fieldset>
    </main>
</body>
</html>