<h1>
    Editar dúvida {{ $support->id }}
</h1>
<x-alert/>
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', compact('support'))
</form>
