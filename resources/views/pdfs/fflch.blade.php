<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>
        /**
        @page { margin: 100px 100px 25px 25px; }
        header { position: fixed; top: -60px; left: 0px; right: 0px; height: 100px; }
        footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px; }
        .page-break {
            page-break-after: always;
            margin-top:160px;
        }
        p:last-child { page-break-after: never; }
        .content {
            margin-top:160px;
        }
        **/
    </style>


</head>
<body>
<header>
    <table style='width:100%'>
        <tr>
            <td style='width:20%' style='text-align:left;'>
                <img src='https://www.fflch.usp.br/themes/contrib/aegan-subtheme/images/logo.png' width='230px'/>
            </td>
            <td style='width:80%'; style='text-align:center;'>
                <p align='center'><b>FACULDADE DE FILOSOFIA, LETRAS E CIÊNCIAS HUMANAS</b>
                <br>Universidade de São Paulo<br>
                Serviço de Graduação</p>
            </td>
        </tr>
    </table>
<hr>
</header>

<footer></footer>

<div class="content"> @yield('content') </div>


<script type="text/php">
  if ( isset($pdf) ) {
    $pdf->page_script('
        if ($PAGE_COUNT > 1) {
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $size = 10;
            $pageText = "Pagina ".$PAGE_NUM . " / " . $PAGE_COUNT;
            $y = $pdf->get_height() - 20;
            $x = $pdf->get_width() - 15 - $fontMetrics->get_text_width($pageText, $font, $size);
            $pdf->text($x, $y, $pageText, $font, $size);
        }
    ');
}
</script>

</body>
</html>
