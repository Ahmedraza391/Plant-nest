<?php
session_start(); 
include("./components/top.php")
?>
<?php
if(!isset($_SESSION['admin_login'])){
    echo "<script>window.location.href='login.php'</script>";
}
?>
<div class="container">
    <h2 class="text-center m-2 text-success fw-bold">Dashboard</h2>
    <div class="row">
        <div class="col-md-10 m-auto">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Line chart</h4>
                  <canvas id="lineChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bar chart</h4>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<?php include("./components/bottom.php") ?>