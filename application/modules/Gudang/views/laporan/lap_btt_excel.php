<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Laporan_Barang_tidak_terpakai.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<style type="text/css">
  table{
    border-collapse:collapse;
    border: 1px solid black !important;;
  }
  table td{
    border: 1px solid black !important;;
  }
  table tr{
    border: 1px solid black !important;;
  } 
  table th{
    border: 1px solid black !important;;
  }    
  table tbody{
    border: 1px solid black !important;;
  }      
</style>
<h2><center>Laporan Barang Tidak Terpakai</center></h2>   
                    <table id="example2" class="table table-striped table-bordered" width="100%"> 
                      <thead>
                        <tr>
                          <th  style=" border: 1px solid black !important;" width="5%">No</th>
                          <th  style=" border: 1px solid black !important;" width="55%">Nama Barang</th>
                          <th  style=" border: 1px solid black !important;" width="20%">Tanggal Terakhir</th>
                          <th  style=" border: 1px solid black !important;" width="20%">Stock</th>
                        </tr>
                      </thead>
<?php if (isset($btt)) $no=1; { foreach ($btt as $btt) {
$barang=$this->db->query("SELECT kd_barang, nm_barang, MAX(tanggal) AS tanggal FROM tr_barang_keluar WHERE kd_barang='$btt->kd_barang' GROUP BY kd_barang")->row(); ?>
<tr>
  <td style=" border: 1px solid black !important;" align="center"><?php echo $no++; ?></td>
  <td style=" border: 1px solid black !important;" align="left"><?php echo $btt->nm_barang; ?></td>
  <td style=" border: 1px solid black !important;" align="left"><?php echo $barang->tanggal; ?></td>
  <td style=" border: 1px solid black !important;" align="right"><?php echo $btt->stock; ?></td>
</tr>
<?php }} ?>

                      
                    </table>