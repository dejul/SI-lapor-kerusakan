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
                        <form method="post" action="<?= base_url('user/LaporanPerbaikan/update') ?>" novalidate>
                          <?php 
                            foreach($kerusakan as $k): 
                              $waktu = explode(" ",$k->tanggal_laporan);
                              $tgl = date('j F, Y', strtotime($waktu[0]));
                              $jam = date('g:i A',strtotime($waktu[1]));

                              $datang = explode(" ",$k->tanggal_kedatangan);
                              $tgl_datang = date('j F, Y', strtotime($datang[0]));
                              $jam_datang = date('g:i A',strtotime($datang[1]));

                              $mulai = explode(" ",$k->tanggal_perbaikan);
                              $tgl_mulai = date('j F, Y', strtotime($mulai[0]));
                              $jam_mulai = date('g:i A',strtotime($mulai[1]));

                              $selesai = explode(" ",$k->tanggal_selesai_perbaikan);
                              $tgl_selesai = date('j F, Y', strtotime($selesai[0]));
                              $jam_selesai = date('g:i A',strtotime($selesai[1]));
                          ?>
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
                                  <input type='text' name="tanggal_kedatangan" class="form-control pickadate" placeholder="Tanggal Kedatangan" value="<?= $tgl_datang ?>">
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
                                  <input type='text' name="jam_kedatangan" class="form-control pickatime" placeholder="Jam Kedatangan" value="<?= $jam_datang ?>">
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
                                  <input type='text' name="tanggal_perbaikan" class="form-control pickadate" placeholder="Tanggal Perbaikan" value="<?= $tgl_mulai ?>">
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
                                  <input type='text' name="jam_perbaikan" class="form-control pickatime" placeholder="Jam Perbaikan" value="<?= $jam_mulai ?>">
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
                                  <input type='text' name="tanggal_selesai_perbaikan" class="form-control pickadate" placeholder="Tanggal Selesai" value="<?= $tgl_selesai ?>">
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
                                  <input type='text' name="jam_selesai_perbaikan" class="form-control pickatime" placeholder="Jam Selesai" value="<?= $jam_selesai ?>">
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
                                  <option <?php if($kt->id == $k->kategori_id){echo 'selected="selected"';} ?> value="<?= $kt->id ?>"><?= $kt->kategori ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <select id="item" name="item" class="form-control">
                                  <option value="none" selected disabled>-- Pilih Item --</option>
                                  <?php foreach($item as $i): ?>
                                  <option <?php if($i->id_item == $k->item_id){echo 'selected="selected"';} ?> value="<?= $i->id_item ?>"><?= $i->item ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea rows="4" class="form-control" name="uraian_perbaikan" placeholder="Uraian Perbaikan"><?= $k->uraian_perbaikan ?></textarea>
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