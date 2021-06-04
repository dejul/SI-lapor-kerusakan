<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-tambah">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/user_management/tambahUser'); ?>" novalidate>
				<div class="modal-body">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" name="email" readonly placeholder="Alamat Email">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Roles</label>
						<div class="col-sm-10">
							<select class="form-control" name="roles" id="roles" required>
								<option>-- Pilih Roles --</option>
								<option value="01">Admin</option>
								<option value="02">User</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Divisi</label>
						<div class="col-sm-10">
							<select class="form-control" name="divisi" id="divisi" required>
								<option>-- Pilih Divisi --</option>
								<?php foreach($divisi as $divi){?>
									<option value="<?= $divi->id ?>"><?= $divi->divisi ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<div class="controls">	
								<input type="password" class="form-control" name="password" required data-validation-required-message="The password field is required" minlength="6" placeholder="Password">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
						<div class="col-sm-10">
							<div class="controls">	
								<input type="password" class="form-control" name="confirm-password" required data-validation-match-match="password" data-validation-required-message="The Confirm password field is required" minlength="6" placeholder="Password">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-edit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/user_management/update'); ?>" novalidate>
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" id="edit-nama" name="nama" placeholder="Nama Anda" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="edit-email" name="email" readonly placeholder="Alamat Email">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Roles</label>
						<div class="col-sm-10">
							<select class="form-control" name="roles" id="edit-roles" required>
								<option>-- Pilih Roles --</option>
								<option value="01">Admin</option>
								<option value="02">User</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Divisi</label>
						<div class="col-sm-10">
							<select class="form-control" name="divisi" id="edit-divisi" required>
								<option>-- Pilih Divisi --</option>
								<?php foreach($divisi as $divi){?>
									<option value="<?= $divi->id ?>"><?= $divi->divisi ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<div class="controls">	
								<input type="password" class="form-control" id="password" name="password" required data-validation-required-message="The password field is required" minlength="6" placeholder="Password">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
						<div class="col-sm-10">
							<div class="controls">	
								<input type="password" class="form-control" id="confirm-password" name="confirm-password" required data-validation-match-match="password" data-validation-required-message="The Confirm password field is required" minlength="6" placeholder="Password">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-tambah-divisi">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/divisi/tambahDivisi'); ?>" novalidate>
				<div class="modal-body">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Divisi</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" name="nama" placeholder="Nama Divisi" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-edit-divisi">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/divisi/update'); ?>" novalidate>
				<div class="modal-body">
					<input type="hidden" name="id" id="edit-id-divisi">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Divisi</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" id="edit-nama-divisi" name="nama" placeholder="Nama Divisi" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-tambah-kategori">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/kategori/tambahKategori'); ?>" novalidate>
				<div class="modal-body">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Kategori</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" name="nama" placeholder="Nama Kategori" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-edit-kategori">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/kategori/update'); ?>" novalidate>
				<div class="modal-body">
					<input type="hidden" name="id" id="edit-id-kategori">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Kategori</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" id="edit-nama-kategori" name="nama" placeholder="Nama Kategori" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-tambah-item">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/item/tambahItem'); ?>" novalidate>
				<div class="modal-body">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Kategori</label>
						<div class="col-sm-10">
							<select class="form-control" name="kategori" id="kategori" required>
								<option>-- Pilih Kategori --</option>
								<?php foreach($kategori as $k){?>
									<option value="<?= $k->id ?>"><?= $k->kategori ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Item</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" name="nama" placeholder="Nama Item" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-edit-item">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/item/update'); ?>" novalidate>
				<div class="modal-body">
					<input type="hidden" name="id" id="edit-id-item">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Kategori</label>
						<div class="col-sm-10">
							<select class="form-control" name="kategori" id="edit-kategori-item" required>
								<option>-- Pilih Kategori --</option>
								<?php foreach($kategori as $k){?>
									<option value="<?= $k->id ?>"><?= $k->kategori ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Item</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" id="edit-nama-item" name="nama" placeholder="Nama Item" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-tambah-lokasi">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/lokasi/tambahLokasi'); ?>" novalidate>
				<div class="modal-body">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Lokasi</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" name="nama" placeholder="Nama Lokasi" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-edit-lokasi">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/lokasi/update'); ?>" novalidate>
				<div class="modal-body">
					<input type="hidden" name="id" id="edit-id-lokasi">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Lokasi</label>
						<div class="col-sm-10">
							<div class="controls">
								<input type="text" class="form-control" id="edit-nama-lokasi" name="nama" placeholder="Nama Lokasi" required data-validation-required-message="This Name field is required">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-validasi-perbaikan">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/LaporanKerusakan/validasiPerbaikan'); ?>" novalidate>
				<div class="modal-body">
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Catatan</label>
						<div class="col-sm-10">
							<textarea id="catatan_user" rows="4" class="form-control" name="catatan_user" placeholder="Uraian Kerusakan"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-submit"></button>
				</div>
			</form>
		</div>
	</div>
</div>