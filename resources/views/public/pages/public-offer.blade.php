@extends("layouts.full-height")

@section("title")
    Публичная оферта
@endsection

@section("description")
    Публичная оферта компании Энерго Тур.
@endsection

@section("content")
    <main style="height: calc(100% - 375px)">
        <div class="container pb-3">
            <h3 class="pt-3 pb-3 mb-3 bordered-bottom">Публичная оферта</h3>

            <div class="row">
                <div class="col-12 col-md-6">
                    <a href="/docs/Публичная%20оферта%20ТК%20Энерготур.pdf" target="_blank" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-file-pdf fa-fw pr-2"></i> Публичная оферта PDF
                    </a>
                </div>
            </div>

        </div>
    </main>
@endsection