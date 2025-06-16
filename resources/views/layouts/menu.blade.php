 <li>
     <a class="active" href="{{ route('dashboard') }}">
         <i class="fa fa-dashboard"></i>
         <span>Dashboard</span>
     </a>
 </li>
 <li class="sub-menu dcjq-parent-li">
     <a href="javascript:;" class="dcjq-parent">
         <i class="fa fa-laptop"></i>
         <span>Administração</span>
         <span class="dcjq-icon"></span></a>
     <ul class="sub" style="display: none;">
         <li><a href="{{ route('ponto.index') }}"> <i class="fa fa-calendar"></i> Registro de Ponto</a></li>
     </ul>
 </li>




<li class="sub-menu dcjq-parent-li">
    <a href="javascript:;" class="dcjq-parent">
        <i class="fa fa-laptop"></i>
        <span>Julianocm</span>
        <span class="dcjq-icon"></span>
    </a>
    <ul class="sub" style="display: none;">
        <li>
            <a href="{{ route('julianocm.index') }}">
                <i class="fa fa-calendar"></i> Julianocm
            </a>
        </li>
    </ul>
</li>


<li class="sub-menu dcjq-parent-li">
    <a href="javascript:;" class="dcjq-parent">
        <i class="fa fa-laptop"></i>
        <span>Galeria</span>
        <span class="dcjq-icon"></span>
    </a>
    <ul class="sub" style="display: none;">
        <li>
            <a href="{{ route('galeria.index') }}">
                <i class="fa fa-calendar"></i> Galeria
            </a>
        </li>
         <li>
            <a href="{{ route('galeria.upload') }}">
                <i class="fa fa-calendar"></i> upload
            </a>
        </li>
    </ul>
</li>


<li class="sub-menu dcjq-parent-li">
    <a href="javascript:;" class="dcjq-parent">
        <i class="fa fa-laptop"></i>
        <span>Uzuarios</span>
        <span class="dcjq-icon"></span>
    </a>
    <ul class="sub" style="display: none;">
        <li>
            <a href="{{ route('uzuarios.index') }}">
                <i class="fa fa-calendar"></i> Uzuarios
            </a>
        </li>
    </ul>
</li>
