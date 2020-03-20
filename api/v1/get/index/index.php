<?
include_once($_SERVER['DOCUMENT_ROOT'].'/homework35/global_pass.php');

$id = (int)$_GET['id'];

$item = new Good($id);

$arr_info = $item->getLine();

$arr_info_new = [];

foreach($arr_info as $bla=>$blo){
	if($bla != 'queryString'){
		if($bla == 'photo'){
			$photos = json_decode($blo);
			$photos_new = [];
			//foreach($photos as $photo){
			//	$photos_new[] = PROJECT_URL.$photo;
			//}
			$value = $photos_new;
		}else{
			$value = $blo;
		}
		$arr_info_new[$bla] = $value;
	}
}

//var_dump($arr_info);

echo json_encode($arr_info_new, JSON_UNESCAPED_UNICODE); 
