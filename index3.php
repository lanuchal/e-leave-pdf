<?php

if (($open = fopen("import.csv", "r")) !== FALSE) {
    $c = 0;
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
        //   $array[] = $data; 
        if ($c != 0) {
            $sql =  " INSERT INTO `e-leave`.`user` (`user_code`, `user_pass`, `user_name`, `department_id`, `affiliation_id`, `position_id`, `permission_id`, `create_by`, `create_time`) VALUES ('" . $data[1] . "', '" . password_hash($data[2], PASSWORD_DEFAULT) . "', '" . $data[3] . "', '" . $data[4] . "', '" . $data[5] . "', '" . $data[6] . "', '" . $data[7] . "', '" . $data[8] . "', '" . date('Y-m-d H:i:s') . "');";
            echo $sql . "<br>";
        }

        $c++;
    }

    fclose($open);
}
//   echo "<pre>";
//   //To display array data
//   var_dump($array);
//   echo "</pre>";