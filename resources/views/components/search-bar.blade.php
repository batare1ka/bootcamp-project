<form class="search__bar mouse__move" id="myform">
    <input class="mouse__move" type="text" placeholder="search" name="search" autocomplete="off">
      <div class="search__sugestion mouse__move bottom__radius-on">
          <template suggest-item>
          <li class="suggest__item mouse__move"></li>
          </template>
        </div>
    <button type="submit" class="submit__button mouse__move fas fa-search">
    </button>
</form>
<script src="{{ url('assets/js/search-bar.js') }}"></script>