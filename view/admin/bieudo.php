<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    .card-bodyy {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 500px;

    }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var jsonData = <?php echo json_encode($data); ?>;

        var data = google.visualization.arrayToDataTable([
            ['Loại sản phẩm', 'Số lượng'],
            <?php
                foreach ($data as $key) {
                    echo "['" . $key['cate_name'] . "' , " . $key['number_cate'] . "],";
                }
                ?>
        ]);

        var options = {
            // title: 'Biểu đồ số lượng sản phẩm theo danh mục',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bảng điều khiển</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Bảng điều khiển</li>
            </ol>


            <a href="index.php?act=thongke" class="btn btn-success">Quay lại</a>
            <br>

            <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Biểu đồ số lượng sản phẩm theo danh mục
                        </div>
                        <div class="card-bodyy">
                            <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

</html>