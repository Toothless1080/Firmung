<?php
include '../../header.php';

if(isset($_POST['new_theme']) && $_POST['new_theme'] != ''){
    $sql = 'INSERT INTO 
                firmthemen
            SET
                name = "' . $_POST['new_theme'] .'",
                type = 0';

    $result = $db->rawQuery($sql, Array(10));
}
if(isset($_GET['delete']) && $_GET['delete'] == 'true'){
    $sql = 'DELETE FROM 
                firmthemen
            WHERE
                id = ' . MyCrypt::decrypt($_GET['id']) ;

    $result = $db->rawQuery($sql, Array(10));
}

if(isset($_GET['vote']) && $_GET['vote'] == 'true'){
    $sql = 'INSERT INTO 
                firmthemen_votes
            SET
                cat_id_firmthema = ' . MyCrypt::decrypt($_GET['id']);

    $result = $db->rawQuery($sql, Array(10));
}

$sql = 'SELECT 
            * 
        FROM 
            firmthemen';
$result = $db->rawQuery($sql, Array(10));
$rows = array();
foreach ($result as $row){
    $row['count'] = getVoteCountByKatid($row['id']);
    array_push($rows, $row);
}

function getVoteCountByKatid($kat_id){
    global $db;
    $sql = 'SELECT COUNT(id) as counti FROM firmthemen_votes WHERE cat_id_firmthema = ' . $kat_id;
    $result = $db->ObjectBuilder()->rawQueryOne($sql, Array(10));
    return $result->counti;
}