@extends('layouts.dashboard')
@section('title-page', ' | Dashboard')
@section('title-head', 'Dashboard')

@section('content')
<h1>Welcome, to Farsen {{ auth()->user()->username }}</h1>

@endsection