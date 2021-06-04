 BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-overlay"></div>
          <div class="content-wrapper"><!--Statistics cards Starts-->
            <section id="laporan_perbaikan">
              <div class="row">
                <div class="col-12">
                  <div class="content-header">
                    Laporan Kerusakan
                  </div>
                </div>
              </div>
              <?php if($this->session->userdata('id_roles')==2){ ?>
              <div class="row">
                <div class="col-12">
                  <div class="my-3">
                    <a class="btn btn-primary mr-2" data-toggle="tooltip" href="<?= base_url('user/LaporanKerusakan/create'); ?>" title="Lapor Kerusakan">
                      <i class="fa fa-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            <?php } ?>
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
                      <h3 class="card-title">Data Laporan Kerusakan</h3>
                    </div>
                    <div class="card-content">
                      <div class="card-body" style="overflow-x: auto;">
                        <table class="table table-hover table-striped" id="table_user">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nomor Laporan</th>
                              <th>Lokasi</th>
                              <th>Uraian Kerusakan</th>
                              <th>Status Perbaikan</th>
                              <th>Teknisi</th>
                              <th>Uraian Perbaikan</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($kerusakan as $k): ?>
                              <tr>
                                <td><?= $no; ?></td>
                                <td><?= $k->tanggal_laporan; ?></td>
                                <td><?= $k->nomor_laporan; ?></td>
                                <td><?= $k->lokasi; ?></td>
                                <td><?= $k->uraian_kerusakan; ?></td>
                                <td><?= $k->status_perbaikan; ?></td>
                                <td><?= $k->nama; ?></td>
                                <td><?= $k->uraian_perbaikan; ?></td>
                                <td>
                                  <?php if($this->session->userdata('id_roles')==2){ ?>
                                  <a type="button" onclick="editKerusakan('<?= $k->id; ?>');" href="<?= base_url('user/LaporanKerusakan/edit/'.$k->id) ?>" class="btn btn-info">
                                    <i class="fa fa-pencil"></i>
                                  </a>
                                  <?php if($k->status_perbaikan == 1 && $k->status_pekerjaan == 0){ ?>
                                    <button type="button" onclick="validasiPerbaikan('<?= $k->id_perbaikan; ?>');" class="btn btn-success">
                                      <i class="fa fa-check"></i>
                                    </button>
                                  <?php }} ?>
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