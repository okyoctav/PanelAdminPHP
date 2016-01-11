<?php $message = $this->session->flashdata('message');?>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Responden
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Responden</li>
            
          </ol>
        </section>
        <?php if ($this->session->flashdata('message') != ""){?>
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
                <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php }
        if ($this->session->flashdata('error') != ""){?>
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo $this->session->flashdata('error');?>
        </div>
        <?php } ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>

                        <th>Username</th>
                        <th>Nama Lengkap </th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th>Aktif</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    
					
                        <?php foreach ($list_member as $list_member){?>
						<tr>
                        <td><?php echo $list_member->username;?></td>
                        <td><?php echo $list_member->full_name;?></td>
                        <td><?php echo $list_member->alamat;?></td>
                        <td><?php echo $list_member->tgl_lahir;?></td>
                        <td><?php if($list_member->status == "1"){echo "Administrator";}else{echo "User";};?></td>
                        <td><?php if($list_member->aktif == "1"){echo "Ya";}else{echo "Tidak";};?></td>
                      
                        <td><?php if($list_member->aktif == "1")
                        { ?> <a href="<?php echo base_url('action/non_aktif/')?>/<?php echo $list_member->id_user?>"><button class="btn btn-flat btn-danger btn-xs">Non Aktifkan</button></a>
                        <?php }else
                        { ?> <a href="<?php echo base_url('action/aktifkan/')?>/<?php echo $list_member->id_user?>"><button class="btn btn-flat btn-primary btn-xs">Aktifkan</button></a>
                        <?php }; ?></td>
						</tr>
						<?php } ?>
                      
                    
                     
                    </tbody>
                 
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->