<?php include_once 'header.php' ?>
<?php if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "select * from ".cpn.wh.$id;
	$sql = $obj->generalSelectStatement($query);
	$res = $sql->_general_result[0];
} ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Administrators</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Driver</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Administrators</li>
				</ol>
			</div>
		</div>
		<ul class="nav nav-pills nav-pills-rose">
			
		</ul>
		<div class="tab-content tab-space">
			<div class="tab-pane active show" id="tab1">
				<div class="row">
					<div class="col-md-12">
						<div class="card-box">
							<div class="card-head">
								<button id="panel-button"
								class="mdl-button mdl-js-button mdl-button--icon pull-right"
								data-upgraded=",MaterialButton">
								<i class="material-icons">more_vert</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
							data-mdl-for="panel-button">
							<li class="mdl-menu__item"><i
								class="material-icons">assistant_photo</i>Action</li>
								<li class="mdl-menu__item"><i class="material-icons">print</i>Another
								action</li>
								<li class="mdl-menu__item"><i
									class="material-icons">favorite</i>Something else here</li>
								</ul>
							</div>
							<div class="card-body ">
								<form id="editCoupons">
									<div class="card-body row">
										<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
											<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input hidden="hidden" type="text" id="id" value="<?=$res->id?>" 
											tabIndex="-1" name="editid">
											<input class="mdl-textfield__input" type="text" id="txtVno" name="editcouponText" value="<?=$res->coupon?>">
											<label class="mdl-textfield__label">Coupon Text</label>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
										<div
										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
										<input class="mdl-textfield__input" type="text" id="vtype" value="<?=$res->type?>" readonly
										tabIndex="-1" name="editctype">
										<label for="vtype" class="pull-right margin-0">
											<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
										</label>
										<label for="vtype" class="mdl-textfield__label">Percentage or Flat</label>
										<ul data-mdl-for="vtype" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
											<li class="mdl-menu__item" data-val="1">Amount</li>
											<li class="mdl-menu__item" data-val="2">Percent</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
									<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text"
									pattern="-?[0-9]*(\.[0-9]+)?" id="txtSCapacity" name="edittxtSCapacity" value="<?=$res->amount?>">
									<label class="mdl-textfield__label" for="txtSCapacity">Enter
									Amount/Percent</label>
									<span class="mdl-textfield__error">Number required!</span>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
								<div
								class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="date" id="date1" name="editdate1" value="<?=$res->expire?>">
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<input class="mdl-textfield__input" type="text" id="txtvmodel" name="edittxtvmodel" value="<?=$res->coupon_num?>">
							<label class="mdl-textfield__label">Enter Number OF Coupons</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
							<input class="mdl-textfield__input" type="text" id="vtype1" value="<?=$res->status?>" readonly
							tabIndex="-1" name="editstatus">
							<label for="vtype" class="pull-right margin-0">
								<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
							</label>
							<label for="vtype1" class="mdl-textfield__label">Status</label>
							<ul data-mdl-for="vtype1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
								<li class="mdl-menu__item" data-val="1">active</li>
								<li class="mdl-menu__item" data-val="2">expired</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-12 p-t-20 text-center">
						<input type="submit"
						class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<!-- end page content -->
<?php include_once 'footer.php' ?>