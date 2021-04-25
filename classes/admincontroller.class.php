<?php
class AdminController extends AdminModel {
    // login admin into the app
    public function loginAdmin() {
        $name = $_POST['username'];
        $password = $_POST['password'];
        $this->signIn($name, $password);
    }
}
?>