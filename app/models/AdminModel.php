<?php
class AdminModel extends Dbh {
    // Admin Properties
    protected $admin_id;
    protected $name;
    protected $password;
    /* Admin Methods */
    // Get the credentials entered by the admin from the AdminController and check with the database to allow entry
    protected function signIn($name, $password) {
        // Verify if admin exists by name
        $sql = "SELECT * FROM admins WHERE admin_name='$name'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();

        if (isset($name) && isset($password)) {        
            // Verify if the hashed password is correct to allow connection
            if (password_verify($password, $result['admin_password'])) {
                $_SESSION['admin_name'] = $result['admin_name'];
                $_SESSION['admin_id'] = $result['admin_id'];
                header("Location: dashboard");
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
}