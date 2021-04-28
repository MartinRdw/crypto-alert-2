@extends('layouts.app')

@section('title')
    Créer une alerte
@endsection

@section('content')
    <div class="row">

        <div class="text-center w-100">
            <img width="80" src="{{ $coin['image'] }}">
        </div>

        <p class="w-100">Ici nous allons créer une alerte sur le {{ $coin['name'] }}.</p>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger w-100" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form class="w-100" method="POST" action="{{ route('alerts.store') }}">
            @csrf
            <input type="hidden" name="symbol" value="{{ $coin['symbol'] }}">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Prix</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price"
                           value="{{ old('price') ?? $coin['current_price'] }}"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label for="movement">Mouvement</label>
                    <select id="movement" class="form-control" name="movement">
                        <option value="+" selected="">+</option>
                        <option value="-">-</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Créer</button>
        </form>
    </div>
@endsection