{{ include('header.php', {title: 'Login'}) }}
    <form action="{{path}}login/auth" method="post">
        {% if errors is defined %}
        <span class="error">{{errors|raw}}</span>
        {% endif %}
        <fieldset>

            <label for="">User name:
                <input type="email" name="username" value="{{data.username}}">
            </label>
            <label for="">Password:
                <input type="password" name="password" value="{{data.password}}">
            </label>

            <input type="submit" value="Login">  
        </fieldset>
    </form>
</body>
</html>