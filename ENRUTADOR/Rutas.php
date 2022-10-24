<?php
require_once ('../CONTROLLERS/ContactsController.php');
$request= $_REQUEST;
$ruta=$request['ruta'];
switch ($ruta) {
    case 'contactos':
        $contacts = new ContactsController();
        $contacts->getContactsWS();
        break;
    
    default:
        # code...
        break;
}
?>