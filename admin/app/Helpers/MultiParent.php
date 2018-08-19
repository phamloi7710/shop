<?php
	function menuMulti($data,$parent_id = 0,$str = "&ensp;",$select = 0)
	{
		foreach($data as $val)
		{
			$id = $val["id"];
			$name = $val["name"];
			if($val["parent_id"] == $parent_id)
			{

				if($select !=0 && $id == $select)
				{
					echo '<option value="'.$id.'" selected>'.$str."".$name.'</option>';
				}
				else
				{
					echo '<option value="'.$id.'">'.$str."".$name.'</option>';
				}
				menuMulti($data,$id,$str."&ensp;&ensp;",$select);
			}		
		}
	}
	function menuMultiInCate($data,$parent_id = 0,$str = "&ensp;",$select = 0)
	{
		foreach($data as $val)
		{
			$id = $val["id"];
			$name = $val["name"];
			if($val["parent_id"] == $parent_id)
			{

				if($select !=0 && $id == $select)
				{
					echo '<option value="'.$id.'" selected>'.$str."".$name.'</option>';
				}
				else
				{
					echo '<option value="'.$id.'">'.$str."".$name.'</option>';
				}
				menuMulti($data,$id,$str."&ensp;&ensp;",$select);
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
				            echo '<td>'.$status.'</td>';
				            echo '<td>'.$sort.'</td>';
				            echo'<td class="center">
                                <div class="btn-group btn-group-xs">
                                    <button class="btn btn-danger btn-rounded" onclick="return alertMsg();"><span class="glyphicon glyphicon-trash"></span></button>
                                    <a href="#" class="btn btn-info btn-rounded" data-toggle="modal" data-target=".token-'.$id.'"><span class="glyphicon glyphicon-pencil"></span></a>
                                </div> 
                            </td>
				        </tr>
			        ';
	        listCate($data,$id,$str. "&ensp;&ensp;");
			}
		}
	}
?>