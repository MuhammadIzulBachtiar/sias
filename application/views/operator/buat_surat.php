 <section id="basic-examples">
 	<div class="row">
 		<div class="col-xs-12 mt-1 mb-3">
 			<h4 class="">
 				Buat Surat <?php echo $sub ?>
 			</h4>
 			
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
 	<form action="<?php echo site_url('operator/cetak_surat');?>" method="POST">
 		
 	<div class="row" style="margin-top: -30px;">
 		<div class="col-md-12">
 			<div class="form-group">
 				<button class="btn btn-outline-primary" type="submit"><i class="fa fa-print"></i> Buat Surat</button>
 			</div>
 		</div>
 		<div class="col-md-12 " id="print" style="margin-bottom: 50px;">
 			<div class="card">
 				<div class="card-header">
 					
 				</div>
 				<div class="card-body card-block">
 					<ul class="nav nav-tabs customtab" role="tablist">
 						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Data</span></a> </li>
 						
 					</ul>
 					<!-- Tab panes -->
 					<div class="tab-content">
 						<div class="tab-pane active" id="home2" role="tabpanel">
 							<div class="p-20">
 								<div class="row">
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="">Tanggal</label>
 											<input type="date" name="tempat_tanggal" class="form-control" required="" onkeyup="tempat()" id="txt_tempat">
 											<input type="hidden" name="kategori" class="form-control" required="" value="<?php echo $this->uri->segment(2);?>" id="txt_tempat">
 										</div>
 										<div class="form-group">
 											<label for="">Kepada</label>
 											<select name="kepada" id="kepada" class="form-control" onchange="lain_kepada()">
 												<option value="">------------</option>
 												<option value="Lain-lain"> Lain-lain</option>
 											</select>
 											<input type="text" name="text_lainkepada" class="form-control" style="display: none;margin-top: 15px;"  id="text_lainkepada">

 										</div>
 									<div class="form-group">
 											<label for="">Kode Surat </label>
 											<input type="text" name="nomor" class="form-control" required="" onkeyup="nomor()" id="txt_nomor">
 										</div>
 										<div class="form-group">
 											<label for="">Sifat</label>
 											<select name="sifat" class="form-control">
 												<option value="">--------</option>
 												<option value="Umum">Umum</option>
 												<option value="Biasa">Biasa</option>
 												<option value="Rahasia">Rahasia</option>
 												<option value="Sangat Rahasia">Sangat Rahasia</option>
 											</select>
 										</div>
 										<div class="form-group">
 											<label for="">Kategori Surat </label>
 											<select name="kategori" class="form-control">
												<option value="">----</option>
												<option value="Undangan">Undangan</option>
												<option value="Permohonan">Permohonan</option>
												<option value="Laporan">Laporan</option>
												<option value="Pemberitahuan">Pemberitahuan</option>
												<option value="Undangan">Himbauan</option>
											</select>
 										</div>
 										<div class="form-group">
 											<label for="">Lampiran </label>
 											<select name="lampiran" class="form-control">
 												<option value="">------------</option>
 												<option value=" "> </option>
 												<option value="1 Lembar">1 Lembar</option>
 												<option value="2 Lembar">2 Lembar</option>
 												<option value="3 Lembar">3 Lembar</option>
 											</select>


 										</div>
 										<div class="form-group">
 											<label for="">Perihal </label>
 											<input type="text" name="perihal" class="form-control" required="" onkeyup="perihal()" id="txt_perihal">
 										</div>
 									</div>
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="">Isi Surat</label>
 											<textarea name="isi_surat" id="editor1" class="form-control" onkeyup="isi()" style="height: 200px"></textarea>
 										</div>
 									</div>
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="">Tembusan</label>
 											<select name="tembusan" id="tembusan" onchange="lain_tembusan()" class="form-control">
 												<option value="">------------</option>
 												<option value="Kepala Desa Sukapura">Kepala Desa Sukapura</option>
 												<option value="Kepala Desa Dayeuhkolot">Kepala Desa Dayuhkolot</option>
 												<option value="Lain-lain">Lain-lain</option>
 											</select>
 											<input type="text" name="text_laintembusan" class="form-control" style="display: none;margin-top: 15px;"  id="text_laintembusan">
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>

 	</form>
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
 											<div class="row">
 												<table class="table" width="100%">
 													<tr>
 														<td width="20%"><img src="logo2.png" alt="" width="100"></td>
 														<td>
 															<center>
 																<h5 style="margin: 0;font-family: sans-serif;font-size: 1rem;font-weight: 500;"> KEMENTERIAN PERHUBUNGAN</h5>
 																<h3 style="margin: 0;font-weight: 500;">DIREKTORAT JENDRAL PERHUBUNGAN LAUT</h3>
 																<h2 style="margin: 0;font-family: sans-serif;">KANTOR KESYAHBANDARAN DAN OTORITAS</h2>
 																<h2 style="margin: 0;font-family: sans-serif;">PELABUHAN KELAS II GRESIK</h2>
 															</center>
 														</td>
 														<td width="20%"></td>
 													</tr>
 												</table>
 												<table class="table" style="border-bottom: 1px double #000 width:100%">
 													<tr>
 														<td style="text-align: center;width: 30%;padding:15px;font-family: sans-serif;">
 															<h4 style="margin-bottom: 8px;">Jl. Yos Sudarso Gresik</h4>
 															<h4 style="margin: 0">Kode Pos : 61114</h4>
 														</td>
 														<td style="text-align: left;width: 40%;padding:5px 15px;border-left: 1px solid #000;border-right: 1px solid #000">
 															<div><span style="display: inline-block;width: 70px;">Telp</span><span>: (031) 3981902</span></div>
 															<div><span style="display: inline-block;width: 70px;">E-mail</span><span>:</span></div>
 															<div style="display: inline-block;width: 70px;"><span>Web-site</span><span>:</span></div>
 														</td>
 														<td style="text-align: left;width: 30%;padding: 5px 15px;">
 															<div><span style="display: inline-block;width: 70px;">TGM</span><span>:</span></div>
 															<div><span style="display: inline-block;width: 70px;">TLX</span><span>:</span></div>
 															<dir><span style="display: inline-block;width: 70px;">FAX</span><span>: (031) 3990588</span></dir>
 														</td>
 													</tr>	
 												</table>
 											</div>
 										</div>
 									</li>
 								</ul>
 								<hr>
 								<span style="float: right;" id="tempat"></span><br>
 								<span style="float: right;margin-right: 50px;">Kepada:</span><br>
 								<span style="float: right;margin-right: 0px; width: 200px;" id="kepada"></span>
 								<p style="margin-top: -10px!important;">Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span id="nomor"></span></p>
 								<p style="margin-top: -10px!important;">Klasifikasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span id="sifat"></span></p>
 								<p style="margin-top: -10px!important;">Lampiran &nbsp;&nbsp;&nbsp;&nbsp;: <span id="lampiran"></span></p>
 								<p style="margin-top: -10px!important;">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span ><u><b id="perihal"></b></u></span></p>
 								<p style="margin-left: 85px;" id="isi"></p>
 								<p style="float: right;  margin-top:500px; right: 60px;">KEPALA KANTOR</p>
 								<p style="float: right;  margin-top:600px; right: 60px;">KESYAHBANDARAN DAN OTORITAS PELABUHAN KELAS II GRESIK</p>
 								<p style="float: right; margin-top:690px; margin-right: -160px; text-align: center;"><u><b>R.TOTOK MUKARTOK,SH,CN,M.SI</b></u><br>Pembina Tk. I(IV/b) <br> NIP : 19670122 199003 1 001</p>
 								<p style="margin-top: 780px;" id="tembusan"></p>
 							</div>
 						</div>
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

 	function lain_kepada(){
 		var lain_kepada = $("#kepada").val();
 		if (lain_kepada == "Lain-lain") {
 			$("#text_lainkepada").css({"display":"block"});
 		}else{
 			$("#text_lainkepada").css({"display":"none"});

 		}
 	}

 	function lain_tembusan(){
 		var lain_tembusan = $("#tembusan").val();
 		if (lain_tembusan == "Lain-lain") {
 			$("#text_laintembusan").css({"display":"block"});
 		}else{
 			$("#text_laintembusan").css({"display":"none"});

 		}
 	}

 	function printsurat() {

 		var divToPrint=document.getElementById('print');

 		var newWin=window.open('','Print-Window');
 		var WinPrint = window.open('', '', 'left=0,top=0,width=300,height=400,toolbar=1,scrollbars=1');


 		newWin.document.open();

 		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

 		newWin.document.close();

 		setTimeout(function(){newWin.close();},10);
 	}
 </script>