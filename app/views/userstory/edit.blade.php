@extends('layouts.master')

@section('sidebar')
      <ul class="nav nav-sidebar">
        <li><a href="{{ URL::to('/') }}">Accueil</a></li>
         <li><a href="{{ URL::to('project') }}">Projets</a></li>
      </ul>

    <ul class="nav nav-sidebar">
      <li><a href="{{ URL::to('/project/'.$project->id) }}">Projet <b>{{$project->name}}</b></a></li>
      <li class="active"><a href="{{ URL::to('project/'.$project->id.'/userstory') }}">Backlog</a></li>
      <li><a href="{{ URL::to('project/'.$project->id.'/sprint') }}">Sprints</a></li>
      <li><a href="{{ $project->git }}">Lien GitHub</a></li>
    </ul>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Accueil</a></li>
        <li><a href="{{ URL::to('project') }}">Projets</a></li>
        <li><a href="{{ URL::to('project/'.$project->id) }}"> {{ $project->name }} </a></li>
        <li><a href="{{ URL::to('project/'.$project->id.'/userstory') }}"> Backlog</a></li>
        <li class="active">Edition d'une User Story</li>
    </ol>
@stop

@section('content')
    <h1 class="page-header">Edition d'une User Story</h1>

    @if(!$errors->first() == "")
     <div class="alert alert-danger">{{ HTML::ul($errors->all()) }}</div>
    @endif
    {{ Form::model($userstory, array('route' => array('project.userstory.update', $project->id ,$userstory->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('number', "Numéro de l'User Story") }}
            {{ Form::text('number', Input::old('number'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('priority', 'Priorité') }}
            {{ Form::select('priority', array('1' => '1', '2' => '2', '3' => '3', '4' => '4','5' => '5'), Input::old('priority'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('difficulty', 'Coût') }}
            {{ Form::select('difficulty', array('1' => '1', '2' => '2', '3' => '3', '5' => '5','8' => '8'), Input::old('difficulty'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Enregistrer', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@stop