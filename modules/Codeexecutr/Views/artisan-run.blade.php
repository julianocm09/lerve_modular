<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Executar comando Artisan (Dev)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; white-space: pre-wrap; }
        select, button { padding: 8px 12px; font-size: 16px; }
    </style>
</head>
<body>
    <h1>Executar comando Artisan (Dev)</h1>

    <form method="POST" action="{{ url('/dev/artisan-run') }}">
        @csrf
        <label for="comando">Escolha um comando:</label>
        <select name="comando" id="comando" required>
            <option value="" disabled {{ $comando ? '' : 'selected' }}>-- Selecione --</option>
            <option value="cache:clear" {{ ($comando == 'cache:clear') ? 'selected' : '' }}>cache:clear</option>
            <option value="config:cache" {{ ($comando == 'config:cache') ? 'selected' : '' }}>config:cache</option>
            <option value="route:list" {{ ($comando == 'route:list') ? 'selected' : '' }}>route:list</option>
            <option value="view:clear" {{ ($comando == 'view:clear') ? 'selected' : '' }}>view:clear</option>
            <option value="migrate:status" {{ ($comando == 'migrate:status') ? 'selected' : '' }}>migrate:status</option>
        </select>
        <button type="submit">Executar</button>
    </form>

    @if ($output !== null)
        <h2>Saída do comando:</h2>
        <pre>{{ $output }}</pre>
    @endif

</body>
</html>
