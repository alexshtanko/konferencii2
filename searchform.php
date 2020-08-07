<div class="header-search-form-inner">
    <div class="header-close-search" id="headerCloseSearch"></div>
    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
        <input class="inpt-header-search" type="text"  placeholder="Найти Мероприятие" value="<?php echo get_search_query() ?>" name="s" id="s" />
        <input class="btn-header-search" type="submit" id="searchsubmit" value="" />
    </form>
</div>