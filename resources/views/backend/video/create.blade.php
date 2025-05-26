@extends('backend.layouts.app')

@push('styles')
<style>
    .progress,
    video {
        display: none;
    }

    .progress {
        height: 25px;
        background-color: #f0f0f0;
        border-radius: 5px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        background-color: #007bff;
        color: black;
        text-align: center;
        line-height: 25px;
        font-weight: bold;
    }

    .progress-bar.progress-bar-striped {
        background: repeating-linear-gradient(45deg,
                #007bff,
                #007bff 10px,
                #0056b3 10px,
                #0056b3 20px);
        background-size: 200% 100%;
        animation: move 2s linear infinite;
    }

    @keyframes move {
        0% {
            background-position: 200% 0;
        }

        100% {
            background-position: -200% 0;
        }
    }

    option {
        background: white;
    }

    #actorList,
    #directorList {
        list-style-type: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
    }

    #actorList li,
    #directorList li {
        display: inline-block;
        background-color: #f0f0f0;
        padding: 5px 10px;
        margin: 5px;
        border-radius: 5px;
    }

    #actorList li button,
    #directorList li button {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .button_ajouter {
        background-color: #007bff;
        color: #f0f0f0;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .button_ajouter span {
        font-size: 1.3em;
        color: #f0f0f0;
    }

    .actor-item,
    .director-item {
        background-color: #ddd !important;
        color: #000;
        padding: 5px;
        margin: 5px 0;
        font-weight: 850;
        list-style-type: none;
    }

    .actor-item button,
    .director-item button {
        margin-left: 10px;
        color: red;
        font-size: 18px;
        font-weight: 800;
        text-align: center;
        cursor: pointer;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- titre principal -->
        <div class="col-12">
            <div class="main__title">
                <h2 style="color:black;">Ajouter un(e) film/série</h2>
            </div>
        </div>
        <!-- fin titre principal -->

        @if ($errors->any())
        <div class="col-12">
            <div class="alert alert-danger">
                @if ($errors->count() === 1)
                <li>{{ $errors->first() }}</li>
                @else
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        @endif

        @if (session()->has('message'))
        <div class="col-12">
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        </div>
        @endif

        {{-- @if (session('messagevideos'))
    <div class="alert alert-danger">
        {{ session('messagevideos') }}
    </div>
    @else
    <h1 class="alert alert-info" style="color:black;">il y a pas de requete ici</h1>
    @endif --}}


    <!-- formulaire -->
    <div class="col-12">
        <form action="{{ route('videos.store') }}" class="form" method="post" id="formvideo"
            enctype="multipart/form-data" style="border: 1px solid white;">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form__input" name="title" placeholder="Titre"
                                value="{{ old('title') }}">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form__input" name="slug" placeholder="Slug"
                                value="{{ old('slug') }}">
                        </div>

                        <div class="col-12">
                            <textarea id="text" name="description" class="form__textarea" placeholder="Description">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-12 col-sm-6">
                            <input type="text" name="runtime" class="form__input" placeholder="Durée en minutes"
                                value="{{ old('runtime') }}">
                        </div>

                        <div class="col-12 col-sm-6">
                            <input type="text" name="year" class="form__input" placeholder="Année de sortie"
                                value="{{ old('year') }}">
                        </div>

                        <div class="col-12">
                            <h3 style="color: #000">Sélectionner la catégorie</h3>
                            <select class="form__input" id="genreSelect" name="genres[]">
                                <option value="action" {{ old('genres') == 'action' ? 'selected' : '' }}>Action
                                </option>
                                <option value="drame" {{ old('genres') == 'drame' ? 'selected' : '' }}>Drame
                                </option>
                                <option value="horreur" {{ old('genres') == 'horreur' ? 'selected' : '' }}>
                                    Horreur</option>
                                <option value="comedie" {{ old('genres') == 'comedie' ? 'selected' : '' }}>
                                    Comédie</option>
                                <option value="science fiction"
                                    {{ old('genres') == 'science fiction' ? 'selected' : '' }}>Science-fiction
                                </option>
                                <option value="animation" {{ old('genres') == 'animation' ? 'selected' : '' }}>
                                    Animation</option>
                                <option value="romance" {{ old('genres') == 'romance' ? 'selected' : '' }}>
                                    Romance</option>
                                <option value="aventure" {{ old('genres') == 'aventure' ? 'selected' : '' }}>
                                    Aventure</option>
                                <option value="mystere"
                                    {{ old('genres') == 'serie_mystere' ? 'selected' : '' }}>Mystère</option>
                            </select>
                        </div>


                    </div>
                    <div class="container-fluid">
                        <!-- Autres éléments HTML existants ... -->

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-12 d-flex">
                                    <input type="text" id="directorInput" class="form__input"
                                        placeholder="Réalisateur"> <!-- Changer l'identifiant -->
                                    <button type="button" class="btn btn-outline-warning col-md-2 p-0 mx-2"
                                        id="addRealisaButton" style="height:45px">Ajouter</button>
                                    <!-- Changer l'identifiant -->
                                </div>
                                <input type="hidden" name="directors[]" id="directorsHiddenInput" value="">
                                <!-- Changer l'identifiant -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul id="directorList"></ul> <!-- Changer l'identifiant -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-12 d-flex">
                                    <input type="text" id="actorInput" class="form__input"
                                        placeholder="Acteurs"> <!-- Changer l'identifiant -->
                                    <button type="button" class="btn btn-outline-warning col-md-2 p-0 mx-2"
                                        id="addActorButton" style="height:45px">Ajouter</button>
                                    <!-- Changer l'identifiant -->
                                </div>
                                <input type="hidden" name="actors[]" id="actorsHiddenInput" value="">
                                <!-- Changer l'identifiant -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul id="actorList"></ul> <!-- Changer l'identifiant -->
                                </div>
                            </div>
                        </div>

                        <!-- Autres éléments HTML existants ... -->
                    </div>


                    <div class="col-12">
                        <h3 style="color: #000;">Image de couverture</h3>
                        <input type="file" name="photos" class="form__input" id="imageinput"
                            placeholder="Image">
                    </div>
                    <div class="col-12 mt-3 mb-3">
                        <h3 style="color: #000;">Télécharger La demo </h3>
                        <input type="file" multiple name="demo" id="videoInput" class="form__input"
                            placeholder="Videos">
                        <p id="fileLimitMessage" style="color: red; display: none;">Vous ne pouvez
                            télécharger
                            que jusqu'à 3 vidéos.</p>
                    </div>
                    <div class="col-12 mt-3 mb-3">
                        <h3 style="color: #000;">Télécharger une vidéo </h3>
                        <input type="file" multiple name="video" id="videoInput" class="form__input"
                            placeholder="Videos">
                        <p id="fileLimitMessage" style="color: red; display: none;">Vous ne pouvez
                            télécharger
                            que jusqu'à 3 vidéos.</p>
                        <div id="progressContainer" class="mb-1 mt-1" style="display: none;">
                            <progress id="progressBar" value="0" max="100"
                                style="width: 100%;"></progress>
                            <span id="progressText">0%</span>
                        </div>
                        {{-- <button type="button" class="btn btn-warning" >Télécharger</button> --}}
                    </div>


                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="form__radio">
                                <li>
                                    <span style="color:black;">Type:</span>
                                </li>
                                <li>
                                    <input id="type1" type="radio" name="type" value="Films"
                                        {{ old('type') == 'Films' ? 'checked' : '' }}>
                                    <label for="type1" style="color:black;">Film</label>
                                </li>
                                <li>
                                    <input id="type2" type="radio" name="type" value="Serie"
                                        {{ old('type') == 'Series' ? 'checked' : '' }}>
                                    <label for="type2" style="color:black;">TV Séries</label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="form__radio">
                                <li>
                                    <span style="color:black;">Status:</span>
                                </li>
                                <li>
                                    <input id="status1" type="radio" name="status" value="1"
                                        {{ old('status') == '1' ? 'checked' : '' }}>
                                    <label for="status1" style="color:black;">Publié</label>
                                </li>
                                <li>
                                    <input id="status2" type="radio" name="status" value="0"
                                        {{ old('status') == '0' ? 'checked' : '' }}>
                                    <label for="status2" style="color:black;">Non publié</label>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <video controls id="video" width="400" style="margin: 20px auto;">
                    <source src="" id="video_here" style="color:black;">
                    Votre navigateur ne supporte pas les vidéos HTML5.
                </video>
            </div>

            <div class="col-12">
                <button type="submit" class="form__btn" id="uploadButton">Publier</button>
            </div>
    </div>
    </form>
</div>
<!-- fin formulaire -->
</div>
</div>
<script>
    // Limite upload
    document.getElementById('uploadButton').addEventListener('click', function(e) {
        e.preventDefault();
        var fileInput = document.getElementById('videoInput');
        if (fileInput.value !== '') {
            var maxFiles = 3;
            var fileLimitMessage = document.getElementById('fileLimitMessage');
            var progressContainer = document.getElementById('progressContainer');
            var progressBar = document.getElementById('progressBar');
            var progressText = document.getElementById('progressText');

            if (fileInput.files.length > maxFiles) {
                fileLimitMessage.style.display = 'block';
                fileInput.value = ''; // Clear the input
            } else {
                fileLimitMessage.style.display = 'none';
                progressContainer.style.display = 'block';

                var formData = new FormData();
                for (var i = 0; i < fileInput.files.length; i++) {
                    formData.append('videos[]', fileInput.files[i]);
                }

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Add CSRF token
                xhr.upload.onprogress = function(event) {
                    if (event.lengthComputable) {
                        var percentComplete = Math.round((event.loaded / event.total) * 100);
                        progressBar.value = percentComplete;
                        progressText.textContent = percentComplete + '%';
                    }
                };

                xhr.onload = function() {
                    if (xhr) {
                        console.log('Téléchargement terminé!');
                        progressContainer.style.display = 'none';
                        progressBar.value = 0;
                        progressText.textContent = '0%';
                    } else {
                        console.log('Erreur lors du téléchargement.');
                    }
                };

                xhr.onerror = function() {
                    console.log('Erreur lors de la connexion.');
                };

                xhr.send(formData);
            }
            document.getElementById('formvideo').submit();
        }
    });

    // Ajouter un réalisateur
    document.getElementById('addRealisaButton').addEventListener('click', function() {
        var directorInput = document.getElementById('directorInput'); // Changer l'identifiant
        var directorList = document.getElementById('directorList'); // Changer l'identifiant
        var directorsHiddenInput = document.getElementById('directorsHiddenInput'); // Changer l'identifiant

        if (directorInput.value.trim() !== '') {
            var listItem = document.createElement('li');
            listItem.textContent = directorInput.value.trim();
            listItem.classList.add('director-item');

            // Créez un bouton de suppression pour chaque réalisateur
            var removeButton = document.createElement('button');
            removeButton.textContent = 'x';
            removeButton.addEventListener('click', function() {
                listItem.remove();
                updateHiddenDirectorsInput(); // Changer la fonction
            });
            listItem.appendChild(removeButton);

            directorList.appendChild(listItem);
            updateHiddenDirectorsInput(); // Changer la fonction
            directorInput.value = '';
        }
    });

    // Mise à jour de l'entrée masquée pour les réalisateurs
    function updateHiddenDirectorsInput() {
        var directorList = document.getElementById('directorList'); // Changer l'identifiant
        var directorsHiddenInput = document.getElementById('directorsHiddenInput'); // Changer l'identifiant
        var directors = [];

        directorList.querySelectorAll('li').forEach(function(listItem) {
            directors.push(listItem.firstChild.textContent);
        });

        directorsHiddenInput.value = JSON.stringify(directors);
    }

    // Ajouter un acteur
    document.getElementById('addActorButton').addEventListener('click', function() {
        var actorInput = document.getElementById('actorInput'); // Changer l'identifiant
        var actorList = document.getElementById('actorList');
        var actorsHiddenInput = document.getElementById('actorsHiddenInput');

        if (actorInput.value.trim() !== '') {
            var listItem = document.createElement('li');
            listItem.textContent = actorInput.value.trim();
            listItem.classList.add('actor-item');

            // Créez un bouton de suppression pour chaque acteur
            var removeButton = document.createElement('button');
            removeButton.textContent = 'x';
            removeButton.addEventListener('click', function() {
                listItem.remove();
                updateHiddenActorsInput();
            });
            listItem.appendChild(removeButton);

            actorList.appendChild(listItem);
            updateHiddenActorsInput();
            actorInput.value = '';
        }
    });

    // Mise à jour de l'entrée masquée pour les acteurs
    function updateHiddenActorsInput() {
        var actorList = document.getElementById('actorList');
        var actorsHiddenInput = document.getElementById('actorsHiddenInput');
        var actors = [];

        actorList.querySelectorAll('li').forEach(function(listItem) {
            actors.push(listItem.firstChild.textContent);
        });

        actorsHiddenInput.value = JSON.stringify(actors);
    }
</script>
@endsection