@extends("layouts.full-height")

@section("title")
    Договора для агентств
@endsection

@section("description")
    Договора для агентств компании Энерго Тур.
@endsection

@section("content")
    <main style="height: calc(100% - 375px)">
        <div class="container pb-3">
            <h3 class="pt-3 pb-3 mb-3 bordered-bottom">Договора для агентств</h3>

            <div class="row">
                <div class="col-12 col-md-6">
                    <a href="/docs/Договор%20для%20агентств%20ТК%20Энерготур.pdf" target="_blank" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-file-pdf fa-fw pr-2"></i> ТК Энерго – Тур PDF
                    </a>
                </div>

                <div class="col-12 col-md-6">
                    <a href="/docs/Договор%20для%20агентств%20ИП%20Клименко.pdf" target="_blank" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-file-pdf fa-fw pr-2"></i> ИП Клименко PDF
                    </a>
                </div>
            </div>

        </div>
    </main>
@endsection