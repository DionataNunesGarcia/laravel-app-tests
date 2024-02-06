<h1>
    Nova dúvida
</h1>

<form action="{{ route('supports.store') }}" method="POST">
    @csrf()
    <input type="text" placeholder="Assunto" name="subject">
    <textarea name="body" rows="4"></textarea>
    <button type="submit">Enviar</button>
</form>
