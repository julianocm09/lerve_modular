 <!DOCTYPE html>
<html lang="{{ env('Html_country') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>{{ env('App_Name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />

    <!--right slidebar-->
    <link href="{{ asset('css/slidebars.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gallery.css') }}" />

  </head>

  <body class="light-sidebar-nav">
    @yield('content')



       <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/slidebars.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts.js') }}"></script>




   
    
    
    <script src="{{ asset('assets/fancybox/source/jquery.fancybox.js') }}"></script>
    
   
    

    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('js/toucheffects.js') }}"></script>

  <!--right slidebar-->
  <script src="{{ asset('js/slidebars.min.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[name="publico"]');
    const destinatarioDiv = document.getElementById('destinatario-container');

    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            destinatarioDiv.style.display = (radio.value == "0") ? 'block' : 'none';
        });
    });
});
</script>
 <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox({
            helpers : {
                title : {
                    type : 'inside' // Pode ser 'inside', 'outside', 'over', 'float'
                }
            }
        });
      });

  </script>
  <script>
    async function atualizarFrase() {
        try {
            const res = await fetch("{{ route('frase.aleatoria') }}");
            const data = await res.json();

            document.getElementById('frase').innerHTML = `
                <small>“${data.texto}”</small>
                <small>— ${data.autor}</small>
            `;
        } catch (error) {
            console.error('Erro ao buscar frase:', error);
        }
    }

    atualizarFrase(); // Primeira carga
    setInterval(atualizarFrase, 10000); // Atualiza a cada 10 segundos
</script>


  </body>
</html>
