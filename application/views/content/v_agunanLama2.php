
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
												<th>Jumlah Data Diambil</th>
												<td>
													<span class="badge badge-succes"><?php echo $dataLunas->ttd; ?></span>
												</td>
											</tr>
											<tr>
												<th>Jumlah Data Pinjam Lagi</th>
												<td>
													<span class="badge badge-succes"><?php echo $dataLunas->keterangan; ?></span>
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
															<option value="Pinjam Lagi">Pinjam Lagi</option>
															<option value="done">Diambil</option>
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
											<a href ="#" class="btn btn-inverse waves-effect waves-light" data-toggle="modal" data-target="#import" title="Import Excel"><i class="glyphicon glyphicon-folder-open"></i></a>
										</div>
										<tbody>
                                            <?php 
                                                foreach($query->result() as $row){
                                            echo "<tr>
                                                    <td><a href ='#' class ='on-default edit-row btn btn-primary' data-toggle='modal' title='Edit Data' data-target='#edit' onClick=\"EditData('".$row->id."','".$row->nomorAgunan."','".$row->nama."','".$row->alamat."','".$row->agunan."','".$row->detailAgunan."','".$row->realisasi."','".$row->lunas."','".$row->keterangan."','".$row->noHp."','".$row->ttd."')\"><i class ='glyphicon glyphicon-edit'></i></a>
                                                        <a href ='#' class ='on-default remove-row btn btn-danger' data-toggle='modal' title='Hapus Data' data-target='#hapus' onClick=\"HapusData('".$row->id."','".$row->nomorAgunan."','".$row->nama."','".$row->alamat."','".$row->agunan."','".$row->detailAgunan."','".$row->realisasi."','".$row->lunas."','".$row->keterangan."','".$row->noHp."','".$row->ttd."')\"><i class ='glyphicon glyphicon-trash'></i></a>
                                                        <a href ='TemplateWord2?id=".$row->id."' class ='btn btn-pink waves-effect waves-light' title='Surat'>Surat</a>
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
                                                    <td>".$row->ttd."</td>							
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

						<!--Modals button import-->
						<div id="import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Untuk import data excel</h4> 
                                    </div> 
                                    <div class="modal-body"> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php if(!empty($this->session->flashdata('status'))){ ?>
                                            <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                            <?php } ?>
                                            <form action="<?= base_url('c_agunanLama2/inputExcel'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Pilih File Excel</label>
                                                    <input type="file" name="fileExcel">
                                                </div>
                                                <div>
                                                    <button class='btn btn-success' type="submit">
                                                        Import		
                                                    </button>
                                                </div>
                                            </form>
                                            <ol class="breadcrumb">									
                                            </ol>
                                        </div>
                                    </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
									
                        <!-- modal button edit -->
                        <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Menambahkan Data Agunan</h4> 
                                    </div> 
                                    <form action="<?php echo base_url().'c_agunanLama2/edit'; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal-body"> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Id</label> 
                                            <div class="col-md-3"> 
                                                <input type="text" class="form-control" id="id" name="id" placeholder="000000" autocomplete="off" readonly> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label  class="col-md-3 control-label">Nomor Agunan</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="nomorAgunan" name="nomorAgunan" placeholder="000000" autocomplete="off"> 
                                            </div> 
                                        </div>  
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Nama</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Eka" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Keterangan</label> 
                                            <div class="col-md-8"> 
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
                                                <input type="text" class="form-control" id="realisasi" name="realisasi" placeholder="-" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label class="col-md-3 control-label">Lunas</label> 
                                            <div class="col-md-4"> 
                                                <input type="text" class="form-control" id="lunas" name="lunas" autocomplete="off"> 
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
                                                <input type="text" class="form-control" id="ttd" name="ttd" autocomplete="off"> 
                                            </div> 
                                        </div> 
                                        <div class="form-group no-margin"> 
                                            <label class="col-md-3 control-label">Alamat</label> 
                                            <div class="col-md-8"> 
                                                <textarea class="form-control autogrow" id="alamat" name="alamat" placeholder="Alamat sesuai KTP" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" autocomplete="off"></textarea>
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

						<!-- modal button tambah -->
                        <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Menambahkan Data Agunan</h4> 
                                    </div> 
                                    <form action="<?php echo base_url().'c_agunanLama2/tambah'; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                                <select class="form-control" data-style="btn-white" id="ttd" name="ttd" required>
                                                    <option>Lunas</option>
                                                    <option>Diambil</option>
                                                    <option>Pinjam Lagi</option>
                                                    <option>-</option>
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

                        <div id="hapus" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                                    </div>
                                    <form action="<?php echo base_url(). 'c_agunanLama2/hapus'; ?>" method="post" class="form-horizontal" role="form">
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
    function EditData( id,nomorAgunan, nama,alamat,agunan,detailAgunan,realisasi,lunas,keterangan,noHp,ttd){
        document.getElementById('id').value = id;
        document.getElementById('nomorAgunan').value = nomorAgunan  ;
        document.getElementById('nama').value = nama;
        document.getElementById('alamat').value = alamat;
        document.getElementById('agunan').value = agunan;
        document.getElementById('detailAgunan').value = detailAgunan;
        document.getElementById('realisasi').value = realisasi;
        document.getElementById('lunas').value = lunas;
        document.getElementById('keterangan').value = keterangan;
        document.getElementById('noHp').value = noHp;
        document.getElementById('ttd').value = ttd
    }

    function HapusData(idt){
        document.getElementById('idt2').value = idt;
    }

</script>
