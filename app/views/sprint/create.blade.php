@extends('layouts.master')

@section('sidebar')
      <ul class="nav nav-sidebar">
        <li><a href="{{ URL::to('/') }}">Accueil</a></li>
         <li><a href="{{ URL::to('project') }}">Projets</a></li>
      </ul>

    <ul class="nav nav-sidebar">
      <li><a href="{{ URL::to('/project/'.$project->id) }}">Projet <b>{{$project->name}}</b></a></li>
      <li><a href="{{ URL::to('project/'.$project->id.'/userstory') }}">Backlog</a></li>
      <li class="active"><a href="{{ URL::to('project/'.$project->id.'/sprint') }}">Sprints</a></li>
      <li><a href="{{ $project->git }}">Lien GitHub</a></li>
    </ul>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Accueil</a></li>
        <li><a href="{{ URL::to('project') }}">Projets</a></li>
        <li><a href="{{ URL::to('project/'.$project->id) }}">{{ $project->name }}</a></li>
        <li><a href="{{ URL::to('project/'.$project->id.'/sprint') }}">Sprints</a></li>
        <li class="active">Création d'un Sprint</li>
    </ol>
@stop

@section('content')
    <h1 class="page-header">Sprints</h1>
    <div class="container-fluid">
        <div class="row">
           @if(!$errors->first() == "")
            <div class="alert alert-danger">{{ HTML::ul($errors->all()) }}</div>
           @endif

        {{ Form::open(array('url' => 'project/'.$project->id.'/sprint')) }}

            <div class="form-group">
                {{ Form::label('number', 'Numéro du Sprint') }}
                {{ Form::text('number', Input::old('number'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('duration', 'Durée') }}
                {{ Form::text('duration', Input::old('duration'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('begin', 'Date de début') }}
                {{ Form::text('begin', Input::old('email'), array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Créer un Sprint !', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

        </div>
    </div>
@stop
