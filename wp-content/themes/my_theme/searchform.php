<form action="/" method="get">
    <div id="search_box" class="input search-click">
        <input required type="text" autocomplete="off" name="s" id="search" placeholder="Поиск" value="<?php the_search_query(); ?>" />
        <input type="submit" value="Найти" />
    </div>
</form>
<?php /* ?> <a href="<?php echo get_page_link(5627); ?>"><span>Расширенный поиск</span></a> <?php */  ?>