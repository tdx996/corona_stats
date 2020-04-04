@extends('layouts.app')

@section('title_suffix', 'Debata')

@section('content')
    @include('shared.success')

    @foreach ($questions as $question)
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <i class="fas fa-question-circle fa-2x"></i>
                    <span class="username text-lg">
                        <a href="{{ route('questions.show', $question) }}">
                            {{ $question->content }}
                        </a>
                    </span>
                    <span class="description">
                        {{ $question->created_at->format('d.m.Y H:i') }} |
                        <span class="text-muted">
                            {{ trans_choice('messages.answers', $question->answers()->count()) }}
                        </span>
                    </span>
                </div>
                <div class="card-tools mobile-hidden">
                    <a href="{{ route('questions.show', $question) }}" class="btn btn-primary">
                        <i class="fas fa-reply mr-1"></i>
                        Odgovori
                    </a>
                </div>
            </div>

            <div class="card-footer card-comments">
                @foreach ($question->answers->take(3) as $answer)
                    <div class="card-comment">
                        <i class="far fa-comment"></i>

                        <div class="comment-text">
                        <span class="username">
                          {{ $answer->full_name ?? trans('messages.anonymous') }}
                          <span class="text-muted float-right">
                              {{ $answer->created_at->diffForHumans() }}
                          </span>
                        </span>
                            {!! $answer->content !!}
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('questions.show', $question) }}" class="btn btn-primary w-100 desktop-hidden">
                    <i class="fas fa-reply mr-1"></i>
                    Odgovori
                </a>
            </div>
        </div>
    @endforeach
@endsection
