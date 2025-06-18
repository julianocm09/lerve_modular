
<div class="container">
    <h2>Resumo de Cartão Ponto</h2>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header bg-light border-bottom-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        🕒 Total de Horas e Salário
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Total de Horas Trabalhadas:</strong>
                            <span><?php echo e($totalHorasFormatado); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Salário Bruto:</strong>
                            <span>R$ <?php echo e(number_format($salarioBruto, 2, ',', '.')); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Desconto INSS:</strong>
                            <span>R$ <?php echo e(number_format($inss, 2, ',', '.')); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Salário Líquido:</strong>
                            <span>R$ <?php echo e(number_format($salarioLiquido, 2, ',', '.')); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\resources\views/ponto/sumario.blade.php ENDPATH**/ ?>