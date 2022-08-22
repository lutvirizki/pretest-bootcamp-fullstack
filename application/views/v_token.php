<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Produk</h3>

                <div class="card-tools">
                  <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary" btn-xs>
                    <i class="fas fa-plus"></i>
                        Add</button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                if ($this->session->flashdata('pesan')){
                    echo'<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success</h5>';
                    echo $this->session->flashdata('pesan');
                    echo'</div>';
                }

                ?>
                
                <table class="table table-bordered" id="example1">
                    <thead class= "text-center">
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($token as $key => $value) { ?>
                            
                        
                            <tr> 
                                <td class= "text-center"><?= $no++; ?></td>
                                <td class= "text-center"><?= $value->kode ?></td>
                                <td class= "text-center"><?= $value->nama_produk ?></td>
                                <td class= "text-center"><?= $value->harga ?></td>
                                <td class= "text-center">
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" 
                                    data-target="#edit<?= $value->kode ?>"><i class= "fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" 
                                    data-target="#delete<?= $value->kode ?>"><i class= "fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }?>

                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>



        <!-- /.modal add-->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <?php
                echo form_open('token/add');
            ?>

            <div class="form-group">
                    <label >Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control"  placeholder="Nama Produk" required>
            </div>  

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save </button>
            </div>

            <?php
                echo form_close();
            ?>
            </div>

        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

<!-- /.modal edit-->
<?php foreach ($token as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->kode?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <?php
                echo form_open('token/edit/' . $value->kode);
            ?>

            <div class="form-group">
                    <label >Nama Produk</label>
                    <input type="text" name="nama_produk" value="<?= $value->nama_produk ?>" class="form-control"  placeholder="Nama Produk" required>
                  
                    

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save </button>
            </div>

            <?php
                echo form_close();
            ?>
            </div>

        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->
<?php } ?>


    <!-- /.modal delete-->
    <?php foreach ($token as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->kode ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?= $value->nama_produk ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <h5>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h5>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('token/delete/' .$value->kode) ?> " class="btn btn-primary">Delete</a>
            </div>

            

        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->
<?php } ?>