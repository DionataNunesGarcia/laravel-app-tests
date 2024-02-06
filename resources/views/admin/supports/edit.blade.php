<h1>
    Editar dúvida {{ $support->id }}
</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }} <br/>
    @endforeach
@endif
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf()
    @method('PUT')
    <input value="{{ $support->subject }}" type="text" placeholder="Assunto" name="subject">
    <textarea value="{{ $support->body }}"  name="body" rows="4">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
