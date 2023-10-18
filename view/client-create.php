{{ include('header.php', {title: 'Create client'}) }}
    <main>
        <form action="{{path}}client/store" method="post">
            <fieldset>
                <label>Nom:
                    <input type="text" name="nom">
                </label>
                <label >Adresse:
                    <input type="text" name="addresse">
                </label>
                <label >Courriel:
                    <input type="email" name="courriel">
                </label>
                <label >Phone:
                    <input type="text" name="phone">
                </label>
                <label>
                    <select name="ville_id">
                        <option></option>
                        {% for ville in villes %}
                        <option value="{{ ville.id }}">{{ ville.ville }}</option>
                        {% endfor %}
                    </select>
                </label>
                <input class="bouton" type="submit" value="Save">
            </fieldset>
        </form>
    </main>
</body>
</html>