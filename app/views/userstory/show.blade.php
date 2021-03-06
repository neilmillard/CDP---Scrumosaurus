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
        <li class="active">Vue de l'User Story {{$userstory->number}}</li>
    </ol>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
        <h2 class="page-header">User Story {{$userstory->number}} <small>{{$userstory->description}}</small></h2>
        @if(!isset($sprint->number))
            <div class="alert alert-info"><b>Cette User Story ne fait partie d'aucun Sprint. <a class="btn btn-default btn-xs pull-right" href="{{URL::to('project/'.$project->id.'/sprint')}}">Ajouter des US à un Sprint</a></b></div>
        @else
            <div class="alert alert-info"><b>Cette User Story fait partie du Sprint {{$sprint->number}}.</b></div>
        @endif

            @include('task.index')

            @include('test.index')
        </div><!-- ROW -->
    </div><!-- Container-fluid -->

@stop
