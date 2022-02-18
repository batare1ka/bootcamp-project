const { default: axios } = require("axios");

class UpdateArticle {
    title;
    description;
    category;
    image;
    #formData = new FormData();
    constructor(title, description, category, author, image) {
        this.title = title;
        this.description = description;
        this.category = category;
        this.author = author;
        this.image = image;
    }
    setFormData() {
        this.#formData.append("_method", "PUT");
        this.#formData.append("title", this.title);
        this.#formData.append("description", this.description);
        this.#formData.append("category", this.category);
        this.#formData.append("author", this.author);
        this.#formData.append("image", this.image);
    }
    getFormData() {
        return this.#formData;
    }
}
/** @type {HTMLFormElement} updateArticleForm*/
const updateArticleForm = document.querySelector("#updateArticleForm");
if (updateArticleForm) {
    /** @type {HTMLUpdateInputElement} titleUpdateInput */
    const titleUpdateInput = updateArticleForm.querySelector("#titleUpdateInput");
    /** @type {HTMLTextAreaElement} descriptionUpdateInput */
    const descriptionUpdateInput = updateArticleForm.querySelector("#descriptionUpdateInput");
    /** @type {HTMLSelectElement} categoryUpdateInput */
    const categoryUpdateInput = updateArticleForm.querySelector("#categoryUpdateInput");
    /** @type {HTMLSelectElement} authorUpdateInput */
    const authorUpdateInput = updateArticleForm.querySelector("#authorUpdateInput");
    /** @type {HTMLUpdateInputElement} imageUpdateInput */
    const imageUpdateInput = updateArticleForm.querySelector("#imageUpdateInput");
    /** @type {HTMLImageElement} imageUpdatePreview */
    const imageUpdatePreview = updateArticleForm.querySelector("#imageUpdatePreview");

    imageUpdateInput.onchange = () => {
        const file = imageUpdateInput.files[0];
        if (!file) {
            imageUpdatePreview.src = "";
            imageUpdatePreview.hidden = true;
        } else {
            imageUpdatePreview.src = URL.createObjectURL(file);
            imageUpdatePreview.hidden = false;
        }

    }
    function cleanUpUpdatedForm() {
        titleUpdateInput.value = "";
        descriptionUpdateInput.value = "";
        categoryUpdateInput.value = null;
        authorUpdateInput.value = null;
        imageUpdateInput.files[0] = null;
        imageUpdatePreview.src = "";
        imageUpdatePreview.hidden = true;
    }
    function showErrosOnUpdatePage(...errors) {
        Object.keys(errors[0]).forEach((key) => {
            let errorTag = document.querySelector(`.${key}Error-update`);
            errorTag.hidden = false;
            errorTag.textContent = errors[0][key];
            window[key + "UpdateInput"].classList.add("is-invalid");
        });
    }

    function removeErrosFromUpdatePage() {
        const formElements = [...updateArticleForm.querySelectorAll(".article__error-update"), ...updateArticleForm.elements];
        formElements.forEach(e => {
            if (e.classList.contains("is-invalid")) {
                e.classList.remove("is-invalid");
            } else if (e.classList.contains("article__error-update")) {
                e.hidden = true;
            }
        })
    }
    updateArticleForm.onsubmit = event => {
        event.preventDefault();
        const updateArticle = new UpdateArticle(titleUpdateInput.value, descriptionUpdateInput.value, categoryUpdateInput.value, authorUpdateInput.value, imageUpdateInput.files[0]);
        updateArticle.setFormData();
        const articleId = window.location.pathname.match(/^.+\/(\d{0,10})$/)[1];
        axios.post(`/api/articles/${articleId}`, updateArticle.getFormData())
            .then(() => {
                cleanUpUpdatedForm();
                removeErrosFromUpdatePage();
                let toast = document.querySelector(".toast");
                setTimeout(() => { toast.classList.add("show") }, 1000);
                setTimeout(() => { toast.classList.remove("show") }, 5000);

            }).catch(error => {
                removeErrosFromUpdatePage();
                showErrosOnUpdatePage(error.response.data);
            });
    }
}