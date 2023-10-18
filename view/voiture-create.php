{{ include('header.php', {title: 'Create voiture'}) }}
    <main>
        <form action="{{path}}voiture/store" method="post" enctype="multipart/form-data">
            <fieldset>
                <label>Année fabrication:
                    <input type="number" name="annee">
                </label>
                <label >Prix par jour:
                    <input type="number" name="prix_par_jour">
                </label>
                <label >Disponibilité:
                    <select name="disponible" >
                        <option></option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </label>
                <label>Marque
                <label>Photo</label>
                <input type="file" name="photo" >
                {# envoyer des données #}        
                    <select name="marque_id">
                        <option></option>
                        {% for marque in marques %}
                        <option value="{{ marque.id }}">{{ marque.nom }}</option>
                        {% endfor %}
                    </select>
                    
                </label>
                <a href="{{path}}marque/create">Ajouter marque de voiture</a>
                <input type="submit" value="Enregistrer">
            </fieldset>
        </form>
    </main>
</body>
</html>