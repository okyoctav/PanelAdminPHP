 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Formulir
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('home')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Form Demografi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
          
              <!-- general form elements -->
              
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

				<?php foreach($list_question as $list_question){?>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open('home/submit_form_demografi');?>
                  <div class="box-body">		  
                    <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $list_question->pertanyaan_demografi?></label>
                      <input type="hidden" value="<?php echo $list_question->id_pertanyaan_demografi ?>" name="id_pertanyaan">
                      <?php
                        if($list_question->id_jenis_jawaban == "1"){
                            echo "<div class='radio'> <label>";
                            echo "<input type='radio' name='jawaban' value='1'> Ya <br>" ;
                            echo "<input type='radio' name='jawaban' value='0'> Tidak";
                            echo "</label></div>";
                        }
                        elseif ($list_question->id_jenis_jawaban == "2") {
                          echo "<input type='text' class='form-control' name='jawaban' value='' placeholder='Jawaban anda ?'>";
                        }
                        elseif ($list_question->id_jenis_jawaban == "3") {
                          echo "<input type='date' class='form-control' name='jawaban'>" ;
                        }
                        else{
                          echo "<input type='text' class='form-control' name='jawaban' value='' placeholder='Jawaban anda ?'>";
                        }
                      ?>
              <!--       <input type="$list_question->id_jenis_jawaban" class="form-control" name="<?php echo $list_question->id_pertanyaan_demografi?>" placeholder="<?php echo $list_question->pertanyaan_demografi;?>" > -->
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>	
          </div><!-- /.box -->
        </div><!--/.col (left) -->
                <?php echo form_close();?>
                <?php } ?>
               
              

          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->