@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nuevo Cuestionario</div>

                <div class="card-body">
                    <form action="/questionnaires" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Ingrese título">
                            <small id="titleHelp" class="form-text text-muted">Déle a su cuestionario un título que llame la atención.</small>

                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Propósito</label>
                            <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Ingrese propósito">
                            <small id="purposeHelp" class="form-text text-muted">Dar un propósito aumentará las respuestas.</small>

                            @error('purpose')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Crear Cuestionario</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
