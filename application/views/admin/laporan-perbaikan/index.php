 BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-overlay"></div>
          <div class="content-wrapper"><!--Statistics cards Starts-->
            <section id="laporan_perbaikan">
              <div class="row">
                <div class="col-12">
                  <div class="content-header">
                    Laporan Perbaikan
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="my-3">
                    <?= $this->session->flashdata('pesan'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Data Laporan Perbaikan</h3>
                    </div>
                    <div class="card-content">
                      <div class="card-body" style="overflow-x: auto;">
                        <table class="table table-hover table-striped" id="table_user">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Laporan</th>
                              <th>Tanggal Lapor</th>
                              <th>Pelapor</th>
                              <th>Lokasi</th>
                              <th>Uraian Kerusakan</th>
                              <th>Status Perbaikan</th>
                              <th>Status Pekerjaan</th>
                              <th>Validasi User</th>
                              <th>Validasi SPV</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($perbaikan as $p): ?>
                              <tr>
                                <td><?= $no; ?></td>
                                <td><?= $p->nomor_laporan; ?></td>
                                <td><?= $p->tanggal_laporan; ?></td>
                                <td><?= $p->nama; ?></td>
                                <td><?= $p->lokasi; ?></td>
                                <td><?= $p->uraian_kerusakan; ?></td>
                                <td>
                                  <?php if($p->status_perbaikan==1){ echo 'Sudah Perbaikan';}else{echo 'Belum Perbaikan';} ?>
                                </td>
                                <td><?php if($p->status_pekerjaan==1){ echo 'Sudah Tuntas';}else{echo 'Belum Tuntas';} ?></td>
                                <td><?= $p->catatan_user; ?></td>
                                <td><?php if($p->validasi_spv==1){ echo 'SPV Sudah validasi';}else{echo 'SPV Belum validasi';} ?></td>
                                <td>
                                  <?php
                                    if($this->session->userdata('id_roles') == 2){
                                      if($p->status_laporan!=1){
                                  ?>
                                    <a type="button" data-toogle="tooltip" title="Buat Laporan" href="<?= base_url('user/LaporanPerbaikan/edit/'.$p->id) ?>" class="btn btn-info">
                                      <i class="fa fa-plus"></i>
                                    </a>
                                  <?php } ?>
                                  <a type="button" data-toogle="tooltip" title="Edit Laporan" href="<?= base_url('user/LaporanPerbaikan/ubah/'.$p->id) ?>" class="btn btn-success">
                                    <i class="fa fa-pencil"></i>
                                  </a>
                                <?php }elseif($this->session->userdata('id_roles') == 1 && $this->session->userdata('id_divisi') == 1 && $p->validasi_spv == 0){
                                  ?>
                                  <a type="button" data-toogle="tooltip" title="Validasi Laporan" href="<?= base_url('admin/LaporanPerbaikan/validasi/'.$p->id) ?>" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                  </a>
                                <?php } 
                                ?>
                                </td>
                              </tr>
                            <?php $no++; endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- END : End Main Content