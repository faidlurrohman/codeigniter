
<div class="col-xl-9">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Edit Data Blog</strong>
                    </div>
					<?php
						foreach($blog->result() as $detail){
					?>
                    <form action="<?php echo base_url('admin/dub_konten/edit_blog_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">
							<input type="hidden" name="editId" value="<?php echo $detail->id_blog; ?>">
		          			<input type="hidden" readonly value="<?= $detail->img ?>" name="editImg" class="form-control" >
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editJudul" class=" form-control-label">Judul</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="editJudul" name="editJudul" autocomplete="off" style="text-transform: capitalize;" class="form-control" value="<?php echo $detail->judul; ?>" required>
                                </div>
                            </div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="editTgl" class=" form-control-label">Tanggal</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="date" id="editTgl" name="editTgl" autocomplete="off" style="text-transform: capitalize;" class="form-control" value="<?php echo $detail->tgl; ?>" required>
								</div>
							</div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editDesk" class=" form-control-label">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="editDesk" id="tinyMce" rows="9" class="form-control"><?php echo $detail->deskripsi; ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="gambarBlog" class=" form-control-label">Ubah Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="gambarBlog" name="gambarBlog" class="form-control-file">
                                </div>
                            </div>
                            <div class="row form-group">
                        		<div class="col-md-6">
                            		<div class="card">
                                		<img style="max-width: 100%;" src="<?php echo base_url('assets/dub_user/images/blog/');?><?= $detail->img ?>">
                        			</div>
                        		</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Update
                            </button>
                            <button onclick="window.location='<?php echo base_url();?>admin/blog'" type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;Batal
                            </button>
                        </div>
                    </form>
					<?php
						}
					?>
                </div>
			</div>
		</div>
	</div>
</div>
