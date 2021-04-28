@extends('layouts.app')

@section('title')
    Modifier l'alerte {{ $alert->id }}
@endsection

@section('content')
    <div class="row">
        <p class="w-100">Ici nous modifions l'alerte {{ $alert->id }}.</p>

        <form class="w-100" method="POST" action="{{ route('alerts.update', ['alert' => $alert]) }}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $alert->name }}">
                    @error('name')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Prix</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ old('price') ?? $alert->price }}">
                    @error('price')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="movement">Mouvement</label>
                    <select id="movement" class="form-control" name="movement">
                        <option value="+" @if(old('movement') ? old('movement') === '+' : $alert->movement === '+') selected @endif>+</option>
                        <option value="-" @if(old('movement') ? old('movement') === '-' : $alert->movement === '-') selected @endif>-</option>
                    </select>
                    @error('movement')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Modifier</button>
        </form>
    </div>
@endsection