<?php
	function menuMultiInCate($data,$parent_id = 0,$str = "&ensp;",$select = 0)
	{
		foreach($data as $val)
		{
			$id = $val["id"];
			$name = $val["name"];
			if($val["parent_id"]==$parent_id)
			{
				if($select!=0 && $id==$select){
					if($parent_id==0){
						echo '<option value="'.$id.'" selected="selected"><b>'.$str.$name.'</b></option>';
					}else{
						echo '<option value="'.$id.'" selected="selected">'.$str.$name.'</option>';
					}
				}else{
					if($parent_id==0){
						echo '<option value="'.$id.'"><b>'.$str.$name.'</b></option>';
					}else{
						echo '<option value="'.$id.'">'.$str.$name.'</option>';
					}
				}
				menuMultiInCate($data,$id,$str."&ensp;&ensp;",$select);
			}		
		}
	}
	function listCate($data,$parent_id = 0,$str = "")
	{
		foreach($data as $val)
		{
			$id = $val["id"];
			$name = $val["name"];
			$sort = $val["sort"];
			$status = $val["status"];
			if($status=='active'){
				$valueStatus = '<span class="label label-success"> '.__("general.isView").'</span>';
			}else{
				$valueStatus = '<span class="label label-danger"> '.__("general.notView").'</span>';
			}
			if($val["parent_id"] == $parent_id)
			{
				echo '
						<tr>';
				            if($str == "")
				            {
				            	echo '<td>  <b>'.$str.' '.$name.'</b></td>';
				            	
				            }
				            else
				            {
				            	echo '<td>  '.$str.' '.$name.'</td>';
				            	
				            }
				            echo '<td style="text-align: center;">'.$sort.'</td>';
				            echo '<td style="text-align: center;">'.$valueStatus.'</td>';
				            
				            echo'<td class="center">
                                <a class="btn btn-danger btn-xs" onclick="return alertMsg();"><i class="fa fa-trash"></i></a>
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".token-'.$id.'"><i class="fa fa-pencil"></i></a>
                            </td>
				        </tr>
			        ';
	        listCate($data,$id,$str. "&ensp;&ensp;");
			}
		}
	}
?>