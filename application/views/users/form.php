<?php $this->load->view('header'); ?>
<style>
.file-preview-frame{
    float:none;
    margin: 0px auto;
}
.file-preview{
    border:none;
}
.file-preview .close{
    display: none;
}
.file-footer-caption{
    display: none;
}
</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <legend>Data Personalia</legend>
                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo site_url('users/individu') ?>">
                        <div class="box-body">
                            <div class="col-md-4">
                                <input id="file-0a" class="file" name='file' type="file" data-min-file-count="0" data-show-upload="false">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" maxlength="30" name="nama" value="<?php echo $dataUser->nama ?>"  class="form-control" placeholder="Nama"  required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="clearfix" ></div>
                                    <?php
                                        $js=isset($dataUser->jenis_kelamin) ? $dataUser->jenis_kelamin : 1;
                                        printRadioButton($gender_array,'id','nama',$js,'gender');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="date datetimepicker form-control" name="tgl_lahir"
                                        value="<?php echo convertDateTime($dataUser->tgl_lahir,'d-m-Y') ?>" data-inputmask="'alias': 'yyyy-mm-dd'"  required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" maxlength="150" rows="2" name='alamat' placeholder="Alamat"  required><?php echo $dataUser->alamat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" maxlength="50" name="email" value="<?php echo $dataUser->email ?>" class="form-control" placeholder="email"  required>
                                </div>
                                <div class="form-group">
                                    <label>Telp / Hp</label>
                                    <input type="tel" name="tlp" maxlength="16" value="<?php echo $dataUser->tlp ?>" class="form-control" placeholder="Telp / Hp"  required>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <?php if(isset($errorUser)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errorUser ?>
                        </div>
                    <?php } ?>
                    <legend>Setting User</legend>
                    <form role="form" method="post" action="<?php echo site_url('users/users') ?>">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="user_name" maxlength="20" readOnly disabled value="<?php echo $dataUser->user_name ?>" class="form-control" placeholder="user Name">
                                </div>
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" maxlength="15" class="form-control" name="oldPass" placeholder="Old Password" >
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <div class="input-group">
                                        <input type="password" maxlength="15" class="form-control" name="newPass" placeholder="New Password" >
                                        <span class="input-group-btn">
                                            <button class="btn btn-default view-pass" type="button">
                                                <i class="glyphicon glyphicon-eye-close"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Re-Password</label>
                                    <input type="password" maxlength="15" class="form-control" name="rePass" placeholder="Re-Password" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('libJs')?>
<script>
    $('#file-0a').fileinput({
        defaultPreviewContent:'<div class="file-preview-frame" data-fileindex="0"> \
   <img src="<?php echo isset($dataUser->photo) ? image_user.str_replace("-x","-xOri", $dataUser->photo) : default_user ?>" class="file-preview-image" style="width:auto;height:160px;"> \
   <div class="file-thumbnail-footer"> \
    </div> \
</div>'
    });

    $('.view-pass').on('click', function () {
        if($(this).hasClass('tampil')){
            $(this).removeClass('tampil');
            $(this).find('i').attr('class','glyphicon glyphicon-eye-close');
            $('input[name="newPass"]').attr('type', 'password');
        }else{
            $(this).addClass('tampil');
            $(this).find('i').attr('class','glyphicon glyphicon-eye-open');
            $('input[name="newPass"]').attr('type', 'text');
        }
        return false;
    })
    $('.datetimepicker').datetimepicker({
        format: 'DD-mm-YYYY'
    });
</script>
<?php $this ->load->view('footer'); ?>