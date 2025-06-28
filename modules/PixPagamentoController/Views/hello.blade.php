@extends('layouts.app')
@section('content')

@include('layouts.barasuperior')

<aside>
    <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;" tabindex="0">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            @include('layouts.menu')
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <h1>Pagamento via Pix - Mercado Pago</h1>
            <p>Você está prestes a realizar um pagamento via <strong>Pix</strong> utilizando o <strong>Mercado Pago</strong>.</p>
            <div style="background: #f5f5f5; padding: 20px; border-radius: 8px; max-width: 400px;">
                <p><strong>Chave Pix:</strong> exemplo@mercadopago.com</p>
                <p><strong>Valor:</strong> R$ 100,00</p>
                <p>Escaneie o QR Code abaixo com seu aplicativo bancário para concluir o pagamento:</p>
                <img src="https://www.mercadopago.com.br/org-img/qr_code/qr_code.png" alt="QR Code Pix Mercado Pago" style="width:200px;">
            </div>
            <p style="margin-top:20px;">Após o pagamento, aguarde a confirmação automática.</p>
        </div>
    </section>
</section>

@endsection
