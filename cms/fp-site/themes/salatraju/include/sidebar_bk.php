<div class="small-12 medium-12 large-12 index-post columns">
	<p><b>ការិយាល័យរដ្ឋបាល</b></p>
	<ul class="cat-item">
		<li><a href="<?=DOMAIN?>fp-admin/index.php">ចុះឈ្មោះចូលក្នុងការិយាល័យ</a></li>
	</ul>
</div>
<div class="small-12 medium-12 large-12 index-post columns">
	<p><b>ស្វែងរកតាមពាក្យគន្លឹះ</b></p>
	<ul class="cat-item">
	<form action="<?=DOMAIN?>index.php" method="post">
	<input type="text" name="word"><input type="submit" name="search" class="button flat-green" value="ស្វែងរក">
	</form>
	
	</ul>
</div>
<?php
$presentation = array();
$pre_id = array();
$pre_cat_id='';
$article = array();
$art_id = array();
$art_cat_id='';
$news = array();
$news_id = array();
$news_cat_id='';
$veacha = array();
$veacha_id = array();
$veacha_cat_id = '';
////find the catergories of all posts published
// បទវិចារណកថា
		$res = db_get('fp_posts','Where PostStatus=2','','Order by PostDate DESC','');
		for($i=0;$i<count($res);$i++){
			$cat = explode(';',$res[$i]['Catergories']);
			for($y=0;$y<count($cat);$y++){
				$data = array(
                    'Id'=>$cat[$y]
                );
                $name_cat = db_get_where('catergories',$data);
				for($z=0;$z<count($name_cat);$z++){
					if ($name_cat[$z]['Name'] == 'បទបង្ហាញថ្មី'){
						array_push($presentation,$res[$i]['PostTitle']);
						array_push($pre_id,$res[$i]['PostId']);
						$pre_cat_id = $name_cat[$z]['Id'];
					}else if($name_cat[$z]['Name'] == 'អត្ថបទថ្មី'){
						array_push($article,$res[$i]['PostTitle']);
						array_push($art_id,$res[$i]['PostId']);
						$art_cat_id = $name_cat[$z]['Id'];
					}else if($name_cat[$z]['Name'] == 'ព័ត៌មានថ្មី'){
						array_push($news,$res[$i]['PostTitle']);
						array_push($news_id,$res[$i]['PostId']);
						$news_cat_id = $name_cat[$z]['Id'];
					}else if($name_cat[$z]['Name'] == 'បទវិចារណកថា'){
						array_push($veacha,$res[$i]['PostTitle']);
						array_push($veacha_id,$res[$i]['PostId']);
						$veacha_cat_id = $name_cat[$z]['Id'];
					}
				}
			}
			
		}
		
?>
<div class="small-12 medium-12 large-12 index-post columns">
	<p><b>ព័ត៌មានថ្មីៗ</b></p>
	<ul>
	<?php
	if (count($news)>5){
		$max_news = 5;
	}else{
		$max_news = count($news);
	}
		for($new=0;$new<$max_news;$new++){
			echo'
			<li><a href="'.DOMAIN.'post/'.$news_id[$new].'">'.$news[$new].'</a></li>
			';	
		}
	
	?>
	</ul>
	<p class="right"><a href="<?=DOMAIN?>ព័ត៌មានថ្មី/<?=$news_cat_id?>">ព័ត៌មានផ្សេងៗទៀត</a></p>
</div>

<div class="small-12 medium-12 large-12 index-post columns">
	<p><b>អត្ថបទថ្មីៗ</b></p>
	<ul>
	<?php
		if (count($article)>5){
			$max_art = 5;
		}else{
			$max_art = count($article);
		}
		for($art=0;$art<$max_art;$art++){
			echo'
			<li><a href="'.DOMAIN.'post/'.$art_id[$art].'">'.$article[$art].'</a></li>
			';	
		}
	
	?>
	</ul>
	<p class="right"><a href="<?=DOMAIN?>អត្ថបទថ្មី/<?=$art_cat_id?>">អត្ថបទផ្សេងៗទៀត</a></p>
</div>
<div class="small-12 medium-12 large-12 index-post columns">
	<p><b>បទបង្ហាញថ្មីៗ</b></p>
	<ul>
	<?php
		if (count($presentation)>5){
			$max_pre = 5;
		}else{
			$max_pre = count($presentation);
		}
		for($pre=0;$pre<$max_pre;$pre++){
			echo'
			<li><a href="'.DOMAIN.'post/'.$pre_id[$pre].'">'.$presentation[$pre].'</a></li>
			';	
		}
	
	?>
	</ul>
	<p class="right"><a href="<?=DOMAIN?>បទបង្ហាញថ្មី/<?=$pre_cat_id?>">បទបង្ហាញផ្សេងៗទៀត</a></p>
</div>
<div class="small-12 medium-12 large-12 index-post columns">
	<p><b>បទវិចារណកថាថ្មីៗ</b></p>
	<ul>
	<?php
		if (count($veacha)>5){
			$max_vea = 5;
		}else{
			$max_vea = count($veacha);
		}
		for($vea=0;$vea<$max_vea;$vea++){
			echo'
			<li><a href="'.DOMAIN.'post/'.$veacha_id[$vea].'">'.$veacha[$vea].'</a></li>
			';	
		}
	
	?>
	</ul>
	<p class="right"><a href="<?=DOMAIN?>បទវិចារណកថា/<?=$veacha_cat_id?>">បទវិចារណកថាផ្សេងៗទៀត</a></p>
</div>


