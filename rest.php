<?php
	$verb=$_SERVER['REQUEST_METHOD'];
	header('Content-Type: application/json');
	if($verb=='GET'){
		if(isset($_GET['filename']) ){
			if($_GET['filename']!='test.txt'){
				$response[]=array( "status"=>"Invalid File Name" , "data"=>"" );
				echo json_encode($response);
			}
			else{
				$file_content=file_get_contents($_GET['filename']);		
				$response[]=array( "status"=>"File Found" , "data"=>$file_content );
				echo json_encode($response);
			}
		}
		else {
			$response[]=array( "status"=>"File Not Found" , "data"=>"" );
			echo json_encode($response);
		}
			
	}
	else if($verb=='POST'){
		if(isset($_POST['filename']) and isset($_POST['content'])) {
			file_put_contents($_POST['filename'],$_POST['content']);
		}
		else 
			echo "errors exist in put";
	}
?>