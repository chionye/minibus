<?php include_once 'header.php'; ?>
<!-- start page content -->
<?php if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "select * from ".drva.wh.$id;
	$sql = $obj->generalSelectStatement($query);
	$res = $sql->_general_result[0];
} ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Edit Account</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Account Management</a>&nbsp;<i
						class="fa fa-angle-right"></i>
					</li>
					<li class="active">Edit Account</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Edit Account</header>
					</ul>
				</div>
				<form id="editAccount">
					<div class="card-body row">
						<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<input class="mdl-textfield__input" type="text" name="driverId" value="<?=$res->driver_id?>" hidden="hidden">
							<input class="mdl-textfield__input" type="text"
							id="bankName" name="editbankName" value="<?=$res->bank_name?>">
							<label class="mdl-textfield__label" for="bankName">Bank Name</label>
							<span class="mdl-textfield__error">Bank Name required!</span>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class="mdl-textfield__input" type="text"
						id="accType" name="editaccType" value="<?=$res->acctype?>">
						<label class="mdl-textfield__label" for="accType">Account Type</label>
						<span class="mdl-textfield__error">Account Type required!</span>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<input class="mdl-textfield__input" type="text"
					id="accNumber" name="editaccNumber" value="<?=$res->bank_account_no?>">
					<label class="mdl-textfield__label" for="accNumber">Account Number
					</label>
					<span class="mdl-textfield__error">Account Number required!</span>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
				<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
				<input class="mdl-textfield__input" type="text" id="DriverRaveId" name="editDriverRaveId" value="<?=$res->rave_acc_id?>">
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