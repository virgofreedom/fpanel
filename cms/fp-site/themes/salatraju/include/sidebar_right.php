<?php
$res_side = db_get('sidebar_set','Where Position<>"left"','','Order by Orders');
for($i=0;$i<count($res_side);$i++){
?>
<div class="small-12 medium-12 large-12 index-post columns">
	<p><b><?=$res_side[$i]['Label']?></b></p>
<?php
	if($res_side[$i]['SidebarType'] == 'cat_items'){
		echo '<ul>';
		$res_items = db_get('fp_posts',"WHERE Catergories LIKE '%".$res_side[$i]['SourceId']."%'",'','Order by PostDate DESC','LIMIT 0,'.$res_side[$i]['Options']);
		for($z = 0;$z<count($res_items);$z++){
			echo '
				<li><a href="'.DOMAIN.'post/'.$res_items[$z]['PostId'].'">'.$res_items[$z]['PostTitle'].'</a></li>
			';
		}
		echo '
		</ul>
		<p class="right"><a href="'.DOMAIN.$res_side[$i]['Label'].'/'.$res_side[$i]['SourceId'].'">ព័ត៌មានផ្សេងៗទៀត</a></p>
		';
	}else{
		echo '
		<ul class="cat-item">
		';
		$res_items = db_get('sidebar_items','Where SidebarId="'.$res_side[$i]['SourceId'].'"');
		if($res_items[0]['SidebarType']=='input'){
			echo '
			<form action="'.DOMAIN.$res_items[0]['Url'].'" method="post">
			'.htmlspecialchars_decode($res_items[0]['Text'],ENT_QUOTES).'
			</form>
			';
		}else if($res_items[0]['SidebarType']=='link'){
			echo '
			<li><a href="'.DOMAIN.$res_items[0]['Url'].'">'.htmlspecialchars_decode($res_items[0]['Text'],ENT_QUOTES).'</a></li>
			';
		}else if($res_items[0]['SidebarType']=='api'){
			echo htmlspecialchars_decode($res_side[$i]['Options'],ENT_QUOTES);
		}
		echo '</ul>';
	}
?>
</div>
<?php
}
?>
