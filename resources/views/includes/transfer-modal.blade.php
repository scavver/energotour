{{-- Модальное окно трансфер --}}
<div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="transferLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferLabel">Трансфер по Крыму {{ now()->year }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-weight: 300">
                    Заказав у нас трансфер, Вы сможете с комфортом добраться до любого отеля без лишних пересадок.
                    У нас можно выбрать машину любого класса.
                    Если с вами путешествуют дети, в машину будет установлено детское кресло (данную бесплатную опцию обязательно обговаривайте в заявке на трансфер).
                </p>
                <img src="{{ asset("images/transfer.jpg") }}" alt="Трансфер по Крыму" width="100%" style="border-radius: .25rem">
                <br>
                <br>
                <a href="/docs/transfer.pdf" class="btn btn-primary btn-lg btn-block" target="_blank">
                    <i class="fas fa-file-pdf fa-fw pr-2"></i> Прайс-лист PDF (174KB)
                </a>
            </div>
        </div>
    </div>
</div>