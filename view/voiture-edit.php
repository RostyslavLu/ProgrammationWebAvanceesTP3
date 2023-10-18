{{ include('header.php', {title: 'Modifier voiture'}) }}
    <main>
        <form action="{{path}}voiture/update" method="post" enctype="multipart/form-data">
            <fieldset>
                <input type="hidden" name="id" value="{{voiture.id}}">
                <label >Année fabrication:
                    <input type="number" name="annee" value="{{voiture.annee}}">
                </label>
                <label >Prix par jour:
                    <input type="number" name="prix_par_jour" value="{{voiture.prix_par_jour}}">
                </label>
                <label >Disponibilité:
                    {% if voiture.disponible == 1 %}
                    <select name="disponible">
                        <option value="1" selected>Oui</option>
                        <option value="0" >Non</option>
                    </select>
        
                    {% else %}
                    <select name="disponible">
                        <option value="1">Oui</option>
                        <option value="0" selected>Non</option>
                    </select>
                    {% endif %}
                </label>
                <label>Photo</label>
                <input type="file" name="photo" accept="image/*">
                <label> Marque:
                    <select name="marque_id">
                        <option selected></option>
                        {% for marque in marques %}
                        <option value="{{ marque.id }}" {% if marque.id == voiture.marque_id %} selected {% endif %}>{{ marque.nom }}</option>
                        {% endfor %}
                    </select>
                </label>
                {% if session.privilege == 1 %}
                <input class="bouton" type="submit" value="Modifier">
                {% endif %}
        
        </form>
        {% if session.privilege == 1 %}
        <form action="{{path}}voiture/destroy" method="post">
            <input  type="hidden" name="id" value="{{voiture.id}}">
            <input class="bouton" type="submit" value="Effacer">
        </form>
        {% endif %}
        </fieldset>
    </main>
</body>
</html>