<?php
class UserView extends UserModel {
    // Show all users in the table
    public function showUsers() {
        $results = $this->getUsers();
        foreach ($results as $result) {
        echo $result['users_firstname'] . ' ' . $result['users_lastname'] . ' ' . $result['users_email'] . ' ' . $result['users_dateofbirth'] . ' ' . $result['users_country'] . '<br>';
        }
    }
}
?>