<!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-overlay"></div>
          <div class="content-wrapper"><!--Statistics cards Starts-->
            <section id="laporan_perbaikan">
              <div class="row">
                <div class="col-12">
                  <div class="content-header">
                    Kategori Management
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="my-3">
                    <a class="btn btn-primary mr-2" data-toggle="tooltip" onclick="tambahKategori();" title="Tambah Kategori">
                      <i class="fa fa-plus"></i>
                    </a>
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
                      <h3 class="card-title">Data Kategori</h3>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <table class="table table-hover table-striped" id="table_user">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kategori</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($kategori as $k): ?>
                              <tr>
                                <td><?= $no; ?></td>
                                <td><?= $k->kategori; ?></td>
                                <td>
                                  <button type="button" onclick="editKategori('<?= $k->id; ?>');" class="btn btn-info">
                                    <i class="fa fa-pencil"></i> Edit
                                  </button>
                                  <button type="button" onclick="hapusKategori('<?= $k->id; ?>');" class="btn btn-danger">
                                    <i class="fa fa-times"></i> Hapus
                                  </button>
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
        <!-- END : End Main Content-->