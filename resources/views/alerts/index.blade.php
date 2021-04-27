@extends('layouts.app')

@section('title')
    Mes alertes
@endsection

@section('content')
    <div class="row">
        @foreach($alerts as $alert)
            <div class="w-100 shadow-sm mb-4 rounded px-4 py-3 d-flex justify-content-between align-items-center">
                <p class="mb-0">{{ $alert->name }} sur le {{ $alert->symbol }}, quand {{ $alert->movement }} de {{ $alert->price }}</p>
                <div class="d-flex">
                    <div class="mr-2">
                        <a class="btn btn-secondary" href="{{ route('alerts.edit', ['alert' => $alert]) }}">Modifier</a>
                    </div>
                    <div>
                        <form class="w-100" method="POST" action="{{ route('alerts.delete', ['alert' => $alert]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection