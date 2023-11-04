@extends('layouts.dashboard')
@section('title', ' | Dashboard')

@section('content')
<h1>Welcome, to Farsen {{ auth()->user()->username }}</h1>

@endsection