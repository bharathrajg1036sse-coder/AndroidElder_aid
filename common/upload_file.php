
<?php
function upload($f,$dir){
 if(!is_dir($dir)) mkdir($dir,0777,true);
 $n=time().'_'.$f['name'];
 move_uploaded_file($f['tmp_name'],$dir.'/'.$n);
 return $dir.'/'.$n;
}
?>
