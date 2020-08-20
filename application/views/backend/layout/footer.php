		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				Anything you want
			</div>
			<strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
		</div>

		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>dist/js/adminlte.min.js"></script>
		<!-- DataTables -->
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net/js/dataTables.rowReorder.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net/js/dataTables.responsive.min.js"></script>

		<!-- SlimScroll -->
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/fastclick/lib/fastclick.js"></script>

		<!-- Sweat Alert -->
		<script src="<?= base_url('assets/node_modules/sweetalert2/dist/'); ?>sweetalert2.all.min.js"></script>

		<?php if ($this->uri->segment(1) === 'kategori') : ?>
			<?php $this->load->view("backend/kategori/js.php") ?>
		<?php endif ?>

		<?php if ($this->uri->segment(1) === 'buku') : ?>
			<?php $this->load->view("backend/buku/js.php") ?>
		<?php endif ?>

		<?php if ($this->uri->segment(1) === 'penerbit') : ?>
			<?php $this->load->view("backend/penerbit/js.php") ?>
		<?php endif ?>

		<?php if ($this->uri->segment(1) === 'pengadaan') : ?>
			<?php $this->load->view("backend/pengadaan/js.php") ?>
		<?php endif ?>

		<?php if ($this->uri->segment(1) === 'siswa') : ?>
			<?php $this->load->view("backend/siswa/js.php") ?>
		<?php endif ?>

		<?php if ($this->uri->segment(1) === 'transaksi') : ?>
			<?php $this->load->view("backend/transaksi/js.php") ?>
		<?php endif ?>



		</body>

		</html>