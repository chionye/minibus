<?php include_once 'header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Account</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Account Management</a>&nbsp;<i
						class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Account</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Account</header>
						<button id="panel-button"
						class="mdl-button mdl-js-button mdl-button--icon pull-right"
						data-upgraded=",MaterialButton">
						<i class="material-icons">more_vert</i>
					</button>
					<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
					data-mdl-for="panel-button">
					<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
					</li>
					<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
					</li>
					<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
					here</li>
				</ul>
			</div>
			<form id="addAccount">
				<div class="card-body row">
					<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
						<input class="mdl-textfield__input" type="text" id="vtype" value="" readonly
						tabIndex="-1" name="driverEmail">
						<label for="vtype" class="pull-right margin-0">
							<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
						</label>
						<label for="vtype" class="mdl-textfield__label">Driver Email</label>
						<ul data-mdl-for="vtype" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
							<?php $s = $obj->generalSelectStatement("select * from ".drv);$dr = $s->_general_result;
							if (!empty($dr)) {
								foreach ($dr as $key => $value) {
									?>
									<li class="mdl-menu__item" data-val="<?=$value->email?>"><?=$value->email?></li>
								<?php }} ?>
							</ul>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class="mdl-textfield__input" type="text"
						id="bankName" name="bankName">
						<label class="mdl-textfield__label" for="bankName">Bank Name</label>
						<span class="mdl-textfield__error">Bank Name required!</span>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<input class="mdl-textfield__input" type="text"
					id="accType" name="accType">
					<label class="mdl-textfield__label" for="accType">Account Type</label>
					<span class="mdl-textfield__error">Account Type required!</span>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
				<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
				<input class="mdl-textfield__input" type="text"
				id="accNumber" name="accNumber">
				<label class="mdl-textfield__label" for="accNumber">Account Number
				</label>
				<span class="mdl-textfield__error">Account Number required!</span>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
			<div
			class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			<input class="mdl-textfield__input" type="text" id="DriverRaveId" name="DriverRaveId">
			<label class="mdl-textfield__label" for="DriverRaveId">Rave ID</label>
			<span class="mdl-textfield__error">Rave ID required!</span>
		</div>
	</div>
	<div class="col-lg-12 p-t-20 text-center">
		<input type="submit"
		class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">
	</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- end page content -->

<?php include_once 'footer.php'; ?>