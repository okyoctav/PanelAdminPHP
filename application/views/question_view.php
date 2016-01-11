<?php $message = $this->session->flashdata('message');?>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Daftar pertanyaan
            <small>Preview</small>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
               <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
                  <h4 class="box-title">Daftar Pertanyaan Demografi </h4> <a class="btn btn-warning pull-right" href="<?php echo base_url('question/new_demografi')?>" >New</a>
                </div><!-- /.box-header -->
                <!-- form start -->
				 <div class="box-body">
				
              </div><!-- /.box-body -->
			      <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Pertanyaan</th>
                      <th>Jenis jawaban</th>
                      
                      <th style="width: 40px">Action</th>
                    </tr>
					<?php $no=0; foreach($list_question_demografi as $list_question_demografi){?>
                    <tr>
                      <td><?php  echo ++$no;?></td>
                      <td><?php echo $list_question_demografi->pertanyaan_demografi;?></td>
                      <td><?php echo $list_question_demografi->jenis_jawaban;?></td>
                     
                      <td><a class="btn btn-primary" href="question/edit_demografi/<?php echo $list_question_demografi->id_pertanyaan_demografi;?>/<?php echo $list_question_demografi->id_jenis_jawaban;?>" >Edit</a></td>
                    </tr>
                   <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!--/.col (left) -->
			     <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header">
                  <h4 class="box-title">Daftar Pertanyaan Survei </h4> <a class="btn btn-warning pull-right" href="<?php echo base_url('question/new_survei')?>" >New</a>
                </div><!-- /.box-header -->
                <!-- form start -->
				 <div class="box-body">
				
              </div><!-- /.box-body -->
			      <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Pertanyaan </th>
                      <th>Jenis Jawaban </th>
                      
                      <th style="width: 40px">Action</th>
                    </tr>
					<?php $no=0; foreach($list_question_survei as $list_question_survei){?>
                    <tr>
                      <td><?php  echo ++$no;?></td>
                      <td><?php echo $list_question_survei->pertanyaan_survei;?></td>
                      <td><?php echo $list_question_survei->jenis_jawaban;?></td>
                     
                      <td><a class="btn btn-primary" href="question/edit_survei/<?php echo $list_question_survei->id_pertanyaan_survei; ?>/<?php echo $list_question_survei->id_jenis_jawaban; ?>" >Edit</a></td>
                    </tr>
                   <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!--/.col (left) -->

          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->