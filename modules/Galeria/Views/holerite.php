<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Demonstrativo de Pagamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .tabela {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            
        }

        .linha {
            display: flex;
            border-bottom: 1px solid black;
        }

        .linha:last-child {
            border-bottom: none;
        }

        .celula {
            border-right: 1px solid black;
            padding: 4px;
            flex: 1;
        }

        .celula:last-child {
            border-right: none;
        }

        .cabecalho {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .largura2 {
            flex: 2;
        }

        .largura3 {
            flex: 3;
        }

        .bold {
            font-weight: bold;
        }

    </style>
</head>
<body>

<h3 class="center">Demonstrativo de Pagamento de Salário - 05/2025 - Mensal</h3>

<div class="tabela">
    <div class="linha">
        <div class="celula largura2">CNO: 51.201.786.298-5</div>
        <div class="celula largura2">CPF: 055.566.309-41</div>
    </div>
    <div class="linha">
        <div class="celula">Cadastro: 32</div>
        <div class="celula largura3">Nome do Funcionário: JULIANO CRISTIANO MANGOLD</div>
    </div>
    <div class="linha">
        <div class="celula">CBO: 623215</div>
        <div class="celula">Empresa: 392</div>
        <div class="celula">Local: 1</div>
        <div class="celula">Departamento: 03 - FL: 01</div>
    </div>
    <div class="linha">
        <div class="celula largura3">Cargo: AJUDANTE DE SUINOCULTURA | Data Admissão: 09/09/2024</div>
    </div>
</div>

<div class="tabela" >
    <div class="linha cabecalho">
        <div class="celula">Ev</div>
        <div class="celula largura2">Descrição</div>
        <div class="celula">Referência</div>
        <div class="celula">Proventos</div>
        <div class="celula">Descontos</div>
    </div>

    <!-- Conteúdo -->
    <div class="linha"><div class="celula">1</div><div class="celula largura2">Horas Normais Diurnas</div><div class="celula">188:00 hs</div><div class="celula">1.478,36</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">2</div><div class="celula largura2">Horas Normais Noturnas</div><div class="celula">032:00 hs</div><div class="celula">251,64</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">23</div><div class="celula largura2">Horas Faltas Diurnas</div><div class="celula">006:00 hs</div><div class="celula"></div><div class="celula">47,18</div></div>
    <div class="linha"><div class="celula">35</div><div class="celula largura2">Horas Extras 50%</div><div class="celula">003:00 hs</div><div class="celula">41,60</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">36</div><div class="celula largura2">Horas Extras 50% Noturnas</div><div class="celula">002:00 hs</div><div class="celula">27,73</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">49</div><div class="celula largura2">Horas Extras 100%</div><div class="celula">012:00 hs</div><div class="celula">221,85</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">50</div><div class="celula largura2">Horas Extras 100% Noturnas</div><div class="celula">010:00 hs</div><div class="celula">184,87</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">59</div><div class="celula largura2">DSR S/Horas Extras Diurnas</div><div class="celula"></div><div class="celula">50,66</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">60</div><div class="celula largura2">DSR S/Horas Extras Noturnas</div><div class="celula"></div><div class="celula">40,88</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">93</div><div class="celula largura2">Insalubridade S/Salário Mínimo</div><div class="celula">25,00%</div><div class="celula">295,32</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">96</div><div class="celula largura2">Adicional Noturno</div><div class="celula">25,00%</div><div class="celula">126,80</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">856</div><div class="celula largura2">DSR S/Adicional Noturno</div><div class="celula"></div><div class="celula">24,38</div><div class="celula"></div></div>
    <div class="linha"><div class="celula">950</div><div class="celula largura2">INSS</div><div class="celula">9,00%</div><div class="celula"></div><div class="celula">219,95</div></div>

    <!-- Totais -->
    <div class="linha cabecalho">
        <div class="celula largura3 center">Total</div>
        <div class="celula">2.744,09</div>
        <div class="celula">267,13</div>
    </div>
    <div class="linha cabecalho">
        <div class="celula largura3 center">Total Líquido</div>
        <div class="celula" colspan="2">2.476,96</div>
    </div>
</div>



<div class="tabela">
    <div class="linha cabecalho">
        <div class="celula">Salário Base</div>
        <div class="celula">Sal Cont INSS</div>
        <div class="celula">Base Cálc FGTS</div>
        <div class="celula">FGTS Mês</div>
        <div class="celula">Base IRRF c/ Ded Simp</div>
        <div class="celula">Faixa</div>
        <div class="celula">Dep</div>
    </div>
    <div class="linha">
        <div class="celula">1.730,00</div>
        <div class="celula">2.696,91</div>
        <div class="celula">2.696,91</div>
        <div class="celula">215,75</div>
        <div class="celula">2.089,71</div>
        <div class="celula">00</div>
        <div class="celula">00</div>
    </div>
</div>

<p>Recebi em: ____/____/______ &nbsp;&nbsp;&nbsp;&nbsp; Assinatura: __________________________</p>

</body>
</html>
