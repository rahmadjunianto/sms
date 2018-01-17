
<form method="post" action="<?php echo base_url().'setting/sistem/do_role'?>">
<div class="page-title">

            </div>

            <div class="clearfix"></div>
<?php echo $this->session->flashdata('message')?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Privilege</h2>
      <div class="pull-right">
        <div class="btn-group">
          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button> <?php echo anchor('setting/sistem/privilege','<i class="fa fa-list"></i> List',' class="btn btn-sm btn-success"');?>    
        </div>
      
    </div>    <input type="hidden" name="kode_group"  value="<?php echo $kode_groupq;?>">                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="example2" class="table table-striped table-bordered">
                      <thead>
                                        <tr>
                                          <th width="4%">No</th>
                                          
                                          <th colspan="2">Menu</th>
                                          <th>Parent</th>
                                        </tr>
                      </thead>

                                      <tbody>
                                        <?php $no=1;
                                          foreach($role as $row){
                                            $st=$no%2;
                                        ?>
                                        <tr >
                                          <td align="center"><?php echo $no;?></td>
                                          <td width="3%" align="center"><input <?php if($row['status_role']==1){ echo "checked";}?> type="checkbox" name="role[]" value="<?php echo $row['kode_role']; ?>"></td>
                                          <td><?php echo ucwords($row['nama_menu']);?></td>
                                          <td><?php echo ucwords($row['parent']);?></td>
                                        </tr>
                                        <?php $no++;}?>
                                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>



            </div>
</form>