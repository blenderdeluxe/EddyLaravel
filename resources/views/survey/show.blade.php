@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $questionnaire->title }}</h1>

            <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                @csrf

                @foreach($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>

                        <div class="card-body">

                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{ $key }}][fk_answer]" id="answer{{ $answer->id }}"
                                                   {{ (old('responses.' . $key . '.fk_answer') == $answer->id) ? 'checked' : '' }}
                                                   class="mr-2" value="{{ $answer->id }}">
                                            {{ $answer->answer }}

                                            <input type="hidden" name="responses[{{ $key }}][fk_question]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4">    
                    <div>
                        <button class="btn btn-dark" type="submit">Encuesta Completa</button>
                    </div>                        
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
