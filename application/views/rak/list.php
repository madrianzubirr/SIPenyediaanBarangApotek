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

				<?php if ($this->session->flashdata('danger')): ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('danger'); ?>
				</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('warning')): ?>
				<div class="alert alert-warning" role="alert">
					<?php echo $this->session->flashdata('warning'); ?>
				</div>
				<?php endif; ?>


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('rak/add') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<tr>
										<th>Nama Rak</th>
										<th>Jumlah Produk</th>
										<?php if($this->session->userdata('idJabatan')==1){ ?>
										<th>Action</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rak as $data) : ?>
									<tr>
										<td>
											<a href="<?php echo site_url('rak/getProduk/' . $data->idRak) ?>">
												<?php echo $data->namaRak ?>
										</td>
										<td>
											<?php echo $data->jumlah ?>
										</td>
										<?php if($this->session->userdata('idJabatan')==1){ ?>
										<td width="250">
											<a href="<?php echo site_url('rak/edit/' . $data->idRak) ?>"
												class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<?php if($data->jumlah == 0){ ?>	
													<a onclick="deleteConfirm('<?php echo site_url('rak/delete/' . $data->idRak) ?>')"
													href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>
													Hapus</a>
												<?php } ?>
										</td>
										<?php } ?>

									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
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
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}

	</script>

	</body>

</html>
