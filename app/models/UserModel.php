<?php
class UserModel extends Dbh {
    // User Properties
    public $users_id;
    public $first;
    public $last;
    public $email;
    public $password;
    public $date_of_birth;
    public $country;
    /* User Methods */
    // Get the credentials entered by the user from the UserController and check with the database to allow entry
    protected function signIn($email, $password) {
        // Verify if user exists in the table only with email
        $sql = "SELECT * FROM users WHERE users_email='$email'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();

        if (isset($email) && isset($password)) {        
            // Verify if the hashed password is correct to allow connection
            if (password_verify($password, $result['users_password'])) {
                $_SESSION['users_firstname'] = $result['users_firstname'];
                $_SESSION['users_lastname'] = $result['users_lastname'];
                $_SESSION['users_email'] = $result['users_email'];
                $_SESSION['users_id'] = $result['users_id'];
                header("Location: home");
                exit();
            }else{
                $_SESSION['login-error'] = 'Incorrect Username or Password';
                header("Location: index");
                exit();
            }
        }else{
            $_SESSION['login-error'] = 'Incorrect Username or Password';
            header("Location: index");
            exit();
        }
    }
    // Prepare the insertion into the users table for a user registering an account
    protected function signUp($first, $last, $email, $password, $date_of_birth, $country) {
        // Verify if user exists in the table only with email...
        $sql = "SELECT * FROM users WHERE users_email='$email'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();
        // ...to not allow user registering with same email
        if ($email == $result['users_email']) { 
            $_SESSION['register-error'] = 'User already exists';
            header("Location: signup");
        } else {
            $sql = "INSERT INTO users (users_firstname, users_lastname, users_email, users_password, users_dateofbirth, users_country)
            VALUES (:users_firstname, :users_lastname, :users_email, :users_password, :users_dateofbirth, :users_country)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':users_firstname', $first);
            $stmt->bindParam(':users_lastname', $last);
            $stmt->bindParam(':users_email', $email);
            $stmt->bindParam(':users_password', $password);
            $stmt->bindParam(':users_dateofbirth', $date_of_birth);
            $stmt->bindParam(':users_country', $country);
            $stmt->execute();
            header("Location: index");
        }
    }
    // Get all users from the users table
    protected function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }
}