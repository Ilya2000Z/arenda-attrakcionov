<?
	echo "<tr>";
        echo "<td class=\"width54 theader\">";
		if($post->thumb)
	   	{

			   echo "<div class=\"ramka\"><a target=\"_blank\" href=\"".$post->urlm.$post->name."\"><img src=\"".$post->thumb."\" style=\"width:54px; height: auto;\"></a></div>";


	   	}
        echo "</td>";
		echo "<td class=\"left-tt\"><a target=\"_blank\" href=\"".$post->urlm.$post->name."\">".$post->title."</a></td>";
		echo "<td class=\"theader\">".$post->size."</td>";
		echo "<td class=\"theader size1em\">".$post->energy."</td>";
        if((int)$post->is_myot>0) $ot = 'От '; else $ot = '';
		echo "<td class=\"right-tt theader size1em\"><span style=\"font-weight: bold; color: #777777;\">$ot".number_format($post->price, 0, '', ' ')."</span></td>";
	echo "</tr>";

?>