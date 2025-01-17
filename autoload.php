<?php
function myAutoloader($className) {
    include __DIR__ .  '\\' . $className . '.php';
}
spl_autoload_register('myAutoloader');

?>