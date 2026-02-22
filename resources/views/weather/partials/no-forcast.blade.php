<div class="rounded bg-black terminal-border overflow-hidden shadow">
    <div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom border-secondary">
        <span class="badge rounded-pill text-bg-danger"> </span>
        <span class="badge rounded-pill text-bg-warning"> </span>
        <span class="badge rounded-pill text-bg-success"> </span>
        <div class="ms-2 small text-secondary font-monospace">
            /weather/forecast/{{ $zip }}
        </div>
    </div>

    <div class="p-4 text-center">
        <div class="text-secondary small mb-2">status</div>

        <h2 class="h5 mb-3">
            <span class="text-warning">!</span>
            no_forecast_data_found
        </h2>

        <div class="font-monospace text-light mb-3">
            zip: <span class="text-info">{{ $zip }}</span>
        </div>

        <div class="small text-secondary mb-4">
            the atmosphere has declined to cooperate.<br>
            or the api just shrugged.
        </div>

        <button type="button"
                class="btn btn-outline-info btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#zipcodeModal">
            set_zip
        </button>

        <div class="mt-3 small text-secondary">
            suggestion: try a real zip code.
            <span class="cursor">█</span>
        </div>
    </div>
</div>
