<!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-overlay"></div>
          <div class="content-wrapper"><!--Statistics cards Starts-->
            <section id="laporan_perbaikan">
              <div class="row">
                <div class="col-12">
                  <div class="content-header">
                    Form Laporan Perbaikan
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Form Laporan Perbaikan</h3>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <form method="post" action="<?= base_url('user/LaporanPerbaikan/create') ?>" novalidate>
                          <?php foreach($kerusakan as $k): $waktu = explode(" ",$k->tanggal_laporan); $tgl = date('j F, Y', strtotime($waktu[0])); $jam = date('g:i A',strtotime($waktu[1]));?>
                          <input type="hidden" name="id" value="<?= $k->id; ?>">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="ft-calendar font-medium-2"></span>
                                    </span>
                                  </div>
                                  <input type='text' id="edit_tanggal_laporan" class="form-control pickadate" placeholder="Basic Pick-a-date" value="<?= $tgl ?>" disabled>
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
                                  <input type='text' id="edit_jam_laporan" class="form-control pickatime" placeholder="Basic Pick-a-time" value="<?= $jam ?>" disabled>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <select id="edit_lokasi" name="lokasi" class="form-control" disabled>
                                  <option value="none" selected disabled>-- Pilih Lokasi --</option>
                                  <?php foreach($lokasi as $l): ?>
                                  <option <?php if($l->id_lokasi == $k->lokasi_id){echo 'selected="selected"';} ?> value="<?= $l->id_lokasi ?>"><?= $l->lokasi ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" id="edit_pelapor" class="form-control" value="<?= $k->nama; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input type="text" class="form-control" id="edit_nomor_laporan" placeholder="Nomor Laporan" readonly value="<?= $k->nomor_laporan; ?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea id="edit_uraian_kerusakan" rows="4" class="form-control" placeholder="Uraian Kerusakan" disabled><?= $k->uraian_kerusakan; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="ft-calendar font-medium-2"></span>
                                    </span>
                                  </div>
                                  <input type='text' name="tanggal_kedatangan" class="form-control pickadate" placeholder="Tanggal Kedatangan">
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
                                  <input type='text' name="jam_kedatangan" class="form-control pickatime" placeholder="Jam Kedatangan">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="ft-calendar font-medium-2"></span>
                                    </span>
                                  </div>
                                  <input type='text' name="tanggal_perbaikan" class="form-control pickadate" placeholder="Tanggal Perbaikan">
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
                                  <input type='text' name="jam_perbaikan" class="form-control pickatime" placeholder="Jam Perbaikan">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="ft-calendar font-medium-2"></span>
                                    </span>
                                  </div>
                                  <input type='text' name="tanggal_selesai_perbaikan" class="form-control pickadate" placeholder="Tanggal Selesai">
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
                                  <input type='text' name="jam_selesai_perbaikan" class="form-control pickatime" placeholder="Jam Selesai">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input type="hidden" name="teknisi" id="teknisi" class="form-control" value="<?= $this->session->userdata('id_users')?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <select id="kategori" name="kategori" class="form-control">
                                  <option value="none" selected disabled>-- Pilih Kategori --</option>
                                  <?php foreach($kategori as $kt): ?>
                                  <option value="<?= $kt->id ?>"><?= $kt->kategori ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <select id="item" name="item" class="form-control">
                                  <option value="none" selected disabled>-- Pilih Item --</option>
                                  <?php foreach($item as $i): ?>
                                  <option value="<?= $i->id_item ?>"><?= $i->item ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea rows="4" class="form-control" name="uraian_perbaikan" placeholder="Uraian Perbaikan"></textarea>
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