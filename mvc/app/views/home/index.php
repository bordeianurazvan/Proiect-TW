<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/27/2017
 * Time: 10:56 AM
 */
$conn=Db::getDbInstance();
$query = 'select * from users';
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    print '<tr>';
    foreach ($row as $item) {
        print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
    }
    print '</tr>';
}
print '</table>';
oci_close($conn);