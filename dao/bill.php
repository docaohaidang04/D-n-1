<?php
require_once 'pdo.php';

function showb($id_us)
{
    $sql = "SELECT * FROM bill WHERE id_us = ?";
    return pdo_query($sql, $id_us);
}

function lay_id_us($id)
{
    $sql = "SELECT id_us FROM bill WHERE id=?";
    return  pdo_query_value($sql, $id);;
}