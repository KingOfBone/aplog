<?php
	$divisi = [
		array('nama'=>'MN','divisi'=>'MBREN'),
		array('nama'=>'MM','divisi'=>'MGTL/MGBD/PM'),
		array('nama'=>'DT','divisi'=>'DIRUT'),
		array('nama'=>'DK','divisi'=>'DIRTEK'),
		array('nama'=>'PJ','divisi'=>'PPBJ'),
		array('nama'=>'DU','divisi'=>'DIRKEU'),
		array('nama'=>'MP','divisi'=>'MBAKP'),
		array('nama'=>'MAN','divisi'=>'MB ADKON')		
	];
	
	fOREACH($divisi as $key=>$d) {
		for($i=1; $i<5; $i++) {
			$sql = "
				insert into login
				values(
					null,
					lower('$d[nama]$i'),
					'$d[nama]$i',
					md5('admin'),
					'$d[divisi]',
					now()
				);
			";
			
			echo "$sql <br>";
		}
	}
?>