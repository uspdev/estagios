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

        footer { 
            text-align: initial;
            position: fixed;
            bottom: -50px;
            left: 0px;
            right: 0px;
            height: 110px;
            padding: 0px ;
            font-size: 8;
        }
        .page-break {
            page-break-after: always;
            margin-top:160px;
        }
        p:last-child { page-break-after: never; }
        .content {
            margin-top:0px;
        }
    </style>
</head>

<body>
    
<header>
    <table style='width:100%'>
        <tr>
            <td style='width:20%' style='text-align:left;'>
                <img src='images/logo-fflch.jpg' width='100px'/>
            </td>
            <td style='width:80%'; style='text-align:center;'>
                <p align='center'><b>FACULDADE DE FILOSOFIA, LETRAS E CIÊNCIAS HUMANAS</b>
                <br>Universidade de São Paulo<br>
                Serviço de Assistência ao Ensino de Graduação</p>
            </td>
        </tr>
    </table>
<hr>
</header>

<footer><div class="footer">
    <hr>
    @yield('footer')
</div></footer>

<div class="content" style="margin-bottom: 52px; margin-right: 15px; overflow-wrap: break-word"> @yield('content') </div>

<script type="text/php">
  if ( isset($pdf) ) {
    $pdf->page_script('
        if ($PAGE_COUNT > 1) {
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $size = 10;
            $pageText = "Pagina ".$PAGE_NUM . " / " . $PAGE_COUNT;
            $y = $pdf->get_height() - 10;
            $x = $pdf->get_width() - 15 - $fontMetrics->get_text_width($pageText, $font, $size);
            $pdf->text($x, $y, $pageText, $font, $size);
        }
    ');
}
</script>

</body>
</html>
