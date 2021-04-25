<?php
class UserController extends UserModel {
    // Insert specified user into the table
    public function registerUser($first, $last, $email, $password, $date_of_birth, $country) {
        $this->signUp($first, $last, $email, $password, $date_of_birth, $country);
        /* $this->first = $first;
        $this->last = $last;
        $this->email = $email;
        $this->password = $password;
        $this->date_of_birth = $date_of_birth;
        $this->country = $country; */
    }
    // login specified user into the app
    public function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->signIn($email, $password);
    }
}
?>