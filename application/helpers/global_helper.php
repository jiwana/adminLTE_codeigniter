<?php

function kategoriData(){
    return array(
        "Menu",
        "Mungkinkan"
    );
}

function findKategori($id){
    $data=kategoriData();
    return isset($data[$id]) ? $data[$id] : 'Tidak di temukan';
}

function loggedUser(){
    $ci =& get_instance();
    return $ci->session->userdata('id_user');
}

function setLogin($idUser,$idIndividu){
    $ci =& get_instance();
    $data=array(
        'id_user' => $idUser,
        'id_individu' => $idIndividu
    );
    $ci->session->set_userdata($data);
}

function unsetLogin(){
    $ci =& get_instance();
    $data=array(
        'id_user' => '',
        'id_individu' => ''
    );
    $ci->session->set_userdata($data);
}

function isLogin(){
    if(loggedUser()){
        return TRUE;
    }else{
        return FALSE;
    }
}

function printRadioButton($data,$value,$view,$selected,$name,$required=null){
    foreach ($data as $r) {
        if(is_array($view)){
            $views = $r[$view[0]]." (".$r[$view[1]].")";
        }else{
            $views = $r[$view];
        }
        $name=isset($name) ? $name : null ;
        $required=isset($required) ? $required : null ;
        if(is_array($selected)){
            if(in_array($r[$value], $selected)){
                echo '<label class="radio-inline">';
                echo '<input type="radio" name="'.$name.'" '.$required.' checked value="'.$r[$value].'"> '.$views;
                echo '</label>';
            }else{
                echo '<label class="radio-inline">';
                echo '<input type="radio" name="'.$name.'" '.$required.' value="'.$r[$value].'"> '.$views;
                echo '</label>';
            }
        }else{
            if($r[$value] == $selected){
                echo '<label class="radio-inline">';
                echo '<input type="radio" name="'.$name.'" '.$required.' checked value="'.$r[$value].'"> '.$views;
                echo '</label>';
            }else{
                echo '<label class="radio-inline">';
                echo '<input type="radio" name="'.$name.'" '.$required.' value="'.$r[$value].'"> '.$views;
                echo '</label>';
            }
        }
    }
}

function printCombobox($object,$selected){
    $CI =& get_instance();
    foreach ($object as $key=>$r) {
        if($key == $selected){
            echo '<option selected="selected" value="'.$key.'">'.$r.'</option>';
        }else{
            echo '<option value="'.$key.'">'.$r.'</option>';
        }
    }
}


function convertDateTime($date,$format = 'd-m-Y H:i'){
    if(is_string($date))
    {
        $date = DateTime::createFromFormat('Y-m-d H:i:s',$date);
    }
    return $date->format($format);
}

function message(){
    $ci =& get_instance();
    if( $ci->session->flashdata('success') ){
        echo "<div class='alert alert-success' role='alert'>";
        echo $ci->session->flashdata('success');
        echo "</div>";
    }
    if( $ci->session->flashdata('info') ){
        echo "<div class='alert alert-info' role='alert'>";
        echo $ci->session->flashdata('info');
        echo "</div>";
    }
    if( $ci->session->flashdata('warning') ){
        echo "<div class='alert alert-warning' role='alert'>";
        echo $ci->session->flashdata('warning');
        echo "</div>";
    }
    if( $ci->session->flashdata('error') ){
        echo "<div class='alert alert-danger' role='alert'>";
        echo $ci->session->flashdata('error');
        echo "</div>";
    }
}

function statusIcon($status){
    return $status=='y' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' ;
}


function optionBar(){
    echo '
        <div class="menu-action">
            <div class="menu-select">
                <select name="pilihanOpsi" class="form-control">
                    <option class="selecPlac" value="null">Pilih Opsi</option>
                    <option value=0>Aktif</option>
                    <option value=1>Tidak Aktif</option>
                    <option value=2>Hapus</option>
                </select>
            </div>
            <div class="menu-apply">
                <button type="submit" class="btn btn-success btn-block">
                    <span class="fa fa-check"></span>
                </button>
            </div>
        </div>
    ';
}

function judulSEO($judul,$replace='-',$karakter='-',$format='.html')
{
    $karakter_array = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']','<','>');
    $hapus_karakter_aneh = strtolower(str_replace($karakter_array,"",$judul));
    $tambah_strip = strtolower(str_replace(' ', $replace, $hapus_karakter_aneh));
    $pemalinkArray=explode("-",$tambah_strip);
    $valueString="";
    $countMax=5;
    $j=0;
    for ($i=0; $i <count($pemalinkArray) ; $i++) {
        $hapus_karakter_aneh = strtolower(str_replace($karakter_array,"",$pemalinkArray[$i]));
        $string = strtolower(str_replace(' ', "", $hapus_karakter_aneh));
        if($string===''){
            // $countMax++;
        }else{
            if($j>=$countMax){
                break;
            }else{
                $valueString.=($string.$karakter);
                $j++;
            }

        }
    }
    $valueString=substr_replace($valueString, '', strlen($valueString)-1);
    $link_akhir = $valueString.$format;
    return $link_akhir;
}

function uploadGambar($file,$folder,$extenstion,$max_size_file,$min_file,$idPost){
    $filename       = explode(".", $file["name"]);
    if(isset($filename[1])){
        $file_name = $file['name'];
        $file_name_no_ext = isset($filename[0]) ? $filename[0] : null;
        $file_extension = $filename[count($filename)-1];
        $file_weight = $file['size'];
        $file_type = $file['type'];
        $fileAwalName = $idPost.'-x';
        $fileNewName=$fileAwalName.'.'.$file_extension;

        if( is_dir($folder) === false ){
            mkdir($folder);
        }

        if( $file['error'] == 0 ){
            if( in_array($file_extension, $extenstion)){
                if( $file_weight <= $max_size_file ){
                    if( move_uploaded_file($file['tmp_name'], $folder.$fileNewName) ){

                        if( $file_extension=='jpg' or $file_extension=='jpeg' or $file_extension=='JPG'  ){
                            $im_src = imagecreatefromjpeg($folder.$fileNewName);
                        }else if( $file_extension=='png' ){
                            $im_src = imagecreatefrompng($folder.$fileNewName);
                        }
                        $src_width = imageSX($im_src);
                        $src_height = imageSY($im_src);

                        if( $src_width > 1080){
                                $imgWNew=1080;
                        }else{
                            $imgWNew=$src_width;
                        }

                        if( $src_height > 1080){
                            $imgHNew=1080;
                        }else{
                            $imgHNew=$src_height;
                        }

                        $im = imagecreatetruecolor($imgWNew,$imgHNew);
                        imagecopyresampled($im, $im_src, 0, 0, 0, 0, $imgWNew, $imgHNew, $src_width, $src_height);
                        imagejpeg($im,$folder. $fileAwalName .'Ori.'.$file_extension);

                        $im = imagecreatetruecolor($min_file,$min_file);
                        imagecopyresampled($im, $im_src, 0, 0, 0, 0, $min_file, $min_file, $src_width, $src_height);
                        imagejpeg($im,$folder. $fileAwalName .$min_file.'.'.$file_extension);

                        imagedestroy($im_src);
                        imagedestroy($im);

                        unlink($folder.$fileNewName);

                        $value=$fileAwalName.'.'.$file_extension;
                    }
                }
            }
        }
    }

    if(isset($value)){
        return $value;
    }else{
        return null;
    }
}


function getDataUser($id){
    $CI =& get_instance();
    $CI->load->model('Musers');
    $data=$CI->Musers->getFindUsers($id);
    return $data[0];
}