<?php $message = $this->session->flashdata('message');?>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Formulir
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
               <div class="col-md-6">
              <!-- general form elements -->
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Tambah Pertanyaan Survei</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open('question/new_survei')?>
                  <div class="box-body">
				  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pertanyaan Survei</label>
                      <input type="text" name="pertanyaan" class="form-control" id="exampleInputEmail1" >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Jawaban</label>
                     <select class="form-control" name="jenis_jawaban">
					 <?php foreach ($list_option as $list_option){?>
					<option value="<?php echo $list_option->id_jenis_jawaban; ?>"><?php echo $list_option->jenis_jawaban?></option>
					<?php } ?>
					</select> </div>
				
					
                    
                 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   <?php  echo form_submit('submit','submit')?>
                  </div>
               <?php echo form_close();?>
              </div><!-- /.box -->


            </div><!--/.col (left) -->
	

          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->