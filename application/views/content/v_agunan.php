
			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->						
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Daftar Agunan</b></h4>									
									<table id="demo-foo-filtering" class="table table-striped toggle-arrow-tiny m-b-0" data-page-size="50">
										<thead>
											<tr>
												<th>Jumlah Data Total</th>
												<td>
													<span class="badge badge-inverse"><?php echo $dataLunas->id; ?></span>
												</td>
											</tr>
											<tr>
												<th>Jumlah Data Lunas</th>
												<td>
													<span class="badge badge-succes"><?php echo $dataLunas->status; ?></span>
												</td>
											</tr>
											<tr>
                                                <th>Aksi</th>
												<th data-toggle="true">Id</th>
												<th data-hide="phone">No Agunan</th>
												<th data-hide="phone">Nama Debitur</th>
												<th data-hide="tablet">Alamat</th>
												<th data-hide="tablet">Agunan</th>
												<th data-hide="tablet">Detail Agunan</th>
												<th data-hide="tablet">Tanggal Realisasi</th>
												<th data-hide="tablet">Tanggal Lunas</th>
												<th data-hide="tablet">Keterangan</th>
												<th data-hide="tablet">No Hp</th>
												<th data-hide="tablet">Status</th>
											</tr>
										</thead>
										<div class="form-inline m-b-20">
											<div class="row">
												<div class="col-sm-6 text-xs-center">
													<div class="form-group">
														<label class="control-label m-r-5">Status</label>
														<select id="demo-foo-filter-status" class="form-control input-sm">
															<option value="">Show all</option>
															<option value="lunas">Lunas</option>
															<option value="diambil">Diambil</option>
															<option value="belum">Belum</option>
														</select>
													</div>
												</div>
												<div class="col-sm-6 text-xs-center text-right">
													<div class="form-group">
														<input id="demo-foo-search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on" onmouseover="this.focus();">
													</div>
												</div>
											</div>
										</div>			
										<div style="width: 100%; text-align: right; margin-bottom: 5px;">
											<a href ="#" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#tambah" title="Tambah Data" onClick="TambahData()"><i class="glyphicon glyphicon-pencil"></i></a>
										</div>
										<tbody>
                                            <?php 
                                                foreach($query->result() as $row){
                                            echo "<tr>
                                                    <td>
                                                        <a href ='#' class ='on-default edit-row btn btn-primary' data-toggle='modal' title='Edit Data' data-target='#edit' onClick=\"EditData('".$row->id."','".$row->nomorAgunan."','".$row->nama."','".$row->alamat."','".$row->agunan."','".$row->detailAgunan."','".$row->realisasi."','".$row->lunas."','".$row->keterangan."','".$row->noHp."','".$row->status."')\"><i class ='glyphicon glyphicon-edit'></i></a>
                                                        <a href ='#' class ='on-default remove-row btn btn-danger' data-toggle='modal' title='Hapus Data' data-target='#hapus' onClick=\"HapusData('".$row->id."','".$row->nomorAgunan."','".$row->nama."','".$row->alamat."','".$row->agunan."','".$row->detailAgunan."','".$row->realisasi."','".$row->lunas."','".$row->keterangan."','".$row->noHp."','".$row->status."','".$row->qrcode."')\"><i class ='glyphicon glyphicon-trash'></i></a>
                                                        <a href ='#' class ='btn btn-info waves-effect waves-light' data-toggle='modal' title='Barcode' data-target='#barcode$row->id'><i class ='glyphicon glyphicon-qrcode'></i></a>
                                                        <a href ='TemplateWord?id=".$row->id."' class ='btn btn-pink waves-effect waves-light' title='Surat'>Surat</a>
                                                    </td>
                                                    <td>".$row->id."</td>
                                                    <td>".$row->nomorAgunan."</td>
                                                    <td>".$row->nama."</td>
                                                    <td>".$row->alamat."</td>
                                                    <td>".$row->agunan."</td>
                                                    <td>".$row->detailAgunan."</td>
                                                    <td>".$row->realisasi."</td>
                                                    <td>".$row->lunas."</td>
                                                    <td>".$row->keterangan."</td>		
                                                    <td>".$row->noHp."</td>	
                                                    <td>".$row->status."</td>							
                                                </tr>";										
                                                } 
                                            ?>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="5">
													<div class="text-right">
														<ul class="pagination pagination-split m-t-30 m-b-0"></ul>
													</div>
												</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
									
                        <!-- modal button tambah -->
                        <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Menambahkan Data Agunan</h4> 
                                    </div> 
                                    <form action="<?php echo base_url().'c_agunan/tambah'; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal-body"> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Id</label> 
                                            <div class="col-md-4"> 
                                                <input type="number" class="form-control" id="id" name="id" placeholder="000000" autocomplete="off" required> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Nomor Agunan</label> 
                                            <div class="col-md-4"> 
                                                <input type="number" class="col-md-3 form-control" id="nomorAgunan" name="nomorAgunan" autocomplete="off" required placeholder="000000"> 
                                            </div> 
                                        </div>  
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Nama</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Eka" required autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Keterangan</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Agunan</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="agunan" name="agunan" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Detail Agunan</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="detailAgunan" name="detailAgunan" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Realisasi</label> 
                                            <div class="col-md-4"> 
                                                <input type="date" class="form-control" id="realisasi" name="realisasi" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Lunas</label> 
                                            <div class="col-md-4"> 
                                                <input type="date" class="form-control" id="lunas" name="lunas"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">No Hp</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="noHp" name="noHp" placeholder="081222333444" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Status</label> 
                                            <div class="col-md-4"> 
                                                <select class="form-control" data-style="btn-white" id="status" name="status" required>
                                                    <option>Lunas</option>
                                                    <option>Diambil</option>
                                                    <option>Belum</option>
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="form-group no-margin"> 
                                            <label class="col-md-3 control-label">Alamat</label> 
                                            <div class="col-md-9"> 
                                                <input type="hidden" id="qrcode" name="qrcode">
                                                <textarea class="form-control autogrow" id="alamat" name="alamat" placeholder="Alamat sesuai KTP" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-dismiss="modal">Tutup</button> 
                                        <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">Simpan</button> 
                                    </div> 
                                    </form>
                                </div> 
                            </div>
                        </div>

                        <!-- modal button edit -->
                        <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Edit Data Agunan</h4> 
                                    </div> 
                                    <form action="<?php echo base_url().'c_agunan/edit'; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal-body"> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Id</label> 
                                            <div class="col-md-4"> 
                                                <input type="number" class="form-control" id="id2" name="id2" placeholder="000000" autocomplete="off" readonly> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Nomor Agunan</label> 
                                            <div class="col-md-4"> 
                                                <input type="number" class="col-md-3 form-control" id="nomorAgunan2" name="nomorAgunan2" autocomplete="off" required placeholder="000000"> 
                                            </div> 
                                        </div>  
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Nama</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="nama2" name="nama2" placeholder="Eka" required autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Keterangan</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="keterangan2" name="keterangan2" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Agunan</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="agunan2" name="agunan2" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Detail Agunan</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="detailAgunan2" name="detailAgunan2" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Realisasi</label> 
                                            <div class="col-md-4"> 
                                                <input type="date" class="form-control" id="realisasi2" name="realisasi2" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Lunas</label> 
                                            <div class="col-md-4"> 
                                                <input type="date" class="form-control" id="lunas2" name="lunas2"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">No Hp</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="noHp2" name="noHp2" placeholder="081222333444" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Status</label> 
                                            <div class="col-md-4"> 
                                                <select class="form-control" data-style="btn-white" id="status2" name="status2" required>
                                                    <option>Lunas</option>
                                                    <option>Diambil</option>
                                                    <option>Belum</option>
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="form-group no-margin"> 
                                            <label class="col-md-3 control-label">Alamat</label> 
                                            <div class="col-md-9"> 
                                                <input type="hidden" id="qrcode" name="qrcode">
                                                <textarea class="form-control autogrow" id="alamat2" name="alamat2" placeholder="Alamat sesuai KTP" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-dismiss="modal">Tutup</button> 
                                        <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">Simpan</button> 
                                    </div> 
                                    </form>
                                </div> 
                            </div>
                        </div>
                        

                        <?php 
                            foreach($query->result() as $row){ ?>
                            <div id="barcode<?= $row->id ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="mySmallModalLabel">Barcode</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo base_url().'ubold/assets/images/barcodebyid/'.$row->qrcode; ?>" class="content-img">
                                            <span class="form-control text-center"><?php echo $row->nama ?></span>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->                                            
                        <?php } ?>

                        <div id="hapus" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                                    </div>
                                    <form action="<?php echo base_url(). 'c_agunan/hapus'; ?>" method="post" class="form-horizontal" role="form">
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus?</p>
                                            <div>
                                                <input type="hidden" id="idt2" name="idt2">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->  

