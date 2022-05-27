@extends('layouts.app')

@section('title')
    Vota!
@endsection

@section('content')
    @php
    $debug = request()->has('debug');
    @endphp
    <div class="container ">
        <div class="row justify-content-md-center" >
            <form id="form" method="POST" action="{{ route('vota') }}">
                @csrf
                <div class="row justify-content-md-center">
                    <h4 class="col text-center">Voto valido: 1 o 2 preferenze</h4>
                </div>
                <div class="row justify-content-md-center">
                    <h4 class="col text-center">Astensione: 0 preferenze</h4>
                </div>
                <div class="row justify-content-md-center">
                    <h4 class="col text-center">Voto nullo: più di 2 preferenze</h4>
                </div>
                <div class="row">
                    <div class="col-sm mt-5 mb-5">
                        <input type="hidden" id="voteCode" name="voteCode" value="">
                        @foreach ($candidati as $candidato)
                            @if ($candidato->ID >=2 )
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="votati[]"
                                        id="{{ $candidato->ID }}" value={{ $candidato->ID }}>
                                    <h4>
                                        <label class="form-check-label" for="{{ $candidato->ID }}">
                                            {{ $candidato->Nome . ' ' . $candidato->Cognome . ' ' . ($debug ? $candidato->voti : '') }}
                                        </label>
                                    </h4>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <button type="button" id="triggerSwalText" data-title="Un ultimo step..." data-text="Inserisci codice di voto" data-ConfirmBtn="Vota!" data-CancelBtn="Annulla" class="col-sm-12 btn-lg btn-primary btn-block">Prosegui</button>
                </div>
            </form>
        </div>
    </div>
    @if ($debug)
        <div class="row mt-5">
            <div class="col-lg-12">

                @foreach ($codici as $codice)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">{{ $codice->Usato }}</span>
                        </div>
                        <input type="text" class="form-control" value="{{ $codice->Codice }}">
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
