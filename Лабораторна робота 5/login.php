<?php
$login = "";
$password = "";
    if(isset($_POST['login'])) $login = $_POST['login'];
    if (isset($_POST['password'])) $password = $_POST['password'];    
echo "��� ����: $login <br> ��� ������: $password"; 
?> 