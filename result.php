<?php

require_once('config.php');
require_once('functions.php');

$dbh = connectDb();

$sql = "select answer, count(id) as count from answers group by answer";

// [["1", 1], ["2", 3]]

$rows = array();
foreach ($dbh->query($sql) as $row) {
    array_push($rows, array($row['answer'], (int)$row['count']));
}

$data = json_encode($rows);
// var_dump($data);
// exit;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投票システム</title>
</head>
<body>

<h1>投票結果</h1>

<div id="chart_div">グラフを読込中です...</div>
<p><a href="index.php">戻る</a></p>

<script src="https://www.google.com/jsapi"></script>
<script>
    google.load('visualization', '1.0', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Answer');
        data.addColumn('number', '票数');
        data.addRows(<?php echo $data; ?>);
        var options = {
            'title': '投票結果',
            'width': 400,
            'height': 300
        }
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

</script>
</body>
</html>