 <?php


	 $conn = oci_connect("admintw", "ADMINTW", "//localhost/xe");
    echo '<table class="tabel-map">';
        for($i=1;$i<=100;$i++){
        echo "<tr data-toggle=\"modal\" data-id=\"1\" data-target=\"#mini-menu\">";
        for($j=1;$j<=100;$j++){
            $x=rand(1,11);
        echo "<td>  <img alt=\"Resources\" src=images\"$x.png\" title=\"$i|$j\"> </td>";
        }
        echo "</tr>";
        }
        echo "</table>";
        oci_close($conn);
        ?>