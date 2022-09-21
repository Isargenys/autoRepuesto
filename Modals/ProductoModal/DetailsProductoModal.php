<div class="modal fade" id="modalProductDetalles" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title titulo-modalDetalles fw-bold" id="exampleModalLabel">Detalle producto</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalInfo">
            <input class="form-control" type="hidden" name="id">
                <div class="card border-0 m-auto" style="width: 18rem;">
                    <!-- <img src="img/dramidom.jpg" class="card-img-top" alt="..."> -->
                </div>
                
                <div class="container mt-5">
                    <h5 class="titulo-producto fw-normal"><span id="productName"></span> - <span class="text-muted" id="productPrice"></span></h5>
                    <p class="fw-normal">
                    <span id="productDescription"></span>
                    </p>
                </div>
            </div>
            <div class="modal-footer footer-detalles">
                <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>