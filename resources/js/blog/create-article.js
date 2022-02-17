const { default: axios } = require("axios");

class Article {
    title;
    description;
    category;
    #formData = new FormData();
    constructor(title, description, category, author, image) {
        this.title = title;
        this.description = description;
        this.category = category;
        this.author = author;
        this.image = image;
    }
    setFormData() {
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
/** @type {HTMLFormElement} createArticleForm*/
const createArticleForm = document.querySelector("#createArticleForm");
if (createArticleForm) {
    /** @type {HTMLInputElement} titleInput */
    const titleInput = createArticleForm.querySelector("#titleInput");
    /** @type {HTMLTextAreaElement} descriptionInput */
    const descriptionInput = createArticleForm.querySelector("#descriptionInput");
    /** @type {HTMLSelectElement} categoryInput */
    const categoryInput = createArticleForm.querySelector("#categoryInput");
    /** @type {HTMLSelectElement} authorInput */
    const authorInput = createArticleForm.querySelector("#authorInput");
    /** @type {HTMLInputElement} imageInput */
    const imageInput = createArticleForm.querySelector("#imageInput");
    /** @type {HTMLImageElement} imagePreview */
    const imagePreview = createArticleForm.querySelector("#imagePreview");

    imageInput.onchange = () => {
        const file = imageInput.files[0];
        if (!file) {
            imagePreview.src = "";
            imagePreview.hidden = true;
        } else {
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.hidden = false;
        }

    }
    function cleanUpForm() {
        titleInput.value = "";
        descriptionInput.value = "";
        categoryInput.value = null;
        authorInput.value = null;
        imageInput.files[0] = null;
        imagePreview.src = "";
        imagePreview.hidden = true;
    }
    function showErrosOnPage(...errors) {
        Object.keys(errors[0]).forEach((key) => {
            let errorTag = document.querySelector(`.${key}Error`);
            errorTag.hidden = false;
            errorTag.textContent = errors[0][key];
            window[key + "Input"].classList.add("is-invalid");
        });
    }

    function removeErrosFromPage() {
        const formElements = [...createArticleForm.querySelectorAll(".article__error"), ...createArticleForm.elements];
        formElements.forEach(e => {
            if (e.classList.contains("is-invalid")) {
                e.classList.remove("is-invalid");
            } else if (e.classList.contains("article__error")) {
                e.hidden = true;
            }
        })
    }
    createArticleForm.onsubmit = event => {
        event.preventDefault();
        const article = new Article(titleInput.value, descriptionInput.value, categoryInput.value, authorInput.value, imageInput.files[0]);
        article.setFormData();
        axios.post("/api/articles", article.getFormData())
            .then(() => {
                cleanUpForm();
                removeErrosFromPage();
                let toast = document.querySelector(".toast");
                setTimeout(() => { toast.classList.add("show") }, 1000);
                setTimeout(() => { toast.classList.remove("show") }, 5000);

            }).catch(error => {
                removeErrosFromPage();
                showErrosOnPage(error.response.data);
            })
    }
}