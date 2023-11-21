<div id="app-main" class="container-fluid">
    <div class="row g-0 align-items-stretch">
        <div class="col-products col-md p-3">

            <!-- form pencarian produk -->
            <form class="search-product mx-auto mb-3" action="" method="POST" style="max-width: 50rem;">
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" placeholder="Cari Nama Produk.." aria-label="Cari Nama Produk" aria-describedby="cari-produk">
                    <button type="submit" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            <div class="list-products overflow-y-auto overflow-x-hidden">
                <div class="row">
                <?php for ($x = 1; $x <= 6; $x++): ?>
                    <div class="col-6 col-md-4 col-xl-3 col-xxl-2 mb-3">
                        <div class="card shadow-sm border-light overflow-hidden placeholder-glow" aria-hidden="true">
                            <div class="ratio ratio-1x1 bg-secondary placeholder"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <span class="placeholder col-4"></span>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
                </div>
            </div>

        </div>
        <div class="col-md-3 p-3 border-start">
            <form action="" method="POST">
                <div class="table-responsive overflow-y-auto overflow-x-hidden" style="height: calc(100vh - 17rem);">
                    <table class="table table-striped table-hovered">
                        <tbody>
                            <?php for ($x = 1; $x <= 14; $x++): ?>
                                <tr>                                   
                                    <td>
                                        <div class="produk-title fw-bold mb-2">
                                            Produk 123456 Produk 123456 Produk 123456
                                        </div>
                                        <div class="produk-harga text-success">
                                            Rp 50.000
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="btn btn-outline-secondary">-</span>
                                            <input name="jumlah" type="number" style="max-width:3rem;" class="form-control form-control-sm number-noarrow text-center" value="1" min="1">
                                            <span class="btn btn-outline-secondary">+</span>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success btn-lg w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"> <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/> </svg>
                        PROSES
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>