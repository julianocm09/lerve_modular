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

    <form method="POST" action="<?php echo e(url('/dev/artisan-run')); ?>">
        <?php echo csrf_field(); ?>
        <label for="comando">Escolha um comando:</label>
        <select name="comando" id="comando" required>
            <option value="" disabled <?php echo e($comando ? '' : 'selected'); ?>>-- Selecione --</option>
            <option value="cache:clear" <?php echo e(($comando == 'cache:clear') ? 'selected' : ''); ?>>cache:clear</option>
            <option value="config:cache" <?php echo e(($comando == 'config:cache') ? 'selected' : ''); ?>>config:cache</option>
            <option value="route:list" <?php echo e(($comando == 'route:list') ? 'selected' : ''); ?>>route:list</option>
            <option value="view:clear" <?php echo e(($comando == 'view:clear') ? 'selected' : ''); ?>>view:clear</option>
            <option value="migrate:status" <?php echo e(($comando == 'migrate:status') ? 'selected' : ''); ?>>migrate:status</option>
        </select>
        <button type="submit">Executar</button>
    </form>

    <?php if($output !== null): ?>
        <h2>Saída do comando:</h2>
        <pre><?php echo e($output); ?></pre>
    <?php endif; ?>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\modules/Codeexecutr/Views/artisan-run.blade.php ENDPATH**/ ?>