<?php

function DisplayContacts($results){
    ?>
    <table border = 0 cellpadding=2 cellspacing=0 class="contactList">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        $i = 0;
        while($row = mysqli_fetch_assoc($results)){
            echo "<tr class='row".($i%2)."'>";
            echo "<td>$i</td>";
            echo "<td><a href='contact.php?id=".$row['id']."'>".$row["fname"]." ".$row["lname"]."</a></td>";
            echo "<td>".$row["phone"]."</td>";
            echo "<td>".$row["email"]."</td>";
            $i++;
        }
        if($i==0){
            echo "<tr><td colspan='4'>No contacts found</td></tr>";
        }
        ?>
    </table>
    <?php

}

?>