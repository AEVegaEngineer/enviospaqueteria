<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
    <head>
        <!--<meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>comprobante</title>
        
        <script type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilosReportes.css">
        
        <!--
        <link href="{{base_path().'css/bootstrap.min.css' }}" rel="stylesheet" type="text/css" /> 
        <link href="{{base_path().'css/estiloasdsPersonalizados.css' }}" rel="stylesheet" type="text/css" /> 
        -->
    </head>
    <body>
        <img src="img/clients/client-5.png" alt="logo de la empresa" style="display: inline-block; width: 200px;">
        <h3  style="display: inline-block; vertical-align: middle; margin-left: 25px; width: 500px">
        Comprobante de envío Nº {{$envio->envId}}</h3>
        <p><b>Remitente:</b> 
        @if($envio->privilegio == 1)
            {{$datosRemitente->perNombre}}
        @endif
        @if($envio->privilegio == 2)
            {{$datosRemitente->comNombre}}
        @endif
        @if($envio->privilegio == 3)
            {{$datosRemitente->shopNombre}}
        @endif
        </p>
        <p><b>Origen:</b> {{$envio->envOrigen}}</p>
        <p><b>Destino:</b> {{$envio->envDestino}}</p>
       	<h3>Paquetes a enviar: </h3>
        <table class="table" style="font-size: 12px;">
            <tr>
                <td><b>Descripción</b></td> 
                <td><b>Cantidad</b></td>  
                <td><b>Peso Unitario</b></td>        
                <td><b>Peso Total</b></td>
                <td><b>Volumen Unitario</b></td> 
                <td><b>Volumen Total</b></td>        
            </tr>
            @foreach($listapaquetes as $paquete)
            <?php 
            if($paquete->paqPesoUnidad == "Kilos" || $paquete->paqPesoUnidad == "Kilogramos") 
                $paquete->paqPesoUnidad = "Kg";
            else if($paquete->paqPesoUnidad == "Gramos")
                $paquete->paqPesoUnidad = "Gr";

            if($paquete->paqDimensionUnidad == "Centímetros")
                $paquete->paqDimensionUnidad = "Cm";
            if($paquete->paqDimensionUnidad == "Metros")
                $paquete->paqDimensionUnidad = "M";
            ?>
            <tr>
            	<td>{{$paquete->paqDescripcion}}</td>
            	<td>{{$paquete->listCantidadPaq}}</td>
                <td>{{$paquete->paqPeso}} {{$paquete->paqPesoUnidad}}</td>
                <td>{{$paquete->paqPeso * $paquete->listCantidadPaq}} {{$paquete->paqPesoUnidad}}</td>
                <td>{{$paquete->paqDimensionAlto * $paquete->paqDimensionAncho * $paquete->paqDimensionLargo / 1000}} {{$paquete->paqDimensionUnidad}}&sup3;</td>
                <td>{{$paquete->paqDimensionAlto * $paquete->paqDimensionAncho * $paquete->paqDimensionLargo / 1000 * $paquete->listCantidadPaq}} {{$paquete->paqDimensionUnidad}}&sup3;</td>
            </tr>
            @endforeach        
        </table>
        <div style="margin-top: 50px;">
            <div style="width: 50%; display: inline-block; text-align: center;">DNI, Firma y aclaración transportista</div>
            <div style="width: 50%; display: inline-block; text-align: center;">DNI, Firma y aclaración remitente</div>
        </div>
        <div style="margin-top: 50px;">
            <div style="width: 50%; display: inline-block; text-align: center;">__________________________</div>
            <div style="width: 50%; display: inline-block; text-align: center;">__________________________</div>
        </div>
        
    
    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    
    <!--
    <script src="{{base_path().'js/jquasdery.min.js' }}"></script> 
    <script src="{{base_path().'js/bootsasdtrap.min.js' }}"></script> 
    -->
    </body>
</html>