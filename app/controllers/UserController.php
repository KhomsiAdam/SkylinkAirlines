<?php
class UserController extends UserModel {
    // Insert specified user into the table
    public function registerUser($first, $last, $email, $password, $date_of_birth, $country) {
        function validateUserRegister($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }        
        $first = validateUserRegister($_POST['firstname']);
        $last = validateUserRegister($_POST['lastname']);
        $email = validateUserRegister($_POST['email']);
        $password = validateUserRegister(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $date_of_birth = validateUserRegister($_POST['dob']);
        $country = validateUserRegister($_POST['country']);
        $this->signUp($first, $last, $email, $password, $date_of_birth, $country);
    }
    // login specified user into the app
    public function loginUser() {
        function validateUserLogin($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validateUserLogin($_POST['email']);
        $password = validateUserLogin($_POST['password']);
        $this->signIn($email, $password);
    }
}