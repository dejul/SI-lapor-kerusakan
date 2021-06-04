	<!-- Aside Content -->
	<aside>
		<div class="background-overlay"></div>
		<div class="aside-inner">
	
			<!-- Contact -->
			<section id="login">
	
				<h1>Login to access system</h1>
				<p class="separator-left mt-2 mb-6"></p>
				<?= $this->session->flashdata('pesan'); ?>

				<!-- contact form -->
				<form action="<?= base_url('auth'); ?>" method="post" novalidate>
					<div class="row">
						<div class="form-group col-md-12 mb-2">
							<div class="controls">
								<input type="email" name="email" data-validation-required-message="Must be a valid email" class="form-control" placeholder="Email:">
							</div>
						</div>
						<div class="form-group col-md-12 mb-2">
							<div class="controls"> 
								<input type="password" name="password" minlength="6" data-validation-required-message="The min field must be at least 3 characters." class="form-control" placeholder="password:">
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="button style-2 mb-0">Login</button>
						</div>
					</div>
				</form>
				<!-- /contact form -->
				
			</section>
			<!-- /Contact -->
	
		</div>
	</aside>
	<!-- /Aside Content -->