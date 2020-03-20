<?
include_once($_SERVER['DOCUMENT_ROOT'].'/homework35/global_pass.php');

$page_num = $_GET['page_num'];
$per_page = 3;
if(!$_GET['page_num']){
	$page_num = 1;
}

$from_num = ($page_num-1)*$per_page;


$mego_arr= [];

$sql = $pdo->prepare("SELECT * FROM core_goods_group LIMIT $from_num,$per_page ");
$sql->execute();
while($item_line = $sql->fetch(PDO::FETCH_LAZY)){
	
	$item = new Good($item_line->id);

	$arr_info = $item->getLine();

	$arr_info_new = [];

	foreach($arr_info as $bla=>$blo){
		if($bla != 'queryString'){
			if($bla == 'photo'){
				$photos = json_decode($blo);
				$photos_new = PROJECT_URL.$photos[0];
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
	
	$mego_arr[] = $arr_info_new;

	//var_dump($arr_info);


}

echo json_encode($mego_arr, JSON_UNESCAPED_UNICODE); 
