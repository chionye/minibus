<?php include_once 'header.php' ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Instructions for Drivers</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Instructions for Drivers</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<form id="terms">
						<?php $sl = $obj->generalSelectStatement(sel.ins);$res = $sl->_general_result; 
						if (!empty($res)) {
							foreach ($res as $key => $value) {
								?>
								<div class="col-sm-12">
									<div class="panel">
										<header class="panel-heading panel-heading-red">
										Instructions </header>
										<div class="panel-body"><textarea name="formsummernote" id="summernote" cols="30" rows="10"><?=$value->instructions?></textarea></div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="panel">
										<header class="panel-heading panel-heading-green">
										Terms &amp; Conditons </header>
										<div class="panel-body"><textarea name="formsummernote1" id="summernote1" cols="30" rows="10"><?=$value->terms?></textarea></div>
									</div>
								</div>
								<div class="col-lg-12 p-t-20 text-center">
									<input type="submit"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" value="save">
								</div>
							<?php }} ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once 'footer.php' ?>