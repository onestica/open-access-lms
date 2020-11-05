@extends('layouts.home-template')

@section('title')
    {{ __('label.evaluation')}}
@endsection

@section('content')
<div id="main" class="content">
    <div class="container">
        <div class="row">
            <div id="course-side-nav" class="col-md-3 col-sm-12">
                <h4 class="font-weight-bold">{{ __('section-title.topic_index')}}</h4>
                @include('frontpage.topic-sidebar')
            </div>
            <div class="col-md-9 col-sm-12">
                <h2 class="title">{{ __('section-title.ongoing_evaluation')}}</h2>
                @unlessrole("Siswa")
                <span><i>*{{ __('messages.user_only_evaluation')}}</i></span>
                @endunlessrole
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div id="examListOutterWrapper">
                    @if(sizeof($exams) == 0)
                        <div class="text-center">
                            <p>{{ __('label.no_evaluation')}}</p>
                        </div>
                    @else
                        @foreach($exams as $exam)
                            <div class="card card-topic">
                                <div class="card-body p-0">
                                    <div class="exam-item row align-items-end">
                                        <div class="exam-info col-lg-9 col-12">
                                            <h4><i class="fa fa-clipboard-list text-dark mr-3"></i> {{$exam->title}}</h4>
                                            <p><b>{{$exam->subject->name}}</b> | {{$exam->user->name}} | {{$exam->date->format('d F Y')}} | {{$exam->time_start.' - '.$exam->time_end}}</p>
                                            <span class="text-secondary">{{ __('label.question_count')}}: {{$exam->total_question}}</span>
                                        </div>
                                        <div class="col-lg-3 col-12 topic-action">
                                            <div class="btn-group mb-3" role="group">
                                                <button class="btn btn-lg bg-light-purple text-light action-icon"><i class="fa fa-play"></i></button>
                                                @if(Auth::check())
                                                    @if(Auth::user()->roles[0]->name == "Siswa")
                                                        <a href="{{\LaravelLocalization::localizeURL('exams/'.$exam->id.'/create')}}" class="btn btn-lg bg-purple text-light action-text">{{ __('button-label.take_exam')}}</a>
                                                    @else
                                                        <button disabled class="btn btn-lg bg-purple text-light action-text">{{ __('button-label.take_exam')}}</button>
                                                    @endif
                                                @else
                                                    <button disabled class="btn btn-lg bg-purple text-light action-text">{{ __('button-label.take_exam')}}</button>
                                                @endif()
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection