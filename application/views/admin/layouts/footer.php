

        <!-- BEGIN : Footer-->
        <footer class="footer undefined undefined">
          <p class="clearfix text-muted m-0"><span>Copyright  &copy; 2021 &nbsp;</span><a href="#">AzCorp</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
        </footer>
        <!-- End : Footer--><!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
    </div><!-- penutup main panel -->
</div><!-- penutup wrapper -->



    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/switchery.min.js'); ?>"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/chartist.min.js'); ?>"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?= base_url('assets/admin-asset/app-assets/js/core/app-menu.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/js/core/app.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/js/notification-sidebar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/js/customizer.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/js/scroll-top.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/pickadate/picker.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/pickadate/picker.date.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/pickadate/picker.time.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/pickadate/legacy.js'); ?>"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?= base_url('assets/admin-asset/app-assets/js/dashboard1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/datatable/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/datatable/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/datatable/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/datatable/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/datatable/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/datatable/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/datatable/vfs_fonts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/js/datetime-picker.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/vendors/js/jqBootstrapValidation.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-asset/app-assets/js/form-validation.js'); ?>"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="<?= base_url('assets/admin-asset/assets/js/scripts.js'); ?>"></script>
    <!-- END: Custom CSS-->
    <script type="text/javascript">
        var table, metode;
        $(document).ready(function(){

            table = $('#table_user').DataTable({
                dom: 'Bfrtip',
                buttons: [
                  'copy', 'csv', 'excel', 'pdf'
                ]
            });
            $('.dt-buttons').addClass('btn-group');
            $('.buttons-copy, .buttons-csv, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mb-2');

            $('#nama').blur(function(){
                var nama1 = $('#nama').val();
                // console.log(nama);
                var nama = nama1.split(" ");
                $('#email').val(nama[0]+"@mail.com")
            });

            setInterval(function(){
                var d = new Date($('#tanggal_laporan').val()+' '+$('#jam_laporan').val());
                // var jam = $('#jam_laporan').val();
                // var j = new Date($('#jam_laporan').val());
                var hari = ("0" + d.getDate()).slice(-2);
                var bulan = ("0"+(d.getMonth()+1)).slice(-2);
                var tahun = d.getFullYear();
                var jam = ("0" + d.getHours()).slice(-2);
                var menit = ("0" + d.getMinutes()).slice(-2);
                var detik = d.getSeconds()+"0";
                var pelapor = $('#pelapor').val();
                var lokasi = $('#lokasi').val();
                var id_next = $('#id_next').val();
                $('#nomor_laporan').val(tahun+bulan+hari+jam+menit+detik+pelapor+lokasi+id_next);
            },500);
        });

        function tambahUser(){
            $('#modal-form-tambah').modal('show');
            $('#modal-form-tambah form')[0].reset();
            $('.modal-title').text('Tambah User');
            $('.btn-submit').text('Tambah data');
            $('#metode').val("tambah");
        }

        function editUser(id){
            $('#modal-form-edit').modal('show');
            $('#modal-form-edit form')[0].reset();
            $('.modal-title').text('Ubah Data User');
            $('.btn-submit').text('Ubah data');
            $('#metode').val("ubah");

            $.ajax({
                url:"<?= base_url('admin/user_management/edit/') ?>"+id,
                type: "GET",
                dataType: "JSON",
                success:function(data){
                    $('#id').val(data.id_users);
                    $('#edit-nama').val(data.nama);
                    $('#edit-email').val(data.email);
                    $('#edit-roles').val(data.id_roles);
                    $('#edit-divisi').val(data.id_divisi);
                }
            });
        }

        function hapusUser(id){
            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url:"<?= base_url('admin/user_management/delete/') ?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success:function(data){
                        location.reload();
                    }

                });
            }
        }

        function tambahDivisi(){
            $('#modal-form-tambah-divisi').modal('show');
            $('#modal-form-tambah-divisi form')[0].reset();
            $('.modal-title').text('Tambah Divisi');
            $('.btn-submit').text('Tambah data');
            $('#metode').val("tambah");
        }

        function editDivisi(id){
            $('#modal-form-edit-divisi').modal('show');
            $('#modal-form-edit-divisi form')[0].reset();
            $('.modal-title').text('Ubah Data Divisi');
            $('.btn-submit').text('Ubah data');
            $('#metode').val("ubah");

            $.ajax({
                url:"<?= base_url('admin/divisi/edit/') ?>"+id,
                type: "GET",
                dataType: "JSON",
                success:function(data){
                    $('#edit-id-divisi').val(data.id);
                    $('#edit-nama-divisi').val(data.divisi);
                }
            });
        }

        function hapusDivisi(id){
            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url:"<?= base_url('admin/divisi/delete/') ?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success:function(data){
                        location.reload();
                    }

                });
            }
        }

        function tambahKategori(){
            $('#modal-form-tambah-kategori').modal('show');
            $('#modal-form-tambah-kategori form')[0].reset();
            $('.modal-title').text('Tambah Kategori');
            $('.btn-submit').text('Tambah data');
            $('#metode').val("tambah");
        }

        function editKategori(id){
            $('#modal-form-edit-kategori').modal('show');
            $('#modal-form-edit-kategori form')[0].reset();
            $('.modal-title').text('Ubah Data Kategori');
            $('.btn-submit').text('Ubah data');
            $('#metode').val("ubah");

            $.ajax({
                url:"<?= base_url('admin/kategori/edit/') ?>"+id,
                type: "GET",
                dataType: "JSON",
                success:function(data){
                    $('#edit-id-kategori').val(data.id);
                    $('#edit-nama-kategori').val(data.kategori);
                }
            });
        }

        function hapusKategori(id){
            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url:"<?= base_url('admin/kategori/delete/') ?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success:function(data){
                        location.reload();
                    }

                });
            }
        }

        function tambahItem(){
            $('#modal-form-tambah-item').modal('show');
            $('#modal-form-tambah-item form')[0].reset();
            $('.modal-title').text('Tambah Item');
            $('.btn-submit').text('Tambah data');
            $('#metode').val("tambah");
        }

        function editItem(id){
            $('#modal-form-edit-item').modal('show');
            $('#modal-form-edit-item form')[0].reset();
            $('.modal-title').text('Ubah Data Item');
            $('.btn-submit').text('Ubah data');
            $('#metode').val("ubah");

            $.ajax({
                url:"<?= base_url('admin/item/edit/') ?>"+id,
                type: "GET",
                dataType: "JSON",
                success:function(data){
                    $('#edit-id-item').val(data.id_item);
                    $('#edit-nama-item').val(data.item);
                    $('#edit-kategori-item').val(data.kategori_id);
                }
            });
        }

        function hapusItem(id){
            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url:"<?= base_url('admin/item/delete/') ?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success:function(data){
                        location.reload();
                    }

                });
            }
        }

        function tambahLokasi(){
            $('#modal-form-tambah-lokasi').modal('show');
            $('#modal-form-tambah-lokasi form')[0].reset();
            $('.modal-title').text('Tambah Lokasi');
            $('.btn-submit').text('Tambah data');
            $('#metode').val("tambah");
        }

        function editLokasi(id){
            $('#modal-form-edit-lokasi').modal('show');
            $('#modal-form-edit-lokasi form')[0].reset();
            $('.modal-title').text('Ubah Data Lokasi');
            $('.btn-submit').text('Ubah data');
            $('#metode').val("ubah");

            $.ajax({
                url:"<?= base_url('admin/lokasi/edit/') ?>"+id,
                type: "GET",
                dataType: "JSON",
                success:function(data){
                    $('#edit-id-lokasi').val(data.id);
                    $('#edit-nama-lokasi').val(data.lokasi);
                }
            });
        }

        function hapusLokasi(id){
            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url:"<?= base_url('admin/lokasi/delete/') ?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success:function(data){
                        location.reload();
                    }

                });
            }
        }

        // function hapusKerusakan(id){
        //     if(confirm('Yakin ingin menghapus data?')){
        //         $.ajax({
        //             url:"<?= base_url('admin/LaporanKerusakan/delete/') ?>"+id,
        //             type: "POST",
        //             dataType: "JSON",
        //             success:function(data){
        //                 location.reload();
        //             }

        //         });
        //     }
        // }

        function validasiPerbaikan(id){
            if(confirm('Apakah perbaikan sudah sesuai?')){
                $.ajax({
                    url:"<?= base_url('user/LaporanKerusakan/validasi/') ?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success:function(data){
                        location.reload();
                    }

                });
            }else{
               $.ajax({
                    url:"<?= base_url('user/LaporanKerusakan/unvalidasi/') ?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success:function(data){
                        location.reload();
                    }
                });    
            }
        }

        $('.alert-message').alert().delay(3500).slideUp('slow');
    </script>
  </body>
  <!-- END : Body-->
</html>