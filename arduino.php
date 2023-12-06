<?php
if (isset($_GET['param']) && $_GET['param'] == 'go') {
    // URL del Arduino
    $arduinoUrl = 'http://172.16.10.16:8181'; // Cambia la dirección IP si es necesario
    
    // Realizar la solicitud HTTP al Arduino
    $response = file_get_contents($arduinoUrl);
    
    if ($response !== false) {
        // Decodificar los datos JSON recibidos
        $datos = json_decode($response, true);
        
        // Extraer los valores individuales
        $ancho = $datos['ancho'];
        $largo = $datos['largo'];
        $alto = $datos['alto'];
        $peso = $datos['peso'];
        $volumetrico = $datos['volumetrico'];
        
        // Mostrar los datos en la página web
        echo "Ancho: " . $ancho . "<br>";
        echo "Largo: " . $largo . "<br>";
        echo "Alto: " . $alto . "<br>";
        echo "Peso: " . $peso . "<br>";
        echo "Volumétrico: " . $volumetrico . "<br>";
    } else {
        echo "No se pudo conectar al Arduino.";
    }
} else {
    echo "No se enviaron datos desde el ardui.";
}
?>
