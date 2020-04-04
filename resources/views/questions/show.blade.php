@extends('layouts.app')

@section('content')
    @include('shared.success')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-lg">
                    <i class="far fa-comment mr-1"></i>
                    {{ $question->content }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="alert alert-secondary">
                <div class="d-flex">
                    <div class="float-left d-flex align-items-center mr-3">
                        <i class="fas fa-2x fa-trophy"></i>
                    </div>
                    Najbolj zanimive odgovore bomo izpostavili na naslovni strani!
                </div>
            </div>
        </div>
    </div>


    @if ($question->answers()->where('ip_address', request()->ip())->doesntExist())
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => ['questions.answers', $question]]) !!}
                    @include('shared.errors')

                    <div class="form-group">
                        {!! Form::label('full_name', trans('messages.full_name'), ['class' => 'optional']) !!}
                        {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', trans('messages.answer_content')) !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit(trans('messages.action_answer'), ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endif

    @if ($answersGroupedByDay->isNotEmpty())
        <div class="timeline">
            @foreach($answersGroupedByDay as $answersInDay)
                <div class="time-label">
                    <span class="bg-red">
                        {{ $answersInDay->first()->created_at->format('d.m.Y') }}
                    </span>
                </div>
                @foreach($answersInDay as $answer)
                    <div>
                        <i class="fas fa-comment bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time">
                                <i class="fas fa-clock"></i>
                                {{ $answer->created_at->format('H:i') }}
                            </span>
                            <h3 class="timeline-header">
                                <span class="text-blue">
                                    {!! $answer->full_name ?? trans('messages.anonymous') !!}
                                </span>
                                meni
                            </h3>

                            <div class="timeline-body">
                                {{ $answer->content }}
                            </div>
                            <div class="timeline-footer">
                                <x-difference-indicator :value="$answer->votes()->sum('value')" class="mr-1"/>
                                @if ($answer->votes->where('ip_address', request()->ip())->where('value', 1)->isEmpty())
                                    {!! Form::open(['route' => ['questions.answers.up_vote', $question, $answer], 'class' => 'd-inline-block']) !!}
                                        <button type="submit" class="btn btn-primary btn-xs text-white">
                                            <i class="fas fa-thumbs-up"></i>
                                        </button>
                                    {!! Form::close() !!}
                                @endif
                                @if ($answer->votes->where('ip_address', request()->ip())->where('value', -1)->isEmpty())
                                    {!! Form::open(['route' => ['questions.answers.down_vote', $question, $answer], 'class' => 'd-inline-block']) !!}
                                        <button type="submit" class="btn btn-danger btn-xs text-white">
                                            <i class="fas fa-thumbs-down"></i>
                                        </button>
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif
@endsection
