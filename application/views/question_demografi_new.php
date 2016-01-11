<?php $message = $this->session->flashdata('message');?>

<script type="text/javascript">
    function optional(val){
        if(val === '4'){
       $(".new").append('<div class="second"><label>optional 1 :</label><input type="text" class="form-control input-sm" name="item1"><br/><label>optional 2 :</label><input type="text" class="form-control input-sm" name="item2"> <label>optional 3 :</label><input type="text" class="form-control input-sm" name="item3"><br/><label>optional 4 :</label><input type="text" class="form-control input-sm" name="item4"></div>').children(':last');
        }else{
          $(".second").remove();
        }
      }
  </script>
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
                  <h3 class="box-title">Tambah Pertanyaan Demografi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open('question/new_demografi')?>
                  <div class="box-body">
				  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pertanyaan Demografi</label>
                      <input type="text" name="pertanyaan" class="form-control" id="exampleInputEmail1" >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Jawaban</label>
          <select class="form-control" id="jenis_jawab" name="jenis_jawaban" onchange="optional(this.value)">
					 <?php foreach ($list_option as $list_option){?>
					<option value="<?php echo $list_option->id_jenis_jawaban;?>" ><?php echo $list_option->jenis_jawaban?></option>
					<?php } ?>
					</select> </div>
				       <div class="new"></div>
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