<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<div class="text-center">
							<h2><small class="text-muted">Laporan </small>
							<br>Defekta</h2>
						</div>
					</div>
					
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<tr>
										<th>Nama Produk</th>
										<th>Minimal Stok</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($hbs as $hbs): ?>
									<tr>
										<td>
											<?php echo $hbs->namaProduk ?>
										</td>
										<td>
											<?php echo $hbs->minimalStok ?>
										</td>
										<td>
											<?php echo $hbs->jumlah ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</body>
							</table>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-right">
						<a href="<?php echo site_url('laporan/print') ?>"
						class="btn btn-secondary text-warning"><i class="fas fa-print"></i> Cetak</a>
					</div>
					</div>

			</div>
			
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("_partials/scrolltop.php") ?>
	<?php $this->load->view("_partials/modal.php") ?>

	<?php $this->load->view("_partials/js.php") ?>

    <script>
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
        }
    </script>

</body>

</html>