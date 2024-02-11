@php
    use App\Enums\SupportStatus;
@endphp
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
    @foreach($supports->items() as $support)
        <tr>
            <td>{{ $support->subject }}</td>
            <td>{{ getStatusSupport($support->status) }}</td>
            <td>{{ $support->body }}</td>
            <td>
                <a href="{{ route('supports.show', $support->id) }}">Ver</a>
                <a href="{{ route('supports.edit', $support->id) }}">Editar</a>
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
<x-pagination :paginator="$supports"/>
