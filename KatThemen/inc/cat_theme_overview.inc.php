<?php
include '../../header.php';

if(isset($_POST['new_theme']) && $_POST['new_theme'] != ''){
    $sql = 'INSERT INTO 
                firmthemen
            SET
                name = "' . $_POST['new_theme'] .'",
                info = "' . $_POST['new_theme_info'] .'",
                ack = 0,
                is_tabu = 0,
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
                cat_id_firmthema = ' . MyCrypt::decrypt($_GET['id']) . ',
                no_vote = 0,
                cat_id_user = 0';

    $result = $db->rawQuery($sql, Array(10));
}
if(isset($_GET['novote']) && $_GET['novote'] == 'true'){
    $sql = 'INSERT INTO 
                firmthemen_votes
            SET
                cat_id_firmthema = ' . MyCrypt::decrypt($_GET['id']) . ',
                no_vote = 1,
                cat_id_user = 0';

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