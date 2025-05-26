@extends('backend.layouts.app')

@section('content')
    <style>
        .actor-item {
            background-color: #fff !important;
            color: #000;
            padding: 5px;
            margin: 5px 0;
            font-weight: 850;
            list-style-type: none;
            width: fit-content
        }

        .actor-item button {
            margin-left: 10px;
            color: red;
            font-size: 18px;
            font-weight: 800;
            text-align: center;
            cursor: pointer;
        }

        #actorList {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        #actorList li {
            display: inline-block;
            background-color: #f0f0f0;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 5px;
        }

        #actorList li button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Modification des vidéos</h2>
                </div>

                @if ($errors->any())
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
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('message') }}
                    </div>
                @endif

            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form action="{{ route('videos.update', $video->id) }}" class="form" id="formvideoiedit" method="post"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-7 form__content">
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="col-12">
                                    <h3 style="color:#000">Titre</h3>
                                    <input type="text" class="form__input" name="title" placeholder="Title"
                                        value="{{ $video->title }}">
                                </div>

                                <div class="col-12">
                                    <h3 style="color:#000">Description</h3>
                                    <textarea id="text" name="description" class="form__textarea" placeholder="Description">{{ $video->description }}</textarea>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <h3 style="color:#000">Année de sortie</h3>
                                    <input type="text" name="year" class="form__input" placeholder="Année de sortie"
                                        value="{{ $video->year }}">
                                </div>

                                <div class="col-12 col-sm-6">
                                    <h3 style="color:#000">Durée en minutes</h3>
                                    <input type="text" name="runtime" class="form__input" placeholder="Durée en minutes"
                                        value="{{ $video->runtime }}">
                                </div>

                                <div class="col-12 col-sm-6">
                                    <h3 style="color:#000">Réalisateur(s)</h3>
                                    @php
                                        // Décoder la chaîne JSON externe
                                        $decodedOuterJson = json_decode($video->directors, true);
                                        // Vérifier et décoder la chaîne JSON interne
                                        $directors = isset($decodedOuterJson[0])
                                            ? json_decode($decodedOuterJson[0], true)
                                            : [];
                                    @endphp

                                    @if (is_array($directors))
                                        @foreach ($directors as $director)
                                            <input type="text" name="directors[]" class="form__input col-md-12"
                                                placeholder="Réalisateur" value="{{ $director }}">
                                        @endforeach
                                    @else
                                        <input type="text" name="directors[]" class="form__input col-md-12"
                                            placeholder="Réalisateur" value="">
                                    @endif
                                </div>


                                <div class="col-md-12 mb-3">
                                    <h3 style="color:#000">Acteur(s)</h3>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            @foreach ($video->actors as $actorJson)
                                                 @php
                                                     // Vérifier si le JSON externe est correctement formé et contient des données
                                                     $decodedOuterJson = json_decode($actorJson, true);
                                                     $actors = [];

                                                     // Vérifier si le premier élément du tableau décodé existe et est une chaîne JSON valide
                                                     if (isset($decodedOuterJson[0]) && is_string($decodedOuterJson[0])) {                                                        
                                                             $actors = $decodedOuterJson;
                                                     }else{
                                                        if(is_array($decodedOuterJson[0])){
                                                            $decodedInnerJson = json_decode($decodedOuterJson[0], true);
                                                             $actors = $decodedOuterJson;
                                                        }
                                                    }
                                                 @endphp

                                                 @if (is_array($actors))
                                                     @foreach ($actors as $actor)
                                                         <input type="text" name="actors[]" value="{{ $actor }}" class="form__input actor-input" placeholder="Acteurs">
                                                     @endforeach
                                                 @else
                                                     <input type="text" name="actors[]" class="form__input actor-input" placeholder="Acteurs">
                                                 @endif
                                             @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h3 style="color: #000">Sélectionner la catégorie</h3>
                            @foreach (json_decode($video->genres) as $genre)
                                <select class="form__input" id="genreSelect" name="genres[]">
                                        </option>
                                        <option value="action" {{ $genre == 'action' ? 'selected' : '' }}
                                            {{ old('genres') == 'action' ? 'selected' : '' }}>Action
                                        </option>
                                        <option value="comedie" {{ $genre == 'comedie' ? 'selected' : '' }}
                                            {{ old('genres') == 'comedie' ? 'selected' : '' }}>Comédie
                                        </option>
                                        <option value="drame" {{ $genre == 'drame' ? 'selected' : '' }}
                                            {{ old('genres') == 'drame' ? 'selected' : '' }}>Drame</option>
                                        <option value="science fiction" {{ $genre == 'science fiction' ? 'selected' : '' }}
                                            {{ old('genres') == 'science_fiction' ? 'selected' : '' }}>Science-fiction
                                        </option>
                                        <option value="horreur" {{ $genre == 'horreur' ? 'selected' : '' }}
                                            {{ old('genres') == 'horreur' ? 'selected' : '' }}>Horreur
                                        </option>
                                        <option value="animation" {{ $genre == 'animation' ? 'selected' : '' }}
                                            {{ old('genres') == 'animation' ? 'selected' : '' }}>
                                            Animation</option>
                                        <option value="romance" {{ $genre == 'romance' ? 'selected' : '' }}
                                            {{ old('genres') == 'romance' ? 'selected' : '' }}>Romance
                                        </option>
                                        <option value="aventure" {{ $genre == 'aventure' ? 'selected' : '' }}
                                            {{ old('genres') == 'aventure' ? 'selected' : '' }}>Aventure
                                        </option>
                                        <option value="serie_mystere" {{ $genre == 'serie_mystere' ? 'selected' : '' }}
                                            {{ old('genres') == 'serie_mystere' ? 'selected' : '' }}>
                                            Mystère</option>
                                </select>
                            @endforeach
                        </div>

                        <div class="col-12">
                            <h3 style="color: #000;">Télécharger une autre image de couverture</h3>
                            <input type="file" name="photos" class="form__input" id="imageinput" placeholder="Image">
                        </div>
                        <div class="mb-3 mt-3 image-container">
                            <h3 class="" style="color: #000; font-weight:600;">
                                @if ($video->type == 'Films')
                                    L'image du
                                    {{ $video->type }}
                                    {{ $video->title }}
                                @else
                                    L'image de la
                                    {{ $video->type }}
                                    {{ $video->title }}
                                @endif
                            </h3>
                            <img src="{{ asset('storage/' . $video->photos) }}" alt="{{ $video->title }}">
                        </div>


                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <h3 style="color: #000;">Télécharger un demo</h3>
                                    <input type="file" multiple name="demo" id="videoInput" class="form__input"
                                        placeholder="Videos">
                                    <p id="fileLimitMessage" style="color: red; display: none;">Vous ne pouvez
                                        télécharger
                                        que jusqu'à 3 vidéos.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <h3 style="color: #000;">Télécharger une autre vidéo à la place</h3>
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
                        </div>
                        <div class="mb-3 mt-3 video-container">
                            <div class="mb-5">
                                <h3 class="" style="color: #000; font-weight:600;margin-bottom:5px;">
                                    @if ($video->type == 'Films')
                                        Visualisation du
                                        {{ $video->type }}
                                        {{ $video->title }}
                                    @else
                                        Visualisation de la
                                        {{ $video->type }}
                                        {{ $video->title }}
                                    @endif
                                </h3>
                            </div>
                            <video controls controlsList="nodownload">
                                <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                            </video>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="form__radio">
                                        <li>
                                            <span>Type:</span>
                                        </li>
                                        <li>
                                            <input id="type1" type="radio" name="type"
                                                {{ $video->type == 'Films' ? 'checked' : '' }} value="Films"
                                                {{ old('type') == 'Films' ? 'checked' : '' }}>
                                            <label for="type1">Film</label>
                                        </li>
                                        <li>
                                            <input id="type2" type="radio" name="type"
                                                {{ $video->type == 'Series' ? 'checked' : '' }} value="Serie"
                                                {{ old('type') == 'Series' ? 'checked' : '' }}>
                                            <label for="type2">TV Séries</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="form__radio">
                                        <li>
                                            <span>Status:</span>
                                        </li>
                                        <li>
                                            <input id="status1" type="radio" name="status"
                                                {{ $video->status == '1' ? 'checked' : '' }} value="1"
                                                {{ old('status') == '1' ? 'checked' : '' }}>
                                            <label for="status1">Publié</label>
                                        </li>
                                        <li>
                                            <input id="status2" type="radio" name="status"
                                                {{ $video->status == '0' ? 'checked' : '' }} value="0"
                                                {{ old('status') == '0' ? 'checked' : '' }}>
                                            <label for="status2">Non publié</label>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="form__btn" id="uploadButton">Modifier</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <!-- end form -->
    </div>
    </div>
    <script>
        // Limite upload
        document.getElementById('uploadButton').addEventListener('click', function(e) {
            e.preventDefault();
            var fileInput = document.getElementById('videoInput');

            if (fileInput.value !== '') {
                var fileInput = document.getElementById('videoInput');
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

                    // Simulate file upload progress
                    var progress = 0;
                    var interval = setInterval(function() {
                        if (progress < 100) {
                            progress += 10; // Increment the progress
                            progressBar.value = progress;
                            progressText.textContent = progress + '%';
                        } else {
                            clearInterval(interval);
                            console.log('Téléchargement terminé!');
                            progressContainer.style.display = 'none';
                            progressContainer.style.BackgroundColor = 'yellow';
                            progressBar.value = 0;
                            progressText.textContent = '0%';
                            document.getElementById('formvideoiedit').submit();
                        }
                    }, 500); // Simulate progress every 500ms
                }
            } else {
                document.getElementById('formvideoiedit').submit();
            }
        });
    </script>
@endsection
