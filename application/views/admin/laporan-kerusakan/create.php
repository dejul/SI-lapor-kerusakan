<!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-overlay"></div>
          <div class="content-wrapper"><!--Statistics cards Starts-->
            <section id="laporan_perbaikan">
              <div class="row">
                <div class="col-12">
                  <div class="content-header">
                    Form Laporan Kerusakan
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Form Laporan Kerusakan</h3>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <form method="post" action="<?= base_url('user/LaporanKerusakan/tambahKerusakan') ?>" novalidate>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="ft-calendar font-medium-2"></span>
                                    </span>
                                  </div>
                                  <input type='text' id="tanggal_laporan" class="form-control pickadate" name="tanggal_laporan" placeholder="Basic Pick-a-date">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="ft-clock"></span>
                                    </span>
                                  </div>
                                  <input type='text' id="jam_laporan" name="jam_laporan" class="form-control pickatime" placeholder="Basic Pick-a-time">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <select id="lokasi" name="lokasi" class="form-control">
                                  <option value="none" selected disabled>-- Pilih Lokasi --</option>
                                  <?php foreach($lokasi as $l): ?>
                                  <option value="<?= $l->id_lokasi ?>"><?= $l->lokasi ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <input type="hidden" id="pelapor" name="pelapor" class="form-control" value="<?= $this->session->userdata('id_users'); ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <input type="hidden" id="id_next" class="form-control" value="<?= $id; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input type="text" class="form-control" name="nomor_laporan" id="nomor_laporan" placeholder="Nomor Laporan" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea id="uraian_kerusakan" rows="4" class="form-control" name="uraian_kerusakan" placeholder="Uraian Kerusakan"></textarea>
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- END : End Main Content-->