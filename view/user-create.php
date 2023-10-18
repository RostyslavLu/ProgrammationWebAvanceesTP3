{{ include('header.php', {title: 'Create user'}) }}
    <form action="{{path}}user/store" method="post">
        {% if errors is defined %}
        <span class="error">{{errors|raw}}</span>
        {% endif %}
        <fieldset>
            <label for="nom">Nom:
                <input type="text" name="nom" value="{{data.nom}}"> 
            </label>
            <label for="">User name:
                <input type="email" name="username" value="{{data.username}}">
            </label>
            <label for="">Password:
                <input type="password" name="password" value="{{data.password}}">
            </label>

            <label>
                
                <select name="privilege_id">
                    {% for privilege in privileges %}
                    <option value="{{ privilege.id }}" {% if privilege.id == data.privilege_id %} selected {% endif %}>{{ privilege.privilege }} </option>
                    {% endfor %}
                </select>
                
            </label> 
            <input type="submit" value="Save">  
        </fieldset>
    </form>
</body>
</html>