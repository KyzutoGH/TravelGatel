<?php
$judul_browser = "Administrator - Aplikasi Travel Gatel";
include '../bagian/koneksi.php';
$menu = "Perjalanan";
$submenu = "Jadwal";
?>
<style type="text/css">
	.btn-success {
		margin-left: 83%;
	}

	.panel-info {
		margin-top: 3%;
	}

	.navbar-inverse {
		background-color: green;
	}

	.navbar-brand {
		color: white;
		font-family: arial black;
	}
</style>

<?php
session_start();

include '../bagian/kepala.php';
?>

<body class="hold-transition skin-blue sidebar-mini">

	<?php
	if (isset($_SESSION['status'])) {
		if ($_SESSION['status'] != "login") {
	?>
			<div class="row">
				<div class="col-md-offset-4 col-md-4">
					<div class="panel panel-warning">
						<div class="panel-heading">
							Informasi
						</div>
						<div class="panel-body">
							<p>Maaf, Anda tidak berhak mengakses halaman ini secara langsung. Silahkan login terlebih dahulu.</p>
							<a class="btn btn-warning pull-right" role="button" href="../login.php">Login</a>
						</div>
					</div>
				</div>
			</div>

		<?php
		} else if ($_SESSION['status'] == "login") {
		?>
			<div class="wrapper">
				<?php include '../bagian/atasbar.php'; 
				include '../bagian/sidebaradm.php'; ?>
				<div class="content-wrapper">
					<section class="content-header">
						<h1>Jadwal Perjalanan</h1>
						<ol class="breadcrumb">
							<li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
							<li class="active">Jadwal</li>
						</ol>
					</section>
					<section class="content">
						<div class="row">
							<div class="col-xs-12">
								<div class="box">
									<div class="box-header">
										<a href="tambahbuku.php" class="btn btn-primary" role="button"><b>+</b> Tambah Jadwal</a>
									</div>
									<div class="box-body">
										<table id="example2" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Armada</th>
													<th>Tipe</th>
													<th>Asal</th>
													<th>Tujuan</th>
													<th>Jam Berangkat</th>
													<th>Jam Tiba</th>
													<th>Harga</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<?php
													$no = 1;
													$data = mysqli_query($koneksi, "select * from transaksi");
													while ($d = mysqli_fetch_array($data)) {
													?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $d['kode_buku']; ?></td>
													<td><?php echo $d['judul_buku']; ?></td>
													<td><?php echo $d['jenis']; ?></td>
													<td><?php echo $d['pengarang']; ?></td>
													<td><?php echo $d['penerbit']; ?></td>
													<td><?php echo $d['tahun']; ?></td>
													<td>
														<a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="editbuku.php?id_buku=<?php echo $d['id_buku']; ?>"></a>
														<a class="btn btn-danger glyphicon glyphicon-trash" href="hapus.php?id_buku=<?php echo $d['id_buku']; ?>"></a>
													</td>
												</tr>
											<?php
													}
											?>
										</table>
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
					</section>
				</div>
				<footer class="main-footer">
					<div class="pull-right hidden-xs">
						<b>Version</b> 1.0.0
					</div>
					<strong>Copyright &copy; 2018 <a href="#">Kelompok Dua</a>.</strong>
				</footer>
			</div>


		<?php
		}
	} else {
		?>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading">
						Informasi
					</div>
					<div class="panel-body">
						<p>Maaf, Anda tidak berhak mengakses halaman ini secara langsung. Silahkan login terlebih dahulu.</p>
						<a class="btn btn-warning pull-right" role="button" href="../login.php">Login</a>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>

	<script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
	<script src="../dist/js/sweetalert2.min.js"></script>
	<script src="../dist/js/validasi.js"></script>

	<script src="../dist/js/jquery.dataTables.min.js"></script>
	<script src="../dist/js/dataTables.bootstrap.min.js"></script>
	<script src="../dist/js/jquery.slimscroll.min.js"></script>
	<script src="../dist/js/fastclick.js"></script>
	<script src="../dist/js/adminlte.min.js"></script>
	<script src="../dist/js/demo.js"></script>
</body>

</html>