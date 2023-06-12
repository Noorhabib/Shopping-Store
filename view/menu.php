<?php
if(isset( $_SESSION['ON']))
    echo "<a href='index.php?choice=logoff'> <span class='button'>Logoff</span></a>";
else
    echo "<a href='index.php'> <span class='button'>Login</span></a>";
echo "<a href='index.php?choice=products'> <span class='button'>Products</span></a>";
echo "<a href='index.php?choice=contact'> <span class='button'>Contact</span></a>";
echo "<a href='index.php?about.php'> <span class='button'>About</span></a>";
?>
