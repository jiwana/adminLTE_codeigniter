<?php $this->load->view('header')?>
<section class="content">
    <div class="box">
        <form method="post" id="dataform" action="<?php echo site_url('post/pilihan') ?>">
            <div class="box-header action">
                <div class="tambah">
                    <a class="btn btn-primary btn-block" href="<?php echo site_url('post/add') ?>">
                        <span  class="glyphicon glyphicon-plus"></span> Tambah
                    </a>
                </div>
                <?php optionBar() ?>
                <div class="clearfix"></div>
            </div>
            <div class="box-body over-body">
                <table id="datatbl" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:10px"><input type="checkbox" class="allcb" value="" /></th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>status</th>
                            <th>Waktu Buat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($rows as $row) {
                        ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="datacb" name="list[]" value="<?php echo $row->id ?>" />
                                </td>
                                <td><?php echo findKategori($row->kategori) ?></td>
                                <td>
                                    <img src="<?php echo image_post.'/'.str_replace('-x', '-x110', $row->file ) ?>" alt="Not Found" />
                                </td>
                                <td><?php echo anchor('post/edit/'.$row->id,$row->judul) ?></td>
                                <td><?php echo statusIcon($row->status) ?></td>
                                <td><?php echo convertDateTime($row->waktu_buat) ?></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</section>
<?php $this->load->view('libJs')?>
<script>
    $(document).ready(function(){
        $("#datatbl").dataTable({
            columnDefs: [ { "targets": 0, "orderable": false } ]
        });
        $("#datatbl").dataTblStyle();
    });
</script>
<?php $this->load->view('footer')?>