<h1>
    Supports List
</h1>
<a href="{{ route('supports.create') }}">Adicionar nova dúvida</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.show', $support) }}">Ver</a>
                    <a href="{{ route('supports.edit', $support) }}">Editar</a>
                    <form
                        action="{{ route('supports.destroy', $support->id) }}"
                        method="POST"
                        onsubmit="return confirm('Deseja realmente deletar a dúvida {{ $support->id }}')"
                    >
                        @csrf()
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
