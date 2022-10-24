<?php
/***
 * Rene Corea: 24/octubre/2022
 * Clase que contiene todos los parametros (Normalmente en base de datos pero a falta de una se hace en esta clase)
 */
class Params{
    /**Parametros para login en Datacrm */
    public static $USER      = "prueba";
    public static $OPERATION1 = "login";
    public static $OPERATION2 = "query";
    public static $ENDPOINT_PRUEBA_TECNICA = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php";
    public static $QUERY = "select%20*%20from%20Contacts;";
}
?>