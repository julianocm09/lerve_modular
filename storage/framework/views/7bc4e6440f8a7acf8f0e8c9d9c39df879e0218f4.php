

<?php
use Illuminate\Support\Facades\DB;

$total = DB::table('users')->count();
?>

<div class="row state-overview">
                    <div class="col-lg-3 col-sm-6">
                        <a href="#">
                            <section class="card">
                                <div class="symbol terques">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="value">
                                    <h1 class="count"><?php echo e($total); ?></h1>
                                    <p>New Users</p>
                                </div>
                            </section>
                        </a>
                    </div>





                    <div class="col-lg-3 col-sm-6">
                        <section class="card">
                            <div class="symbol red">
                                <i class="fa fa-tags"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count2">947</h1>
                                <p>Sales</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="card">
                            <div class="symbol yellow">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count3">328</h1>
                                <p>New Order</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="card">
                            <div class="symbol blue">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count4">10328</h1>
                                <p>Total Profit</p>
                            </div>
                        </section>
                    </div>
                </div><?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\resources\views/layouts/indicadores.blade.php ENDPATH**/ ?>