<?php
session_start();
require("../../../inc/db.php");

$age_start = isset($_POST['age_start']) ? $_POST['age_start'] : 0;
$age_end = isset($_POST['age_end']) ? $_POST['age_end'] : 10000;
$Height_start = isset($_POST['Height_start']) ? $_POST['Height_start'] : 0;
$Height_end = isset($_POST['Height_end']) ? $_POST['Height_end'] : 100000;
$sex = isset($_POST['sex']) ? $_POST['sex'] : null;
$region = isset($_POST['region']) && $_POST['region'] == "상관 없음" ? null : $_POST['region'];
$mbti = isset($_POST['mbti']) && $_POST['mbti'] == "상관 없음" ? null : $_POST['mbti'];
$major = isset($_POST['major']) && $_POST['major'] == "상관 없음" ? null : $_POST['major'];
$weight_start = isset($_POST['weight_start']) ? $_POST['weight_start'] : 0;
$weight_end = isset($_POST['weight_end']) ? $_POST['weight_end'] : 100000;

$search_result = db_select("select * from usertbl where (age >= ? and age <= ?) 
and (height >= ? and height <= ?)
and (sex like ifnull(?, '%'))
and (region like ifnull(?, '%'))
and (mbti like ifnull(?, '%'))
and (major like ifnull(?, '%'))
and (weight >= ? and weight <= ?)", array($age_start, $age_end, $Height_start, $Height_end, $sex, $region, $mbti, $major, $weight_start, $weight_end));

$search_result_count = db_select("select count(*) cnt from usertbl where (age >= ? and age <= ?) 
and (height >= ? and height <= ?)
and (sex like ifnull(?, '%'))
and (region like ifnull(?, '%'))
and (mbti like ifnull(?, '%'))
and (major like ifnull(?, '%'))
and (weight >= ? and weight <= ?)", array($age_start, $age_end, $Height_start, $Height_end, $sex, $region, $mbti, $major, $weight_start, $weight_end));

$_SESSION['search_result'] = $search_result;
$_SESSION['search_result_count'] = $search_result_count;

header("Location: ../idealSummary.php");

?>