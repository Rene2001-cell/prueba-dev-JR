<?php
require_once('../UTILS/Params.php');
class ContactsController{
    //Obtener contactos
    public function getContactsWS(){
        $ch = curl_init();
        $url=Params::$ENDPOINT_PRUEBA_TECNICA."?operation=".Params::$OPERATION2."&sessionName=".$this->loginDatacrmWS()."&query=".Params::$QUERY;
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HEADER,0);   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        $result = json_decode($result);
        $success = $result->success;
        $data = $result->result;
        if($success){
            echo json_encode(array("success" => true, "data" => $data));
        }
        else{
            echo json_encode(array("success" => false, "mensaje" => "Error al consultar servicio"));
        }
    }
    //Obtener codigo de session
    public function loginDatacrmWS(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Params::$ENDPOINT_PRUEBA_TECNICA);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
        curl_setopt($ch, CURLOPT_POSTFIELDS, "operation=".Params::$OPERATION1."&username=".Params::$USER."&accessKey=".$this->getTokenAcces());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        $result = json_decode($result);
        $success = $result->success;
        $session = $result->result->sessionName;
        if($success && !empty($session) && !is_null($session))
            return $session;
        else
            return null;
    }
    //obtener token de acceso para login
    public function getTokenAcces(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Params::$ENDPOINT_PRUEBA_TECNICA."?operation=getchallenge&username=prueba");
        curl_setopt($ch, CURLOPT_HEADER,0);   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        $result = json_decode($result);
        $success = $result->success;
        $token = $result->result->token;
        if($success && !empty($token) && !is_null($token))
            return md5($token.'3DlKwKDMqPsiiK0B');
        else
            return null;
    }
}
?>
