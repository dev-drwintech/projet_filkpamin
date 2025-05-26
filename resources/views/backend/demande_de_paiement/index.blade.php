@extends('backend.layouts.app')

@section('content')
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    a {
        text-decoration: none;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- main title -->
        <div class="col-12">
            <div class="main__title">
                <h2 style="color: black;">Demande de paiement en attente de validation</h2>

                <span class="main__title-stat" style="color: black;">{{ $demandePaiement->total() }} Total</span>

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
                            <th>PARTENAIRE</th>
                            <th>TITULAIRE DU COMPTE</th>
                            <!-- <th>NUMERO DU COMPTE</th>
                            <th>METHODE DE PAIEMENT</th> -->
                            <th>MONTANT</th>
                            <th>SOLDE</th>
                            <th>STATUT</th>
                            <th>DATE DE LA DEMANDE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody id="Tttd">

                        @forelse($demandePaiement as $demande)
                        <tr>

                            <td>
                                <div class="main__table-text">{{ $demande->user->name ?? 'N/A' }}</div>
                            </td>
                            <!-- <td>
                                <div class="main__table-text"> -->
                                    @php
                                    $details = json_decode($demande->parametreRetrait->details, true);
                                    @endphp

                                    <!-- @if (isset($details['nom']))
                                    {{ $details['nom'] }}
                                    @elseif (isset($details['nom_titulaire']))
                                    {{ $details['nom_titulaire'] }}
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="main__table-text">
                                    
                                    @if (isset($details['numero_compte']))
                                    {{ $details['numero_compte'] }}
                                    @elseif (isset($details['numero_compte_ou_iban']))
                                    {{ $details['numero_compte_ou_iban'] }}
                                    @endif
                                </div>
                            </td> -->
                            <td>
                                <div class="main__table-text">{{ $demande->parametreRetrait ? $demande->parametreRetrait->type_de_paiement : 'N/A' }}</div>
                            </td>
                            <td>
                                <div class="main__table-text">{{ $demande->montant }}</div>
                            </td>
                            <td>
                                <div class="main__table-text">{{ $demande->portefeuille->solde }}</div>
                            </td>
                            <td>
                                <div class="main__table-text @if($demande->status == 0) main__table-text--red"> En attente @endif</div>
                            </td>
                            <td>
                                <div class="main__table-text" title="{{ $demande->created_at }}">{{ $demande->created_at->diffForHumans() }}</div>
                            </td>
                            <td>
                                <div class="main__table-btns">
                                    
                                    @if ( $demande->parametreRetrait->type_de_paiement == 'virement_bancaire' )
                                        <div data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                                            <a class="main__table-btn main__table-btn--view"> 
                                                <i class="icon ion-ios-eye" style="color:white;"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <a class="main__table-btn main__table-btn--view"> 
                                                <i class="icon ion-ios-eye" style="color:white;"></i>
                                            </a>
                                        </div>
                                    @endif
                                    &emsp;<button class="btn btn-primary">
                                        <a href="{{ route('admin.accepterRetrait', $demande->id) }}" style="color: white; font-size: 16px;">Approuver</a>
                                    </button>
                                </div>

                                <!-- Modal for virement bancaire  -->
                                <style>
                                    /* .custom-placeholder::placeholder {
                                        color: #ff660080;
                                        font-weight: 700;
                                    } */

                                    .flex {
                                        display: flex;
                                    }

                                    .modal-header {
                                        display: inline-block;
                                    }

                                    #btn-close {
                                        margin-left: 440px;
                                        margin-bottom: 40px;
                                    }

                                    .modal {
                                        align-items: center;
                                        margin-left: 500px;
                                    }

                                </style>
                                @if ( $demande->parametreRetrait->type_de_paiement == 'virement_bancaire' )
                                <div class="">
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    &emsp;<button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="flex">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Retrait par Virement bancaire</h5>
                                                        &emsp;&emsp;
                                                        <span>
                                                            <input style="text-align: center; font-weight:800" type="text"
                                                                class="form-control {{ $demande->portefeuille->solde > 0 ? 'text-success' : 'text-danger' }}"
                                                                value="Solde: {{ $demande->portefeuille->solde }} Fcfa" disabled>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="GET" action="{{ route('admin.accepterRetrait', $demande->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="type_de_paiement"
                                                            value="virement_bancaire">
                                                        <div class="mb-3">
                                                            <label
                                                                class="col-form-label">Montant de
                                                                retrait</label>
                                                            <input type="number"
                                                                class="form-control custom-placeholder" placeholder="{{ $demande->montant }} Fcfa">
                                                        </div>
                                                        <fieldset disabled>
                                                            <legend>Vos informations bancaires</legend>
                                                            <div class="mb-3">
                                                                <label class="form-label">Nom du titulaire du
                                                                    compte</label>
                                                                <input type="text"
                                                                    class="form-control custom-placeholder"
                                                                    value="{{ $details['nom_titulaire'] }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Nom de la
                                                                    banque</label>
                                                                <input type="text"
                                                                    class="form-control custom-placeholder"
                                                                    value="{{ $details['nom_de_banque'] }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Numéro de compte /
                                                                    IBAN</label>
                                                                <input type="text"
                                                                    class="form-control custom-placeholder"
                                                                    value="{{ $details['numero_compte_ou_iban'] }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Code SWIFT /
                                                                    BIC</label>
                                                                <input type="text"
                                                                    class="form-control custom-placeholder"
                                                                    value="{{ $details['code_swift_ou_bic'] }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Pays de la
                                                                    banque</label>
                                                                <input type="text"
                                                                    class="form-control custom-placeholder"
                                                                    value="{{ $details['pays'] }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Adresse de la banque
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control custom-placeholder"
                                                                    value="{{ $details['Adresse_banque'] }}">
                                                            </div>
                                                        </fieldset>
                            
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Approuver</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <!-- Modal for mobile transaction -->
                                <div class="">
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="flex">
                                                    @if($demande->parametreRetrait->type_de_paiement == 'Mobile Money')
                                                        <h6 class="modal-title" id="mobileModalLabel">Retrait
                                                           par Mobile Money</h6>
                                                    @endif
                                                    @if($demande->parametreRetrait->type_de_paiement == 'Moov Money')
                                                        <h6 class="modal-title" id="mobileModalLabel">Retrait
                                                           par Moov Money</h6>
                                                    @endif
                                                    @if($demande->parametreRetrait->type_de_paiement == 'Celtiis Cash')
                                                        <h6 class="modal-title" id="mobileModalLabel">Retrait
                                                           par Celtis Cash</h6>
                                                    @endif
                                                    <span style="margin-left:120px;">
                                                        <input style="text-align: center; font-weight:800"
                                                            type="text"
                                                            class="form-control {{ $demande->portefeuille->solde > 0 ? 'text-success' : 'text-danger' }}"
                                                            value="Solde: {{ $demande->portefeuille->solde }} Fcfa" disabled>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <form method="GET" action="{{ route('admin.accepterRetrait', $demande->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="type_de_paiement"
                                                        value="{{ $demande->parametreRetrait->type_paiement}}">
                                                    <div class="mb-3">
                                                        <label
                                                            class="col-form-label">Montant de
                                                            retrait</label>
                                                        <input type="number"
                                                            class="form-control custom-placeholder" placeholder="{{ $demande->montant }} Fcfa">
                                                    </div>
                                                    <fieldset disabled>
                                                        <legend>Vos informations de retrait</legend>
                                                        <div class="mb-3">
                                                            <label class="form-label">Numéro du compte
                                                                Mobile Money</label>
                                                            <input type="text"
                                                                class="form-control custom-placeholder"
                                                                placeholder="(+229) {{ $details['numero_compte'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label custom-placeholder">Nom
                                                                et Prénom</label>
                                                            <input type="text"
                                                                class="form-control custom-placeholder"
                                                                placeholder="{{ $details['nom'] }}">
                                                        </div>
                                                    </fieldset>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary">Approuver</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="main__table-text"> Aucune demande de paiement en attente de validation. </div>
                            </td>
                        </tr>    
                        @endforelse
                    </tbody>
                </table>
                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
        </div>
        <!-- end users -->

        <!-- paginator -->
        <div class="col-12">
            <div class="paginator-wrap">
                @if($demandePaiement->total() > 20)
                <span>20 à {{ $demandePaiement->total() }}</span>
                @else
                <span>{{ $demandePaiement->total() }} à {{ $demandePaiement->total() }}</span>
                @endif
                {{ $demandePaiement->links('backend.custom') }}
            </div>
        </div>
        <!-- end paginator -->
    </div>
    
</div>

@endsection