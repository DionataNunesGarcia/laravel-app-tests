<h1>
    Nova dúvida
</h1>
@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }} <br/>
    @endforeach
@endif
<form action="{{ route('supports.store') }}" method="POST">
    @csrf()
    <input type="text" placeholder="Assunto" name="subject" value="{{ old('subject') }}">
    <textarea name="body" rows="4">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>
