<?php
class UserView extends UserModel {
    // Show all users in the table
    public function showUsers() {
        $results = $this->getUsers();
        // Show Table with all the Users in HTML
        echo "<table class='table table-bordered' id='users-list'>";
			echo "<thead>";
                echo "<tr>";
                    echo "<th class='text-center'>Firstname</th>";
                    echo "<th class='text-center'>Lastname</th>";
                    echo "<th class='text-center'>Email</th>";
                    echo "<th class='text-center'>Date of birth</th>";
                    echo "<th class='text-center'>Country</th>";
				echo "</tr>";
			echo "</thead>";
		    echo "<tbody>";					
            foreach ($results as $result) {
                echo "<tr>";
                        echo "<td class='text-right'>"; echo $result['users_firstname']; echo "</td>";
                        echo "<td class='text-right'>"; echo $result['users_lastname']; echo "</td>";
                        echo "<td class='text-right'>"; echo $result['users_email']; echo "</td>";
                        echo "<td class='text-right'>"; echo date('M d Y',strtotime($result['users_dateofbirth'])); echo "</td>";
                        echo "<td class='text-right'>"; echo $result['users_country']; echo "</td>";;
                    echo "</tr>";
            }
            echo" </tbody>";
        echo "</table>";
    }
}
?>