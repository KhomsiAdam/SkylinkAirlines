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
    // User Construct
    /* public function __construct($first, $last, $email, $password, $date_of_birth, $country) {
        $this->first = $first;
        $this->last = $last;
        $this->email = $email;
        $this->password = $password;
        $this->date_of_birth = $date_of_birth;
        $this->country = $country;
    } */
    /* User Methods */
    // Get the credentials entered by the user from the controller and check with the database to allow entry
    protected function signIn($email, $password) {
        $sql = "SELECT * FROM users WHERE users_email='$email'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();

        if (isset($email) && isset($password)) {        

            if (password_verify($password, $result['users_password'])) {
                $_SESSION['users_firstname'] = $result['users_firstname'];
                $_SESSION['users_lastname'] = $result['users_lastname'];
                $_SESSION['users_email'] = $result['users_email'];
                $_SESSION['users_id'] = $result['users_id'];
                header("Location: dashboard.php");
                exit();
            }else{
                $_SESSION['login-error'] = 'Incorrect Username or Password';
                header("Location: index.php");
                exit();
            }
        }else{
            $_SESSION['login-error'] = 'Incorrect Username or Password';
            header("Location: index.php");
            exit();
        }
    }
    // Prepare the insertion into the users table for a user registering an account
    protected function signUp($first, $last, $email, $password, $date_of_birth, $country) {
        $sql = "SELECT * FROM users WHERE users_email='$email'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();

        if ($email == $result['users_email']) { 
            $_SESSION['register-error'] = 'User already exists';
            header("Location: signup.php");
            //exit();
        } else {
            $sql = "INSERT INTO users (users_firstname, users_lastname, users_email, users_password, users_dateofbirth, users_country)
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$first, $last, $email, $password, $date_of_birth, $country]);
            header("Location: index.php");
            //exit();
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
?>