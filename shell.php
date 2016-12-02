<?php
$user = 'sothearen';
$pass = '200987';
$command = 'echo -e "'.$pass.'\n'.$pass.'\n\n\n\n\n\nY\n" | sudo adduser '.$user;
echo $command;
echo '<pre>';
//echo shell_exec ("sudo adduser ".$user);
echo shell_exec ('sudo echo -e "'.$pass.'\n'.$pass.'\n\n\n\n\n\nY\n" | sudo adduser '.$user);

echo '</pre>';