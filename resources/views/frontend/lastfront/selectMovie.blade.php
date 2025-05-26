@extends('frontend.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .md_header {
            width: 100%;
            height: 90%;
            background: url('{{ asset('ImgePecial/Background.png') }}');

        }
    </style>
@endsection

@section('content')
    <!-- details -->
    <section class="md_header">
        @include('frontend.partials._header')
    </section>
    <div class="container p-4 mt-3">
        <section class="md_descript ">
            Mercredi Addams, une adolescente qui possède des pouvoirs psychiques. La personnalité froide et sans émotion de
            Mercredi et sa nature provocante lui rendent difficile la connexion avec ses camarades de classe et l'amènent à se
            heurter à la directrice de l'école, Larissa Weems. Cependant, elle découvre qu'elle a hérité des capacités
            psychiques de sa mère qui lui permettent de résoudre un mystère de meurtre local.
        </section>
        <p class="mt-3 md_casting">
            Casting
        </p>
    </div>

@section('styles')
    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tube.css') }}">
@endsection

@push('javascripts')
@endpush
