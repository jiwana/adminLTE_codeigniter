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

.rangeIklan .input-group{
    float:left;
}

.rangeIklan .col-md-0{
    float:left;
    padding:5px 10px;
}

.content-view{
    max-height: 1000px;
    overflow-x:hidden;
    background: #eee;
}

.content-view .refreshContent{
    float:right;
}

.content-view .single-content{
    background: #FFF none repeat scroll 0% 0%;
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.14);
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    padding: 10px 20px 20px;
    margin: 20px 9%;
}

.content-view .single-content .judul{
    margin: 0px;
    padding: 0px;
    line-height: 28px;
    font-size: 34px;
    margin:20px 0px 37px;
    color: #212121
}

.content-view .single-content .detailPhoto {
    text-align: center;
}

.content-view .single-content .detailPhoto img{
    width: 100%;
    max-width: 1080px;
}
.content-view .single-content .detailPhoto .imgVIdeo{
    width: 100%;
    height: 358px;
}

.content-view .single-content .descripsi {
    margin-top:10px;
    color: #212121;
    font-family: Roboto,arial,sans-serif;
    font-size: 16px;
    line-height:22.08px;
    vertical-align: baseline;
    letter-spacing: normal;
    word-spacing: 0px;
    margin-bottom: 35px;
}

.content-view .single-content .descripsi p{
    width: 100%;
}

.content-view .single-content .descripsi p img{
    margin: 5px auto;
}

.tab-content .panel-group{
    margin:15px 14px 0px;
}
.tab-content .panel-group .panel-title{
    color:#fff;
}

.tab-content .panel-group .panel-title a:hover{
    color:#fff;
}

</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <form role="form" method="post"  enctype="multipart/form-data"  action="<?php echo current_url() ?>">
                        <input type="hidden" maxlength="50" name="jenis" value="0">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input id="file-0a" class="file" name='file' type="file" data-min-file-count="<?php echo isset($thisData) ? 0 : 1 ?>" data-show-upload="false">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr/>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" maxlength="100" name="judul" value="<?php echo isset($thisData) ? $thisData->judul : null ?>" class="form-control" placeholder="judul"  required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="select2" data-placeholder="Pilih Kategori" required>
                                        <?php
                                            $object = kategoriData();
                                            printCombobox($object, isset($thisData) ? $thisData->kategori : null );
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="2"  name='deskripsi' placeholder="Deskripsi Singkat"><?php echo isset($thisData) ? $thisData->deskripsi : null ?></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title btn btn-success">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Preview</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body content-view">
                                            <a class="refreshContent btn btn-success">Refresh</a>
                                            <div class="clearfix"></div>
                                            <div class="single-content">
                                                <h1 class="judul">
                                                    Judul
                                                </h1>
                                                <div class="detailPhoto">
                                                    <img src="<?php echo isset($thisData) ? image_post.str_replace("-x", "-xOri",$thisData->file) : $fileDefault ?>">
                                                </div>
                                                <div class="descripsi">
                                                    Deskripsi
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <a class="refreshContent btn btn-success">Refresh</a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
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
        defaultPreviewContent:'\
        <div class="file-preview-frame" data-fileindex="0"> \
            <img src="<?php echo isset($thisData) ? image_post.str_replace("-x", "-xOri",$thisData->file) : default_post ?>" class="file-preview-image" style="width:auto;height:160px;"> \
            <div class="file-thumbnail-footer"> \
            </div> \
        </div>'
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.detailPhoto').find('img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function preview(){
        var content=$('.content-view');
        var editorValue=CKEDITOR.instances.deskripsi.getData();

        content.find('.single-content').each(function(){
            $(this).find('.judul').html($('input[name="judul"]').val());
            $(this).find('.descripsi').html(editorValue);
        });
    }

    $(document).ready(function(){

        CKEDITOR.replace('deskripsi',{
            height: '400px'
        });

        preview();

        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY HH:mm'
        });

        $('#file-0a').change(function(){
            readURL(this);
        });

        $('.refreshContent,.panel-title a').on('click',function(){
            preview();
        });
    });
</script>
<?php $this ->load->view('footer'); ?>