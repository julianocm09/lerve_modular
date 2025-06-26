<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.barasuperior', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<aside>
    <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;" tabindex="0">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <!-- indicadores -->
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-body progress-card">
                        <div class="task-progress">
                            <h1>Parto maternidade 1 </h1>
                            <p>Data 25/06/2025</p>
                        </div>

                    </div>
                    <table class="table table-hover personal-task" style="font-weight: bold;">
                        <thead>
                            <tr style="color: blue;">
                                <th>Partos</th>
                                <th>vivos</th>
                                <th>total nacidos</th>
                                <th>Para venda</th>
                                <th>total</th>
                            </tr>
                            <tr style="color: blue;">
                                <td style="color: red;">198</td>
                                <td style="color: red;">12.5</td>
                                <td style="color: red;">2408</td>
                                <td style="color: red;">2210</td>
                                <td>2208</td>
                            </tr>
                        </thead>
                    </table>

                    <table class="table table-hover personal-task">
                        <thead>
                            <tr style="color: blue;">
                                <th>Data</th>
                                <th>11/06</th>
                                <th>12/06</th>
                                <th>14/06</th>
                                <th>18/06</th>
                                <th>22/06</th>
                                <th>26/06</th>
                                <th>01/07</th>
                                <th>07/07</th>
                            </tr>
                             <tr style="color: blue;">
                                <th>Dia</th>
                                <th>3<sup>0</sup></th>
                                <th>4<sup>0</sup></th>
                                <th>6<sup>0</sup></th>
                                <th>10<sup>0</sup></th>
                                <th>15<sup>0</sup></th>
                                <th>19<sup>0</sup></th>
                                <th>24<sup>0</sup></th>
                                <th>28<sup>0</sup></th>
                            </tr>
                              <tr style="color: blue;">
                                <th>%</th>
                                <th>2%</th>
                                <th>3%</th>
                                <th>5,5%</th>
                                <th>7,5%</th>
                                <th>8,2%</th>
                                <th>9%</th>
                                <th>9,5%</th>
                                <th>10%</th>
                            </tr>
                             <tr style="color: blue;">
                                <th>Meta</th>
                                <th>50</th>
                                <th>75</th>
                                <th>137</th>
                                <th>187</th>
                                <th>205</th>
                                <th>225</th>
                                <th>235</th>
                                <th>245</th>
                            </tr>




                             <tr style="color: blue;">
                                <th>Real</th>
                                <th>44</th>
                                <th>20</th>
                                <th style="color: red;">80</th>
                                <th style="color: red;">56</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                             <tr style="color: blue;">
                                <th>Acumulado</th>
                                <th>44</th>
                                <th>64</th>
                                <th style="color: red;">144</th>
                                <th style="color: red;">200</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>  
                             <tr style="color: blue;">
                                <th>Saldo</th>
                                <th>+6</th>
                                <th>+11</th>
                                <th style="color: red;">-7</th>
                                <th style="color: red;">-13</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                      
                    </table>



                </section>
            </div>
            <!-- end indicadores-->
        </div>
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\modules/Idicador_partos/Views/hello.blade.php ENDPATH**/ ?>