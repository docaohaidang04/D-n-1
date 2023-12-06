<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        body {
            text-align: center; /* Center the content horizontally */
        }

        #chart-container {
            display: inline-block; /* Center the container horizontally */
            text-align: left; /* Align the chart container's content to the left */
        }
        .thongke{
          position: relative;
          bottom:100px;
          right: 100px;
        }
    </style>
</head>
<body>
    <a class="thongke" href="admin.php?pg=thongke">Quay lại thống kê</a>
    <div id="chart-container">
        <div id="piechart"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Số lượng sản phẩm'],
                    <?php
                    $tongdm = count($listthongke);
                    $i = 1;
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        $dauphay = ($i == $tongdm) ? "" : ",";
                        echo "['".$thongke['tendm']."', ".$thongke["countsp"]."]".$dauphay;
                        $i++;
                    }
                    ?>
                ]);

                var options = {'title':'Thống kê sản phẩm theo danh mục', 'width':800, 'height':500};

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
    </div>
</body>
</html>
