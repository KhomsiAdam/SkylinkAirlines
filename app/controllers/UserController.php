<?php
class UserController extends UserModel {
    // Insert specified user into the table
    public function registerUser($first, $last, $email, $password, $date_of_birth, $country) {
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $date_of_birth = $_POST['dob'];
        $country = $_POST['country'];
        $this->signUp($first, $last, $email, $password, $date_of_birth, $country);
    }
    // login specified user into the app
    public function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->signIn($email, $password);
    }
}
?>