<script type="text/javascript">
    function EditData( id2,nomorAgunan2, nama2,alamat2,agunan2,detailAgunan2,realisasi2,lunas2,keterangan2,noHp2,status2){
        document.getElementById('id2').value = id2;
        document.getElementById('nomorAgunan2').value = nomorAgunan2  ;
        document.getElementById('nama2').value = nama2;
        document.getElementById('alamat2').value = alamat2;
        document.getElementById('agunan2').value = agunan2;
        document.getElementById('detailAgunan2').value = detailAgunan2;
        document.getElementById('realisasi2').value = realisasi2;
        document.getElementById('lunas2').value = lunas2;
        document.getElementById('keterangan2').value = keterangan2;
        document.getElementById('noHp2').value = noHp2;
        document.getElementById('status2').value = status2;
    }

    function HapusData(idt){
        document.getElementById('idt2').value = idt;
    }

    function TambahData(id,nomorAgunan, nama,alamat,agunan,detailAgunan,realisasi,lunas,keterangan,noHp,status,qrcode){
        document.getElementById('id').value = "";
        document.getElementById('nomorAgunan').value = ""  ;
        document.getElementById('nama').value = "";
        document.getElementById('alamat').value = "";
        document.getElementById('jamTutup').value = "";
        document.getElementById('detailAgunan').value = "";
        document.getElementById('realisasi').value = "";
        document.getElementById('lunas').value = "";
        document.getElementById('keterangan').value = "";
        document.getElementById('noHp').value = "";
        document.getElementById('status').value = "";
        document.getElementById('qrcode').value = "";
    }
</script>

<!--Gudang-->

<!--
<div class='btn-group'>
    <button type='button' class='btn btn-pink dropdown-toggle waves-effect waves-light' data-toggle='dropdown' aria-expanded='false'>Surat <span class='caret'></span></button>
    <ul class='dropdown-menu' role='menu'>
        <li><a href='templateWord?id=".$row->id."'>Cetak Word</a></li>
        <li><a href='#'>Another action</a></li>
        <li><a href='#'>Something else here</a></li>
    </ul>
</div>
-->