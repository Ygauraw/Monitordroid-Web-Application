<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel</title>
</head>

<body>

        <?php

        include_once 'db_functions.php';

	$db = new DB_Functions();
        $users = $db->getAllUsers();
        if ($users != false)
            $no_of_users = $users->rowCount();
        else
            $no_of_users = 0;
        ?>
        <a href="javascript:history.back()">Back</a>
        <br />
        <h3>Devices:</h3>
        
               <?php
                if ($no_of_users > 0) {
                    ?>
                    <?php
                    while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <li>
                                <label>Name: </label> <span><?php echo $row["name"] ?></span>
                                <div class="clear"></div>
                                <div class="clear"></div>
                              
                                </div>
                                 <table>
                            <tr>    
                                <td>
                                </form>
                                <form action="deletedevice.php" method="post">
                                <input type="hidden" name="rowid" value="<?php echo $row["id"] ?>"/>
                                <input type="submit" value="Delete"/>
                                </form> </td>
                                </tr>
                                </table>           
        </li>
        <?php } } ?>
				
</body>
</html>
