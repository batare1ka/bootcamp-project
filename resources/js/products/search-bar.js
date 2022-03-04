const { default: axios } = require("axios");

function searchBar() {
    const searchBarForm = document.getElementById("myform");
    const submitButton = searchBarForm.querySelector(".submit__button");
    const inputFrom = searchBarForm.querySelector("input");
    const searchHeader = document.getElementById('header-search');
    const suggestItem = document.querySelector("[suggest-item]");
    const blockWithSuggestions = document.querySelector(".search__sugestion");
    var searchBody = document.getElementsByClassName("search__bar");
    params = {};
    searchHeader.addEventListener('click', function () {
        
        if (searchBody[0].style.display == 'flex') {
            searchBody[0].style.display = "none";
        } else if (searchBody[0].style.display !== 'flex') {
            searchBody[0].style.display = "flex";
            searchBody[0].style.animation = "lift 1s ease";
        }
    });
    function removeAllChildNodes(list) {
        list.forEach(element => {
            element.remove();
        });
    }
    searchBarForm.onsubmit = (e) => {
        e.preventDefault();
        if(inputFrom.value.length < 20){
            localStorage.setItem('search', inputFrom.value);
            location.href = "http://localhost:880/shop";
        }
    }
    inputFrom.oninput = (e) => {
        if (e.target.value == "") {
            blockWithSuggestions.style.display = "none";
            searchBody[0].classList.remove("bottom__radius-off");
        }
        let removePreviousSuggestions = document.querySelectorAll(".suggest__item");
        removeAllChildNodes(removePreviousSuggestions);
        params.suggest = e.target.value;
        axios.get("/api/search-suggestions/", {params})
        .then(({data}) => {
            
            data.forEach((suggestion, index) => {
                const suggestItemOnPage = suggestItem.content.cloneNode(true).children[0];
                suggestItemOnPage.textContent = suggestion.name;
                suggestItemOnPage.addEventListener("click", () => {
                    inputFrom.value = suggestItemOnPage.textContent;
                })
                blockWithSuggestions.append(suggestItemOnPage);
                if(index == data.length-1){
                    suggestItemOnPage.classList.add("bottom__radius-on");
                    searchBody[0].classList.add("bottom__radius-off");
                    blockWithSuggestions.style.display = "block";
                    document.onmousemove = function(e){
                        let moveClassList =  e.target.classList;
                            if(!moveClassList.contains("mouse__move") ){
                                blockWithSuggestions.style.display = "none";
                                searchBody[0].classList.remove("bottom__radius-off");
                            }
                        
                    };
                }
            });
        })
        .catch()
        delete params.suggest;
    }
}

searchBar();