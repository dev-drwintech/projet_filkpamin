@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2 style="color: black;">AVIS</h2>

                    <span class="main__title-stat" style="color: black;">{{ formatNumber($reviews->total()) }} Total</span>

                </div>

                @if(session()->has('message'))
                    <div class="alert alert-{{ session('type')}}">
                        {{ session('message') }}
                    </div>
                @endif

            </div>
            <!-- end main title -->

            <!-- users -->
            <div class="col-12">
                <div class="main__table-wrap">
                    <table class="main__table">
                        <thead>
                        <tr>
                            <th>TITRE DE LA VIDÉO</th>
                            <th>NOM D'UTILISATEUR</th>
                            <th>TITRE DE REMARQUE</th>
                            <th>REMARQUE</th>
                            <th>ÉVALUATION</th>
                            <th>CRÉÉ À</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>

                        <tbody id="Tttd">

                        @foreach($reviews as $review)

                            <tr>

                                <td>
                                    <div class="main__table-text">
                                        
                                            {{ $review->video->title }}
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-text">
                                            {{ $review->user->name }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        class="main__table-text">{{ \Illuminate\Support\Str::limit($review->title, 20) }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        class="main__table-text">{{ \Illuminate\Support\Str::limit($review->body, 20) }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        class="main__table-text"><i class="icon ion-ios-star"></i> {{ $review->rating }}
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-text" title="{{ $review->created_at }}">
                                        {{ $review->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-btns">
                                        <a href="{{ route('reviews.show', $review->id) }}" class="main__table-btn main__table-btn--banned">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        <a href="{{ route('reviews.edit', $review->id) }}"
                                           class="main__table-btn main__table-btn--edit">
                                            <i class="icon ion-ios-create"></i>
                                        </a>

                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure to delete data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="main__table-btn main__table-btn--delete">
                                                <i class="icon ion-ios-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end users -->

            <!-- paginator -->
            <div class="col-12">
                <div class="paginator-wrap">
                    @if($reviews->total() > 20)
                        <span>20 à {{ $reviews->total() }}</span>
                    @else
                        <span>{{ $reviews->total() }} à {{ $reviews->total() }}</span>
                    @endif
                    {{ $reviews->links('backend.custom') }}
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
@endsection
