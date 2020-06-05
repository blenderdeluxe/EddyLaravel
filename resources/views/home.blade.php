@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/questionnaires/create" class="btn btn-dark">Crear Nuevo Cuestionario</a>

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Mis Cuestionarios</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                            <li class="list-group-item">
                                <a href="{{ $questionnaire->path }}">{{ $questionnaire->title }}</a>

                                <div class="mt-2">
                                    <small class="font-weight-bold">Compartir URL</small>
                                    <p>
                                        <a href="{{ $questionnaire->public_path }}">
                                            {{ $questionnaire->public_path  }}
                                        </a>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
