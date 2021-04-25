<?php
class AdminModel extends Dbh {
    // Admin Properties
    protected $admin_id;
    protected $name;
    protected $password;
    // Admin Construct
    /* public function __construct($name, $password) {
        $this->name = $name;
        $this->password = $password;
    } */
    /* Admin Methods */
    // Get the credentials entered by the admin from the controller and check with the database to allow entry
    protected function signIn($name, $password) {
        $sql = "SELECT * FROM admins WHERE admin_name='$name'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();

        if (isset($name) && isset($password)) {        

            if (password_verify($password, $result['admin_password'])) {
                $_SESSION['admin_name'] = $result['admin_name'];
                $_SESSION['admin_id'] = $result['admin_id'];
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
}
?>