@csrf()
<input value="{{ $support->subject ?? old('subject') }}" type="text" placeholder="Assunto" name="subject">
<textarea name="body" rows="4">{{ $support->body ?? old('body')  }}</textarea>
<button type="submit">Enviar</button>
