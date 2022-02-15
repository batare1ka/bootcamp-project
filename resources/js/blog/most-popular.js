const popularNewsTemplate = document.querySelector("[popular-artcles-template]");
const listOfArticles = document.querySelector("[articles-list]");
axios.get('/api/articles/most-popular')
    .then(({ data }) => {
        data.forEach(article => {
            const articleOnPage = popularNewsTemplate.content.cloneNode(true).children[0];
            let title = articleOnPage.querySelector(".card-title");
            title.textContent = article.title;
            title.style.cursor = "pointer";
            title.addEventListener("click", () =>{
                location.href = `http://localhost:880/blog/article/${article.id}`;
            }) 
            articleOnPage.querySelector(".card-text").textContent = article.excerpt;
            let image = articleOnPage.querySelector(".bg-image");
            image.style.backgroundImage = `url(http://localhost:880/storage/${article.image_url})`;
            image.style.backgroundSize = "contain";
            image.style.backgroundPosition = "center";
            image.style.backgroundRepeat = "no-repeat";

            if (!article.view_count) {
                articleOnPage.querySelector(".badge").remove();
            }else{
                articleOnPage.querySelector(".badge").innerHTML = `
                ${article.view_count}
                <span class="visually-hidden">unread messages</span>`;
            }

            listOfArticles.append(articleOnPage);

        });
    })