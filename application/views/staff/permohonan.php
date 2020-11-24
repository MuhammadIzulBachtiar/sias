 <section id="basic-examples">
 	<div class="row">
 		<div class="col-xs-12 mt-1 mb-3">
 			<h4 class="">
 				Buat Surat Undangan
 			</h4>
 			<p>
 				Buat surat undangan dan print disini
 			</p>
 			<hr>
 		</div>
 		<div class="col-xs-12">
 			<?php 
 			if ($this->session->flashdata('error')!==null) {
 				?>
 				<div class="alert alert-danger">
 					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 					<?php echo $this->session->flashdata('error') ?>
 				</div>
 				<?php
 			}

 			if ($this->session->flashdata('success')!==null) {
 				?>
 				<div class="alert alert-success">
 					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 					<?php echo $this->session->flashdata('success') ?>
 				</div>
 				<?php
 			}
 			?>
 		</div>
 	</div>
 	<br>
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
 	<div class="row" style="margin-top: -30px;">
 		<div class="col-md-12">
 			<div class="form-group">
 				<button class="btn btn-outline-primary" onclick="printsurat()"><i class="fa fa-print"></i> Buat Surat</button>
 			</div>
 		</div>
 		<div class="col-md-12 " id="print" style="margin-bottom: 50px;">
 			<div class="card">
 				<div class="card-header">
 					
 				</div>
 				<div class="card-body card-block">
 					<ul class="nav nav-tabs customtab" role="tablist">
 						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Data</span></a> </li>
 						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Preview</span></a> </li>
 					</ul>
 					<!-- Tab panes -->
 					<div class="tab-content">
 						<div class="tab-pane active" id="home2" role="tabpanel">
 							<div class="p-20">
 								<div class="row">
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="">Tempat tanggal</label>
 											<input type="text" class="form-control" required="" onkeyup="tempat()" id="txt_tempat">
 										</div>
 										<div class="form-group">
 											<label for="">Kepada</label>
 											<textarea name="" id="txt_kepada" onkeyup="kepada()" class="form-control"></textarea>
 										</div>
 										<div class="form-group">
 											<label for="">Nomor </label>
 											<input type="text" class="form-control" required="" onkeyup="nomor()" id="txt_nomor">
 										</div>
 										<div class="form-group">
 											<label for="">Sifat </label>
 											<input type="text" class="form-control" required="" onkeyup="sifat()" id="txt_sifat">
 										</div>
 										<div class="form-group">
 											<label for="">Lampiran </label>
 											<input type="text" class="form-control" required="" onkeyup="lampiran()" id="txt_lampiran">
 										</div>
 										<div class="form-group">
 											<label for="">Perihal </label>
 											<input type="text" class="form-control" required="" onkeyup="perihal()" id="txt_perihal">
 										</div>
 									</div>
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="">Isi Surat</label>
 											<textarea name="" id="txt_isi" class="form-control" onkeyup="isi()" style="height: 200px"></textarea>
 										</div>
 									</div>
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="">Tembusan</label>
 											<textarea name="" id="txt_tembusan" class="form-control" onkeyup="tembusan()" style="height: 200px"></textarea>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 						<div class="tab-pane  p-20" id="profile2" role="tabpanel" >
 							<div class="col-md-12 p-4" id="print" style="padding-top: 20px; padding-right: 50px; padding-left: 50px; box-shadow: 1px 1px 10px gray;min-height: 1250px;">
 								<br>
 								<ul class="media-list row" style="border: 0px!important;margin-left: -50px;margin-right: -50px;">
 									<li class="media" style="border: 0px!important;">
 										<div class="media-left">
 											<a href="#">
 												<img class="media-object width-170" src="<?php echo base_url('assets/logoprint.png') ?>" alt="Generic placeholder image"  style="width: 170px;">
 											</a>
 										</div>
 										<div class="media-body media-search">
 											<center>
 												<h1 style="font-size: 2.2em;letter-spacing: 3px;">PEMERINTAH KABUPATEN BANDUNG</h1>
 												<h1 style="font-size: 2.2em;letter-spacing: 3px; margin-top: -10px;">KECAMATAN DAYEUHKOLOT</h1>
 												<span style="font-size: 1.3em;letter-spacing: 1.4px">Alamat : Jl. Raya Dayeuhkolot No. 409 TELP/FAX 022-5223238</span><br>
 												<span style="font-size: 1.3em;letter-spacing: 1.4px"><i>email : kec_dayeuhkolot@yahoo.co.id Bandung 40257</i></span>
 											</center>
 										</div>
 									</li>
 								</ul>
 								<hr>
 								<span style="float: right;" id="tempat">Dayeuhkolot, 4 jan 2019</span><br>
 								<span style="float: right;margin-right: 50px;">Kepada:</span><br>
 								<span style="float: right;margin-right: 0px; width: 200px;" id="kepada"></span>
 								<p style="margin-top: -10px!important;">Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span id="nomor"></span></p>
 								<p style="margin-top: -10px!important;">Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span id="sifat"></span></p>
 								<p style="margin-top: -10px!important;">Lampiran &nbsp;&nbsp;&nbsp;&nbsp;: <span id="lampiran"></span></p>
 								<p style="margin-top: -10px!important;">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span ><u><b id="perihal"></b></u></span></p>
 								<p style="margin-left: 85px;" id="isi"></p>
 								<p style="float: right;  margin-top:600px; right: 60px;">CAMAT DAYEUHKOLOT</p>
 								<p style="float: right; margin-top:690px; margin-right: -160px; text-align: center;"><u><b>Drs. YIYIN SODIKIN,M.Si</b></u><br>Pembina Tingkat 1 <br> NIP : 19610504 198209 1001</p>
 								<p style="margin-top: 780px;" id="tembusan">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, officiis illo rerum, totam expedita adipisci suscipit doloribus temporibus ullam obcaecati voluptatum dolorem eaque, eos nostrum, sapiente ad debitis similique reprehenderit!</p>
 							</div>
 						</div>
 						<div class="tab-pane p-20" id="messages2" role="tabpanel">3</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <script>

 	function kepada() {
 		$("#kepada").html($("#txt_kepada").val().replace(/\n/g, '<br/>'));
 	}

 	function isi() {
 		$("#isi").html($("#txt_isi").val().replace(/\n/g, '<br/>'));
 	}

 	function tembusan() {
 		$("#tembusan").html($("#txt_tembusan").val().replace(/\n/g, '<br/>'));
 	}

 	function tempat() {
 		$("#tempat").html($("#txt_tempat").val());
 	}
 	function nomor() {
 		$("#nomor").html($("#txt_nomor").val());
 	}
 	function sifat() {
 		$("#sifat").html($("#txt_sifat").val());
 	}
 	function lampiran() {
 		$("#lampiran").html($("#txt_lampiran").val());
 	}
 	function perihal() {
 		$("#perihal").html($("#txt_perihal").val());
 	}

 	function printsurat() {

 		var divToPrint=document.getElementById('print');

 		var newWin=window.open('','Print-Window');
 		var WinPrint = window.open('', '', 'left=0,top=0,width=300,height=400,toolbar=1,scrollbars=1,status=0');


 		newWin.document.open();

 		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

 		newWin.document.close();

 		setTimeout(function(){newWin.close();},10);
 	}
 </script>