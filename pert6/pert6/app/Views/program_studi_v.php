<section>
  <div class="container">
    <h2>Program Studi</h2>
    <p>
      <a href="<?php echo site_url('Program_Studi/add');?>" class="btn btn-primary btn-sm">  <i class="fa fa-plus">  Tambah</i>
      </a>
    </p>
    <table class="table table-striped table-bordered">
      <thead class="thead-light">
        <tr>
          <th>Aksi</th>
          <th>Kode</th>
          <th>Program_Studi</th>
          <th>Ketua</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($dataProdi as $row)?> 
        
        <tr>
          <td>
            <a href="" class="btn btn-warning btn-sm">
              <i class="fa fa-pencil">  Ubah</i> 
            </a>
            <a href="" class="btn btn-danger btn-sm">
              <i class="fa fa-trash">  Hapus</i> 
            </a>
          </td>
          <td><?php echo $row->kode_prodi?></td>
          <td><?php echo $row->prodi?></td>
          <td><?php echo $row->ketua?></td>
        </tr>

        

      </tbody>
    </table>
  </div>
</section>