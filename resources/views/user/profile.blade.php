@extends('layouts.dashboard')
@section('title', ' | Profile')

@section('content')
<h1>{{ auth()->user()->username }}</h1>

@endsection