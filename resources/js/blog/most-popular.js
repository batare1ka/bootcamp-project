const popularNewsTemplate = document.querySelector("[popular-artcles-template]");
const listOfArticles = document.querySelector("[articles-list]");
axios.get('/api/articles/most-popular')
    .then(({ data }) => {
        data.forEach(article => {
            const articleOnPage = popularNewsTemplate.content.cloneNode(true).children[0];
            let title = articleOnPage.querySelector(".text-overlay h2");
            title.textContent = article.title;
            title.addEventListener("click", () =>{
                location.href = `http://localhost:880/blog/article/${article.id}`;
            }) 
            articleOnPage.querySelector(".text-overlay p").textContent = article.excerpt;
            let image = articleOnPage.querySelector(".blog-img");
            image.src = article.image_url;
            listOfArticles.append(articleOnPage);

        });
    })