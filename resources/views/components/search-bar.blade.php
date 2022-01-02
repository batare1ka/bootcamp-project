<form action="/shop" method="GET"  class="search__bar" id="myform">
    <input type="text" placeholder="search" name="search">
    <span onclick="document.getElementById('myform').submit()">
        <li class="fas fa-search"></li>
    </span>
</form>
<script>
    (function(){
        let searchHeader = document.getElementById('header-search');
    searchHeader.addEventListener('click', function(click){
      let searchBody = document.getElementsByClassName("search__bar");
        if(searchBody[0].style.display =='flex'){
          searchBody[0].style.display = "none";
          }else if(searchBody[0].style.display !=='flex'){
            searchBody[0].style.display = "flex";
            searchBody[0].style.animation = "lift 1s ease";
            }
            let form = document.querySelector(".search__bar");
            console.dir(form.firstElementChild);
             })
      })()
</script>