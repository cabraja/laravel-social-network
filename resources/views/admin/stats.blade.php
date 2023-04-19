<div>
    <h2>Statistics</h2>
</div>
<hr>
<div class="row">

    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row align-items-center">
                    <div class="rounded-circle bg-warning dashboard-icon me-3">
                        <i class="fa-solid fa-newspaper fs-1 text-light"></i>
                    </div>
                    <h5 class="card-title fs-1 fw-bolder">{{$posts->total()}} posts</h5>
                </div>
                <p class="card-text mt-3">Amount of posts in database.</p>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row align-items-center">
                    <div class="rounded-circle bg-danger dashboard-icon me-3">
                        <i class="fa-solid fa-user fs-1 text-light"></i>
                    </div>
                    <h5 class="card-title fs-1 fw-bolder">{{$users->total()}} users</h5>
                </div>
                <p class="card-text mt-3">Amount of registered users in database.</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row align-items-center">
                    <div class="rounded-circle bg-success dashboard-icon me-3">
                        <i class="fa-regular fa-image fs-1 text-light" ></i>
                    </div>
                    <h5 class="card-title fs-1 fw-bolder">{{$imageCount}} images</h5>
                </div>
                <p class="card-text mt-3">Amount of images in database.</p>
            </div>
        </div>
    </div>
</div>
