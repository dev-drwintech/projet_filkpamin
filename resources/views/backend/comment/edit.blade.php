@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Modifier le commentaire</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @if($errors->count() === 1)
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

                @if(session()->has('message'))
                    <div class="alert alert-{{ session('type')}}">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form action="{{ route('comments.update', $comment->id) }}" class="form" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-7 form__content">
                            <div class="row">
                                <div class="col-12">
                                    <label for="commentText" class="profile__label">Texte du commentaire</label>
                                    <textarea id="commentText" name="comment_text" class="form__textarea"
                                              placeholder="Texte du commentaire">{{ $comment->comment_text }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="form__btn">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end form -->
        </div>
    </div>
@endsection
