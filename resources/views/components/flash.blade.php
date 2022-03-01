@if (session()->has("succes"))
<div class="toast align-items-center text-white bg-primary border-0 show" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="d-flex d-flex position-fixed bottom-0 end-0 bg-primary">
        <div class="toast-body">
            {{ session("succes") }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
            aria-label="Close"></button>
    </div>
</div>
@endif