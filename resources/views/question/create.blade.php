@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Crear Nueva Pregunta</div>

                <div class="card-body">
                    <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="question">Pregunta</label>
                            <input name="question[question]" type="text" class="form-control"
                                   value="{{ old('question.question') }}"
                                   id="question" aria-describedby="questionHelp" placeholder="Ingrese la pregunta">
                            <small id="questionHelp" class="form-text text-muted">Haga preguntas simples y directas para obtener los mejores resultados.</small>

                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Opciones</legend>
                                <small id="choicesHelp" class="form-text text-muted">Ofrezca opciones que le brinden la mayor comprensión de su pregunta.</small>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="answer1">Opción 1</label>
                                            <input name="answers[0][answer]" type="text" value="{{ old('answers.0.answer') }}" class="form-control" id="answer1" aria-describedby="choicesHelp" placeholder="Ingrese la opción 1">

                                            @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="rate1">Valor 1</label>
                                            <input name="answers[0][rate]" min="0" max="10" type="number" value="{{ old('answers.0.rate') }}" class="form-control" id="rate1" aria-describedby="choicesHelp" placeholder="Ingrese el valor 1">

                                            @error('answers.0.rate')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="answer2">Opción 2</label>
                                            <input name="answers[1][answer]" type="text" value="{{ old('answers.1.answer') }}" class="form-control" id="answer2" aria-describedby="choicesHelp" placeholder="Ingrese la opción 2">

                                            @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="rate2">Valor 2</label>
                                            <input name="answers[1][rate]" min="0" max="10" type="number" value="{{ old('answers.1.rate') }}" class="form-control" id="rate2" aria-describedby="choicesHelp" placeholder="Ingrese el valor 2">

                                            @error('answers.1.rate')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Añadir Pregunta</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
