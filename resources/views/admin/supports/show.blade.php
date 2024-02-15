@extends('admin.layouts.app')
@section('title', 'Detalhe dúvida' . $support->subject)
@section('header')
    <h1 class="text-lg text-black-500">Detalhe dúvida "{{ $support->subject }}"</h1>
@endsection

@section('content')
    <ul>
        <li>Assunto: {{ $support->subject }}</li>
        <li>Status: {{ $support->status }}</li>
        <li>Descrição: {{ $support->body }}</li>
    </ul>

    <a href="{{ route('supports.index') }}" class="py-2 shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Listar</a>

    <form
        action="{{ route('supports.destroy', $support->id) }}"
        method="POST"
        onsubmit="return confirm('Deseja realmente deletar a dúvida {{ $support->id }}')"
    >
        @csrf()
        @method('DELETE')
        <button type="submit" class="py-2 shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Excluir</button>
    </form>
@endsection
