<?

require("init.php"); // БД, глобальные переменные

function replace($text) {
	$text = trim($text);
	$text = str_replace("\r", "", $text);
	$text = str_replace("\n", "", $text);
	$text = str_replace("\t", "", $text);
	$text = str_replace("</td> <td", "</td><td", $text);
	$text = str_replace("<tr> <td", "<tr><td", $text);
	
	for ($i1 = 0; $i1 < 50; $i1++) {
		$text = str_replace("  ", " ", $text);
	}

	return $text;
}


// грузчики

$price = "<div><b>3000 руб.</b><br>Доп.час - 500 руб.</div>";

$replaces = [
	'Грузчик',
	'Грузчик/Монтажник (до 2-х часов)',
	'Грузчик (смена 6 ч.)',
	'Грузчик (2 часа) доп. час',
];
$replaceTo = "Грузчики";

$cc = 0;
$r = $mysql->select("SELECT * FROM wp_postmeta WHERE meta_key = 'wpcf-price' AND meta_value LIKE '%грузчик%'");
for ($i = 0; $i < mysqli_num_rows($r); $i++) {
	$mas = mysqli_fetch_array($r);
	
	//echo $mas['meta_value'] . "<hr size=3>";
	
	$text = replace($mas['meta_value']);
	
	$arr = explode("</tr>", $text);
	$str = "";
	foreach ($arr as $key => $item) {
		$arr2 = explode("<td", $item);
		
		if (count($arr2) == 4) {
			if (!mb_strstr(mb_strtolower($item), "грузчик")) {
				$str .= $item . "</tr>";
			} else {
				$s = str_replace("</td>", "", $item) . "GGGGG";
				preg_match_all("!<td(.*?)>(.*?)<td(.*?)>(.*?)<td(.*?)>(.*?)GGGGG!si", $s, $out, PREG_PATTERN_ORDER);
				
				$str .= "<tr>
					<td>Грузчики</td>
					<td>" . $out[4][0] . "</td>
					<td>$price</td>
				</tr>";
				
				$cc++;
				
			}
		} else {
			$str .= $item . "</tr>";
		}
		
	}
	
	$r1 = $mysql->query("UPDATE wp_postmeta SET meta_value = '" . $str . "' WHERE meta_id = " . $mas['meta_id']);
	
	//if ($i ==3) {exit;}
	
	//echo $str . "<hr size=6>";
	
	//if ($i > 10) {exit;}
	
}

echo "Обработано $cc записей";