<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ path }}assets/css/style.css">
    <title>{{ title }}</title>
</head>
<body>
    <div>
        <span>Hello</span>
        {% if guest %}
        <span>guest!</span>
        {% else %}
        <span>{{ session.user_nom }}!</span>
        {% endif %}
    </div>
    <nav>
        <a href="{{ path }}">Accueil</a>
        <div class="menu-deroulant">
            <a href="">Voiture</a>
            <div>
                <a href="{{ path }}voiture">Liste des voitures</a>
                {% if session.privilege ==1 %}
                <a href="{{ path }}voiture/create">Ajouter une voiture</a>
                {% endif %}
            </div>
        </div>
        {% if session.privilege ==1 %}
        <div class="menu-deroulant">
            <a href="">Client</a>
            <div>
                <a href="{{ path }}client">Liste des clients</a>
                
                <a href="{{ path }}client/create">Ajouter un client</a>
                
            </div>
        </div>
        {% endif %}
        <div class="menu-deroulant">
            <a href="">Connexion</a>
            <div>
            {% if guest %}
                <a href="{{ path }}user/create">S'inscrir</a>
                <a href="{{ path }}login">Se connecter</a>
            {% else %}
                <a href="{{ path }}login/logout">Quitter</a>
            {% endif %}
            </div>
        </div>
    </nav>