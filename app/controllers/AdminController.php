<?php
class AdminController extends AdminModel {
    // login admin into the platform
    public function loginAdmin() {
        function validateAdminLogin($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $name = validateAdminLogin($_POST['username']);
        $password = validateAdminLogin($_POST['password']);
        $this->signIn($name, $password);
    }
}