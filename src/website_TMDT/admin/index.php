<?php
include_once __DIR__ . ('/../dbconnect.php');
//admin    

$sqladmin = "select * from admin";
$resultadmin =  mysqli_query($conn, $sqladmin);
$admin = [];
while ($row = mysqli_fetch_array($resultadmin, MYSQLI_ASSOC)) {
    $admin = array(
        'username' => $row['username'],
        'tenadmin' => $row['tenadmin'],
        'hinhadmin' => $row['hinhadmin']
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./frontend/css/style.scss">

</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <?php include_once(__DIR__ . '/partials/lertList.php'); ?>

    <div class="main-content">
        <?php include_once(__DIR__ . '/partials/header.php'); ?>

        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary mb-2">
                            <div class="card-body pb-0">
                                <div class="text-value" id="baocaoSanPham_SoLuong">
                                    <h1>0</h1>
                                </div>
                                <div>Tổng số mặt hàng</div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
                    </div> <!-- Tổng số mặt hàng -->
                    <div id="ketqua"></div>
                </div><!-- row -->
                <div class="row">
                    <!-- Biểu đồ thống kê loại sản phẩm -->
                    <div class="col-sm-6 col-lg-6">
                        <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
                        <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
                    </div><!-- col -->

                </div><!-- row -->
            </div>
        </main>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            function getDuLieuBaoCaoTongSoMatHang() {
                $.ajax('/website_tmdt/admin/api/tongsp.php', {
                    success: function(data) {
                        var dataObj = JSON.parse(data);
                        console.log(dataObj);
                        var htmlString = `<h1>${dataObj.soluong}</h1>`;
                        $('#baocaoSanPham_SoLuong').html(htmlString);
                    },
                    error: function() {
                        var htmlString = `<h1>Không thể xử lý</h1>`;
                        $('#baocaoSanPham_SoLuong').html(htmlString);
                    }
                });
            }
            $('#refreshBaoCaoSanPham').click(function(event) {
                event.preventDefault();
                getDuLieuBaoCaoTongSoMatHang();
            });


            var $objChartThongKeLoaiSanPham;
            var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext(
                "2d");

            function renderChartThongKeLoaiSanPham() {
                $.ajax({
                    url: '/website_tmdt/admin/api/tongsp.php',
                    type: "GET",
                    success: function(response) {
                        var data = JSON.parse(response);
                        var myLabels = [];
                        var myData = [];
                        $(data).each(function() {
                            myLabels.push((this.tenhang));
                            myData.push(this.soluong);
                        });
                       //myData.push(0); // tạo dòng số liệu 0
                        if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
                            $objChartThongKeLoaiSanPham.destroy();
                        }
                        $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
                            // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                            type: "bar",
                            data: {
                                labels: myLabels,
                                datasets: [{
                                    backgroundColor: ["#808080", "#FF0000", "#00FF00", "#0000FF", "#FFFF00"],
                                    // label: myLabels,
                                    data: myData,
                                    borderWidth: 1
                                }]
                            },
                            // Cấu hình dành cho biểu đồ của ChartJS
                            options: {
                                indexAxis: 'x',
                                skipNull: true,
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: "Thống kê Loại sản phẩm"
                                },
                                responsive: true
                            }
                        });
                    }
                });
            };
            $('#refreshThongKeLoaiSanPham').click(function(event) {
                event.preventDefault();
                renderChartThongKeLoaiSanPham();
            });

            getDuLieuBaoCaoTongSoMatHang();
        });
    </script>
</body>

</html>