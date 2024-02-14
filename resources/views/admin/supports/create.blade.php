@extends('admin.layouts.app')
@section('title', 'Criar Novo Tópico')
@section('header')
    <h1 class="text-lg text-black-500">Nova dúvida</h1>
@endsection
<x-alert/>

@section('content')
<form action="{{ route('supports.store') }}" method="POST">
    @include('admin.supports.partials.form')
</form>
@endsection
