<?php
session_start();
ob_start();
// $_SESSION['u_id']=1010101;
// session_destroy();
	require_once("../db/controller.php");
	$db=new controller("localhost","root","","nfc_dts");
	if(isset($_POST['load_p_patient'])){
		echo $db->select("p_patient","*","where 1");
	}else if(isset($_POST['p_patient_add'])){
		echo $db->insert("p_patient","p_name,p_lname,p_age,p_blood,p_weight,p_height,p_gender","'{$_POST['p_name']}','{$_POST['p_lname']}','{$_POST['p_age']}','{$_POST['p_blood']}','{$_POST['p_weight']}','{$_POST['p_height']}','{$_POST['p_gender']}'");
	}else if(isset($_POST['p_patient_update'])){
		echo $db->update("p_patient","p_name='{$_POST['p_name']}',p_lname='{$_POST['p_lname']}',p_age='{$_POST['p_age']}',p_blood='{$_POST['p_blood']}',p_weight='{$_POST['p_weight']}',p_height='{$_POST['p_height']}',p_gender='{$_POST['p_gender']}'","p_id='{$_POST['p_id']}'");
	}else if(isset($_POST['p_patient_del'])){
		echo $db->delete("p_patient","p_id='{$_POST['p_id']}'");
	}else if(isset($_POST['load_p_drug'])){
		echo $db->select("p_drug","*","where 1");
	}else if(isset($_POST['select_p_drug'])){
		echo $db->select("p_math_use_drug","*","where d_id='{$_POST['filter']}'");
	}else if(isset($_POST['load_p_use'])){
		echo $db->select("p_use","*","where 1");
	}else if(isset($_POST['p_drug_add'])){
		echo $db->insert("p_drug","d_id,d_name,d_expire,d_info","'{$_POST['d_id']}','{$_POST['d_name']}','{$_POST['d_expire']}','{$_POST['d_info']}'");

		if(isset($_POST['p_use'])){
			foreach ($_POST['p_use'] as $key => $value) {
				$db->insert("p_math_use_drug","u_id,d_id","{$value},'{$_POST['d_id']}'");
			}
		}
	}else if(isset($_POST['p_drug_del'])){
		echo $db->delete("p_drug","d_id='{$_POST['d_id']}'");
		$db->delete("p_math_use_drug","d_id='{$_POST['d_id']}'");
	}else if(isset($_POST['p_drug_update'])){
		echo $db->update("p_drug","d_name='{$_POST['d_name']}',d_expire='{$_POST['d_expire']}',d_info='{$_POST['d_info']}'","d_id='{$_POST['d_id']}'");
		$db->delete("p_math_use_drug","d_id='{$_POST['d_id']}'");
		if(isset($_POST['p_use'])){
			foreach ($_POST['p_use'] as $key => $value) {
				$db->insert("p_math_use_drug","u_id,d_id","{$value},'{$_POST['d_id']}'");
			}
		}
	}else if(isset($_POST['upload_tmt'])){
		if(isset($_FILES) && $_FILES['tmt_upload']['name']!=''){
			$filename = "../tmt/"."tmt.xls";
			if(move_uploaded_file($_FILES['tmt_upload']["tmp_name"], $filename)){
				require_once '../lib/PHPExcel/Classes/PHPExcel.php';
				include '../lib/PHPExcel/Classes/PHPExcel/IOFactory.php';

				$inputFileType = PHPExcel_IOFactory::identify($filename);  
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
				$objReader->setReadDataOnly(true);  
				$objPHPExcel = $objReader->load($filename);  
				 
				$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
				$highestRow = $objWorksheet->getHighestRow();
				$highestColumn = $objWorksheet->getHighestColumn();
				 
				$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
				$headingsArray = $headingsArray[1];
				 
				$r = -1;
				$namedDataArray = array();
				for ($row = 2; $row <= $highestRow; ++$row) {
				    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
				    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
				        ++$r;
				        foreach($headingsArray as $columnKey => $columnHeading) {
				            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
				        }
				    }
				}
				 
				foreach ($namedDataArray as $resx) {
					$db->insert("p_drug","d_id,d_name","{$resx['TMTID(TPU)']},'{$resx['FSN']}'");
				}
				$res=[
					"status"=>1
				];
			}else{
				$res=[
					"status"=>0,
					"msg"=>"เกิดข้อผิดพลาดไม่สามารถนำเข้าข้อมูลได้",
				];
			}
		}else{
			$res=[
				"status"=>0,
				"msg"=>"ไม่พบข้อมูล",
			];
		}
		echo json_encode($res);
	}

?>