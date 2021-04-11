@extends('layouts.app')

@section('content')
    <section class="title ">
        <h2>RTP-WEB1</h2>
        <h2>Tableau des endpoints</h2>
    </section>
    <section class="endpoint_table">
        <section class="endpoint title_array">
            <h5 class="type">Type</h5>
            <h5 class="url">URL</h5>
            <h5 class="parametre">Paramètres</h5>
            <h5 class="response">Réponse</h5>
            <h5 class="description">Description</h5>
        </section>
        <section class="endpoint">
            <h5 class="type">POST</h5>
            <h5 class="url">/register</h5>
            <h5 class="parametre">password, username</h5>
            <h5 class="response">201, 400</h5>
            <h5 class="description">Inscription</h5>
        </section>
        <section class="endpoint gray_back">
            <h5 class="type">POST</h5>
            <h5 class="url">/auth</h5>
            <h5 class="parametre">password, username</h5>
            <h5 class="response">200, 400</h5>
            <h5 class="description">Authentification </h5>
        </section>
        <section class="endpoint">
            <h5 class="type">GET</h5>
            <h5 class="url">/species</h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200: JSON Array(Species)</h5>
            <h5 class="description">Afficher toutes les espèces</h5>
        </section>
        <section class="endpoint gray_back">
            <h5 class="type">POST</h5>
            <h5 class="url">/species</h5>
            <h5 class="parametre">name, parent1, parent2, creator</h5>
            <h5 class="response">201, 400</h5>
            <h5 class="description">Créer une espèce</h5>
        </section>
        <section class="endpoint">
            <h5 class="type">PUT</h5>
            <h5 class="url">/species/{id}</h5>
            <h5 class="parametre">name, parent1, parent2, creator</h5>
            <h5 class="response">200, 400</h5>
            <h5 class="description">Modifier une espèce</h5>
        </section>
        <section class="endpoint gray_back">
            <h5 class="type">DELETE</h5>
            <h5 class="url">/species/{id}</h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200, 400</h5>
            <h5 class="description">Supprimer une espèce</h5>
        </section>

        <section class="endpoint">
            <h5 class="type">GET</h5>
            <h5 class="url">/animal </h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200: JSON Array(Animal)</h5>
            <h5 class="description">Afficher tous les animaux</h5>
        </section>
        <section class="endpoint gray_back">
            <h5 class="type">POST</h5>
            <h5 class="url">/animal</h5>
            <h5 class="parametre">species, creator, owner</h5>
            <h5 class="response">201, 400</h5>
            <h5 class="description">Créer un animal</h5>
        </section>
        <section class="endpoint">
            <h5 class="type">PUT</h5>
            <h5 class="url">/animal/{id}</h5>
            <h5 class="parametre">species, creator, owner</h5>
            <h5 class="response">200, 400</h5>
            <h5 class="description">Modifier un animal</h5>
        </section>
        <section class="endpoint gray_back">
            <h5 class="type">DELETE </h5>
            <h5 class="url">/animal/{id}</h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200, 400</h5>
            <h5 class="description">Supprimer un animal</h5>
        </section>

        <section class="endpoint">
            <h5 class="type">GET</h5>
            <h5 class="url">/animal/user/{id}</h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200: JSON Array(Animal)</h5>
            <h5 class="description">Afficher les animaux d'un utilisateur</h5>
        </section>
        <section class="endpoint gray_back">
            <h5 class="type">GET </h5>
            <h5 class="url">/species/user/{id}</h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200: JSON Array(Species)</h5>
            <h5 class="description">Afficher les espèces créées par un utilisateur</h5>
        </section>
        <section class="endpoint">
            <h5 class="type">GET </h5>
            <h5 class="url">/user/animal/{id}</h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200: JSON Array(Users)</h5>
            <h5 class="description">Afficher les utilisateurs qui ont possédé un animal donné</h5>
        </section>
        <section class="endpoint gray_back">
            <h5 class="type">GET</h5>
            <h5 class="url">/point/{x}</h5>
            <h5 class="parametre">*</h5>
            <h5 class="response">200: JSON Array(Users)</h5>
            <h5 class="description">afficher les x utilisateur avec le plus de points</h5>
        </section>
    </section>
@endsection
