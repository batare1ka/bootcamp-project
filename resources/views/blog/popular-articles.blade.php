<section id="popular-articles">
    <h3 class="text-center mb-2">Most Popular</h3>
    <hr style="height: 3px; width: 40px; margin:0 auto 16px" />
    <ul articles-list>
        <template popular-artcles-template>
            <li>
                <div class="card mb-3 position-relative" style="max-width: 540px;">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      </span>
                    <div class="row g-0">
                        <div class="col-md-4 bg-image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fs-5">Card title</h5>
                                <p class="card-text fs-6">This is a wider card with supporting text below as a natural
                                    lead-in
                                    to additional content. This content is a little bit longer.</p>
                                <p class="card-text fs-6"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </template>
    </ul>
</section>