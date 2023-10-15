<?php

get_header();

echo "<div id='content'>
        <h1>Результаты поиска</h1>
            <section class='attractions'>";
        if (have_posts())
		{
				while(have_posts())
				{
					the_post();
					get_template_part( 'loop', 'category' );
				}
        }
        else
		{
			echo "<p>По запросу <b>\"".get_search_query()."\"</b> ничего не найдено.</p>";
			echo "<p><b>Просто позвоните нам по телефону 8 (495) 818-97-20 и мы найдем это за Вас!</b></p>";
			echo "<div>"; get_search_form(); echo "</div>";
		}

    echo "</section>
        </div>";
get_footer();