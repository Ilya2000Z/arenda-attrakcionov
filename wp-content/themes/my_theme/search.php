<?php
	get_header('inside');

		echo "<h1>Результаты поиска</h1>";

		if (have_posts())
		{
			// echo "<ul class=\"search_result\">";
			// while(have_posts())
			// {
				// the_post();
				// get_template_part( 'loop', 'search');
			// }
			// echo "</ul>";
			echo "<div class=\"items_list\">";
				while(have_posts())
				{
					the_post();
					get_template_part( 'loop', 'category' );
				}
				echo "<div class=\"clear\"></div>";
			echo "</div>";
		}
		else
		{
			echo "<p>По запросу <b>\"".get_search_query()."\"</b> ничего не найдено.</p>";
			echo "<p><b>Просто позвоните нам по телефону 8 (495) 256-40-47 и мы найдем это за Вас!</b></p>";
			get_search_form();
		}
		
		echo "<div id=\"mark\"></div>";

	get_footer('inside');
?>