@extends('admin.layouts.app')
@section('title', 'Editar dúvida' . $support->subject)
@section('header')
    <h1 class="text-lg text-black-500">Editar dúvida "{{ $support->subject }}"</h1>
@endsection

@section('content')
    <x-alert/>
    <form action="{{ route('supports.update', $support->id) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form', ['support' => $support])
    </form>
@endsection
