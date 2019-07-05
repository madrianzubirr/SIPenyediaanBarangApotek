<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<tbody id="page-top">

	<?php $this->load->view("_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("_partials/breadcrumb.php") ?>
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('kontraBon/indexFinal') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
						<div class="text-right">
							<h4>Tagihan : Rp <?php echo number_format($kontraBon->sisa,0,',','.')?></h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<tr>
										<th>Nomor Faktur</th>
										<th>Perusahaan</th>
										<th>Total Pembayaran</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($faktur as $data): ?>
									<tr>
										<td>
											<?php echo $data->noFaktur ?>
										</td>
										<td>
											<?php echo $data->namaPerusahaan ?>
										</td>
										<td>
											Rp <?php echo number_format($data->totalPembayaran,0,',','.')?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="card mb-3">
					<div class="card-header">
						<h5>Riwayat Pembayaran</h5>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Tanggal Angsaran</th>
										<th>Jumlah Angsuran</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($angsuran as $data): ?>
									<tr>
										<td>
											<?php echo $data->tanggalAngsuran ?>
										</td>
										<td>
											Rp <?php echo number_format($data->jumlahAngsuran,0,',','.')?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

					</div>
					<div class="card-footer">
						<div class="text-right">
							<?php if($kontraBon->sisa != 0){ ?>
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
								<i class="fas fa-check-square"></i>
								Bayar
							</button>
							<?php } else{ } ?>

							<!-- Modal -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
										<!-- Modal Header -->
										<div class="modal-header">
											<h4 class="modal-title">Bayar</h4>
										</div>
										<div class="modal-body">
											<div class="card-body">
												<div class="text-left">
													<form action="<?php base_url('kontraBon/listFaktur') ?>"
														method="post">
														<input type="hidden" name="id"
															value="<?php echo $kontraBon->idKontraBon ?>" />
														<div class="form-group">
															<label for="jumlahAngsuran"> Jumlah Bayar*</label>
															<input
																class="form-control <?php echo form_error('jumlahAngsuran') ? 'is-invalid':'' ?>"
																type="number" name="jumlahAngsuran"
																max="<?php echo $kontraBon->sisa ?>"
																placeholder="Jumlah Bayar" />
															<div class="invalid-feedback">
																<?php echo form_error('jumlahAngsuran') ?>
															</div>
														</div>
														<div class="form-group">
															<label for="tanggalAngsuran">Tanggal Bayar*</label>
															<input
																class="form-control <?php echo form_error('tanggalAngsuran') ? 'is-invalid':'' ?>"
																type="date" data-date-inline-picker="false"
																data-date-open-on-focus="true" name="tanggalAngsuran"
																placeholder="Tanggal Bayar" />
															<div class="invalid-feedback">
																<?php echo form_error('tanggalAngsuran') ?>
															</div>
														</div>
												</div>
												<input class="btn btn-success" type="submit" name="btn" value="Bayar" />
												</form>
											</div>
											<div class="card-footer small text-muted">
												* wajib diisi
											</div>
										</div><!-- /Modal Body-->

									</div><!-- Modal content-->
								</div><!-- Modal Dialog-->
							</div>
						</div>
					</div>
				</div>
				<!-- Sticky Footer -->
				<?php $this->load->view("_partials/footer.php") ?>
			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("_partials/scrolltop.php") ?>

		<?php $this->load->view("_partials/js.php") ?>
		<script>
			function deleteConfirm(url) {
				$('#btn-delete').attr('href', url);
				$('#deleteModal').modal();
			}

		</script>
		</body>

</html>
