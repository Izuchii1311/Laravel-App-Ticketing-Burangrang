<div class="mx-4 btn-group sortable" role="group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class='bx bx-sort'></i>
    </button>
    <ul class="dropdown-menu">
        <li class="my-2 mx-3">
            <p class="text-primary">Tampil Berdasarkan</p>
        </li>
        <li class="m-2"><hr class="dropdown-divider"></li>
        <li class="m-2">
            <div class="m-2">
                <span class="d-block mb-2">Nama</span>
                <div class="form-check">
                    <input class="form-check-input name_sort" type="radio" checked>
                    <label class="form-check-label">
                        @sortablelink('name_ticket', 'sort a - z')
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input name_sort" type="radio">
                    <label class="form-check-label">
                        @sortablelink('name_ticket', 'sort z - a')
                    </label>
                </div>
            </div>
        </li>
        <li class=" my-4 mx-2">
            <div class="m-2">
                <span class="d-block mb-2">Tanggal Pembuatan</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio">
                    <label class="form-check-label">
                        @sortablelink('created_at', 'terbaru')
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" checked>
                    <label class="form-check-label">
                        @sortablelink('created_at', 'paling awal')
                    </label>
                </div>
            </div>
        </li>
    </ul>
</div>