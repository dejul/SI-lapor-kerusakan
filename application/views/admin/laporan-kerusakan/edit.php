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
                        <form method="post" action="<?= base_url('user/LaporanKerusakan/update') ?>" novalidate>
                          <?php foreach($kerusakan as $k): $waktu = explode(" ",$k->tanggal_laporan); $tgl = date('j F, Y', strtotime($waktu[0])); $jam = date('g:i A',strtotime($waktu[1]));?>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="ft-calendar font-medium-2"></span>
                                    </span>
                                  </div>
                                  <input type='text' id="edit_tanggal_laporan" class="form-control pickadate" name="tanggal_laporan" placeholder="Basic Pick-a-date" value="<?= $tgl ?>">
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
                                  <input type='text' id="edit_jam_laporan" name="jam_laporan" class="form-control pickatime" placeholder="Basic Pick-a-time" value="<?= $jam ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <select id="edit_lokasi" name="lokasi" class="form-control">
                                  <option value="none" selected disabled>-- Pilih Lokasi --</option>
                                  <?php foreach($lokasi as $l): ?>
                                  <option <?php if($l->id_lokasi == $k->lokasi_id){echo 'selected="selected"';} ?> value="<?= $l->id_lokasi ?>"><?= $l->lokasi ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <input type="hidden" id="edit_pelapor" name="pelapor" class="form-control" value="<?= $this->session->userdata('id_users'); ?>" readonly>
                                <input type="hidden" id="id" name="id" value="<?= $k->id; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input type="text" class="form-control" name="nomor_laporan" id="edit_nomor_laporan" placeholder="Nomor Laporan" readonly value="<?= $k->nomor_laporan; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea id="edit_uraian_kerusakan" rows="4" class="form-control" name="uraian_kerusakan" placeholder="Uraian Kerusakan"><?= $k->uraian_kerusakan; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        <?php endforeach ?>
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