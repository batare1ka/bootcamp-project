@props(['comments'])

    <div class="container my-5 py-2">
        <style>
            .link-muted { color: #aaa; } .link-muted:hover { color: #1266f1; }
        </style>
                            <h4 class="mb-5">COMMENTS</h4>
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="card text-dark">
            @forelse ($comments as $comment )
            <div class="card-body p-4 text-start">
                <div class="d-flex flex-start">
                  <img
                    class="rounded-circle shadow-1-strong me-3"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp"
                    alt="avatar"
                    width="60"
                    height="60"
                  />
                  <div>
                    <h6 class="fw-bold mb-1 text-dark">{{ $comment->author_email }}</h6>
                    <div class="d-flex align-items-center mb-3">
                      <p class="mb-0 text-muted">
                        {{ $comment->created_at->toDayDateTimeString() }}
                        <span class="badge bg-success ms-2">Approved</span>
                      </p>
                      <a href="#!" class="link-muted"
                        ><i class="fas fa-pencil-alt ms-2"></i
                      ></a>
                      <a href="#!" class="text-success"
                        ><i class="fas fa-redo-alt ms-2"></i
                      ></a>
                      <a href="#!" class="link-danger"><i class="fas fa-heart ms-2"></i></a>
                    </div>
                    <p class="mb-0">
                      {{ $comment->message }}
                    </p>
                  </div>
                </div>
              </div>
              @if (!$loop->last)
              <hr class="my-0 w-100" style="height: 1px;" />
              @endif
              
            @empty
            <div class="card-body p-4">
                <div class="d-flex flex-start">

                  <div>
                    <p class="mb-0">
                     No comments yet
                    </p>
                  </div>
                </div>
              </div>
    
              
            @endforelse

  
          </div>
        </div>
      </div>
    </div>
  