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
						<a href="<?php echo site_url('produk/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					
					<div class="card-body">
					<div class="text-center">
							<h4><small class="text-muted">Nama Produk : </small><?php echo $produk->namaProduk?></h4>
						</div>
					<div class="table-responsive">
							<table class="table table-small" id="dataTable" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<tr>
										<th>Tanggal</th>
										<th>Jenis</th>
										<th>No Batch</th>
										<th>Expired Date</th>
										<th>Jumlah</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($laporan as $data): ?>
									<tr>
										<td>
											<?php echo $data->tanggalLaporan ?>
										</td>
										<td>
											<?php if($data->jenisLaporan==0){
                                                    echo "<span class='text-success'>MASUK</span>";
                                                }else{
                                                    echo "<span class='text-danger'>KELUAR</span>";
												}
											?>
										</td>
										<td>
											<?php echo $data->noBatch ?>
										</td>
										<td>
											<?php echo $data->tanggalKedaluwarsa ?>
										</td>
										<td>
											<?php if($data->jenisLaporan==0){
													echo "<span class='text-success'>+$data->jumlahBeli</span>";
                                                }else{
													echo "<span class='text-danger'>-$data->jumlahBeli</span>";
												}
											?>
										</td>
										<td>
											<?php echo $data->sisa ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-right">
						<a onclick="#myModalDate" class="btn btn-secondary text-warning" data-toggle="modal"
							data-target="#myModalDate"><i class="fas fa-print"></i> Cetak PDF</a>
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


	<!-- Modal -->
	<div class="modal fade" id="myModalDate" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Cetak Tanggal</h4>
				</div>
				<div class="modal-body">
					<div class="card-body">
						<form action="<?php base_url('produk/print') ?>" method="post">
							<div class="form-group">
								<label>Tanggal Mulai*</label>
								<input class="form-control" type="date" data-date-inline-picker="false"
									data-date-open-on-focus="true" name="start" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggalMulai') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Akhir*</label>
								<input class="form-control" type="date" data-date-inline-picker="false"
									data-date-open-on-focus="true" name="end" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggalAkhir') ?>
								</div>
							</div>
							<input class="btn btn-success float-right" type="submit" name="btn" value="Cetak" />
					</div><!-- Modal Body-->
					</div>
					<a href="<?php echo site_url('produk/print/'.$produk->idProduk) ?>"
						class="btn btn-success"><i class="fas fa-print"></i> Cetak Semua</a>
				</div><!-- Modal content-->
						
			</div><!-- Modal Dialog-->
		</div>
	</div>


</body>

</html>
