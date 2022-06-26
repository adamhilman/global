<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.1.0
	</div>
	<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php 
 $halaman = $this->uri->segment('2');
 $tanggal = date('d M Y H:i:s');
 $cetak = $halaman."-".$tanggal;
?>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-select/js/dataTables.select.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url() ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
	Dropzone.autoDiscover = false;
	var project_id = "<?php echo $this->uri->segment('3'); ?>";
	var project_upload = new Dropzone(".dropzone", {

		url: "<?php echo base_url() ?>admin/upload_file_project/" + project_id,
		method: "POST",
		paramName: "file_project",
		addRemoveLinks: true
	});

	project_upload.on("sending", function (a, b, c) {
		a.token = Math.random().toString(36).substr(2);
		c.append("token_file", a.token);
	});

	project_upload.on("removedfile", function (a) {
		var token = a.token;
		$.ajax({
			type: "post",
			data: {
				token: token
			},
			url: "<?php echo base_url('admin/hapus_file_project') ?>",
			cache: false,
			dataType: 'json',
			success: function () {
				console.log("Sukses Hapus");
			},
			error: function () {
				console.log("error");
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		$('#2').DataTable();
	});

	$("#example1").DataTable({
		"responsive": true,
		"lengthChange": false,
		"autoWidth": false,
		"buttons": [
			{
                extend: 'excel',
				exportOptions: {
                    columns: ':visible'
                },
                title: '<?php echo $cetak?>'
            },
            {
                extend: 'pdfHtml5',
				exportOptions: {
                    columns: ':visible'
                },
                title: '<?php echo $cetak?>'
            }, "colvis",
			{
                extend: 'excel',
                text: 'Export all',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }],
			"select": true

	}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

	$("#claim").DataTable({
		"responsive": true,
		"lengthChange": false,
		"searching": false,
		"autoWidth": false,
		"paging": false,
		"info": false
	}).buttons().container().appendTo('#claim_wrapper .col-md-6:eq(0)');

	$('#simpan_file').click(function () {
		location.reload();
	});
</script>
<script type="text/javascript">
	$(document).ready(function () {
		var i = 1;

		$('#tambah').click(function () {
			i++;
			$('#claim').append('<tr id="row' + i + '" class="dynamic-added"><td>' + i +
				'</td><td><input type="text" id="nominal_claim[]" name="nominal_claim[]" class="form-control"></td>' +
				'<td><textarea name="keterangan[]" rows="3" class="form-control"></textarea></td>' +
				'<td><input type="file" name="file_claim[]" class="form-control"></td>' +
				'<td><button type="button" name="remove" id="' + i +
				'" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function () {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});

	});
</script>
<script>
	Inputmask.extendAliases({
		rupiah: {
			groupSeparator: ".",
			alias: "numeric",
			placeholder: "0",
			autoGroup: true,
			digits: 0,
			digitsOptional: false,
			clearMaskOnLostFocus: false
		}
	});
	$(document).ready(function () {
		$("#nilai_kontrak").inputmask({
			alias: "rupiah"
		});
	});
	// $(document).ready(function() {
	//   $("#nominal_claim").inputmask({
	//     alias: "rupiah"
	//   });
	// });
</script>
<script type="text/javascript">
	$(".remove").click(function () {
		var id = $(this).parents("tr").attr("name");

		swal({
				title: "Apakah anda yakin?",
				text: "Data project beserta file didalamnya tidak bisa dikembalikan!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Ya, saya yakin!",
				cancelButtonText: "Tidak, batalkan!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function (isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: '<?php echo base_url() ?>admin/hapus_project/' + id,
						type: 'DELETE',
						error: function () {
							alert('Ops! Terjadi kesalahan');
						},
						success: function (data) {
							$("#" + id).remove();
							swal("Terhapus!", "Data project dan file berhasil dihapus.", "success");
							setTimeout(function () {
								location.reload();
							}, 3000);

						}
					});
				} else {
					swal("Dibatalkan", "Data project masih disimpan.", "error");
				}
			});

	});
</script>
<script type="text/javascript">
	$(document).ready(function () {

		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			swal({
				title: 'Success',
				text: 'Data Berhasil ' + flashData,
				icon: 'success'
			});
		} //rencana saya kasih else untuk notif data yg gagal
	});
</script>
<script type="text/javascript">
	$(".hapus_user").click(function () {
		var id = $(this).parents("tr").attr("name");
		swal({
				title: "Konfirmasi?",
				text: "Apakah anda yakin ingin menghapus data user",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Ya, saya yakin!",
				cancelButtonText: "Tidak, batalkan!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function (isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: '<?php echo base_url() ?>admin/delete_user/' + id,
						type: 'DELETE',
						error: function () {
							alert('Ops! Terjadi kesalahan');
						},
						success: function (data) {
							$("#" + id).remove();
							swal("Terhapus!", "Data berhasil dihapus.", "success");
							setTimeout(function () {
								location.reload();
							}, 3000);

						}
					});
				} else {
					swal("Dibatalkan", "Data masih disimpan.", "error");
				}
			});

	});
</script>

</body>

</html>