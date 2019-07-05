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
						<a href="<?php echo site_url('kontraBon/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<button type="button" class="btn btn-info btn-success" data-toggle="modal"
						data-target="#myModal">Tambah Faktur</button>
					<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">Tambah Faktur</h4>
								</div>
								<div class="modal-body">
									<div class="card-body">
										<form action="<?php base_url('kontraBon/tambahFaktur') ?>" method="post">
											<div class="form-group">
												<label for="noFaktur"> Nomor Faktur*</label>
												<select
													class="form-control <?php echo form_error('noFaktur') ? 'is-invalid':'' ?>"
													type="text" name="noFaktur" placeholder="Nomor Faktur">
													<option value>--PILIH--</option>
													<?php
                                                foreach($notFaktur as $data){
                                                    echo "<option value= ".$data->noFaktur.">".$data->noFaktur."</option>";
                                                }
                                                ?>
												</select>
											</div>
											<input class="btn btn-success" type="submit" name="btn" value="Tambah" />
										</form>
									</div>
									<div class="card-footer small text-muted">
										* wajib diisi
									</div>
								</div><!-- /Modal Body-->
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div><!-- Modal content-->
						</div><!-- Modal Dialog-->
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<tr>
										<th>Nomor Faktur</th>
										<th>Perusahaan</th>
										<th>Total Pembayaran</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($faktur as $data): ?>
									<tr>
										<td width="150">
											<?php echo $data->noFaktur ?>
										</td>
										<td>
											<?php echo $data->namaPerusahaan ?>
										</td>
										<td>
											Rp <?php echo number_format($data->totalPembayaran,0,',','.') ?>
										</td>
										<td width="250">
											<a onclick="deleteConfirm('<?php echo site_url('kontraBon/deleteFaktur/'.$data->idFaktur)?>')"
											href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>
											Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
					<?php if($this->session->userdata('idJabatan')==1){ ?>
						<div class="text-right">
							<a onclick="finalizeConfirm('<?php echo site_url('kontraBon/finalize/'.$kontraBon->idKontraBon)?>')"
								href="#!" class="btn btn-success"><i class="fas fa-check-circle"></i> Konfirmasi</a>
						</div>
					<?php } ?>
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
		
		<?php $this->load->view("_partials/modal.php") ?>
		<script>
				function deleteConfirm(url) {
					$('#btn-delete').attr('href', url);
					$('#deleteModal').modal();
				}

			</script>
			<script>
				function finalizeConfirm(url) {
					$('#btn-finalize').attr('href', url);
					$('#finalizeModal').modal();
				}
			</script>
	<body>

</html>
