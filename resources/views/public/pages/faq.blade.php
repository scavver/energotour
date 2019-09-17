@extends("layouts.app")

@section("title")
    Часто задаваемые вопросы
@endsection

@section("description")
    Ответы на часто задаваемые вопросы. Туристическая компания Энерго Тур.
@endsection

@section("content")
    <main>
        <div class="container pb-3">
            <h3 class="pt-3 pb-3 mb-3 bordered-bottom">Часто задаваемые вопросы</h3>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Как долго сохраняется бронь без оплаты
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Неоплаченная бронь сохраняется в течение 1 - 3 банковских дней в
                                зависимости от срока, оставшегося до заезда.
                                <br><br>При отсутствии оплаты в течение 3-х банковских дней (либо другого срока,
                                указанного в счете на оплату) Вы получите уведомление об аннуляции заказа
                                на тот e-mail, с которого поступила заявка.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Как я узнаю о поступлении оплаты
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                При поступлении оплаты на наш расчетный счет, мы отправим копию
                                электронного кассового чека на Ваш телефон или e-mail.
                                <br><br>Оплата, как правило, поступает на следующий банковский день .
                                <br><br>Если Вы не получили на мобильный телефон или e-mail копию электронного
                                кассового чека, свяжитесь с менеджером агентства, предварительно
                                отправив нам копию платежного документа.
                                <br><br><strong>
                                    При оплате проверяйте реквизиты и название получателя
                                    платежа, они должны совпадать с написанием в полученном Вами счете.
                                    <br><br>Если оплату производит лицо, не указанное в счете, в назначении платежа
                                    обязательна ссылка на номер счета и указание фамилии лица, за которое
                                    производится оплата.
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Можно ли рассчитываться за тур в рассрочку?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                При получении счета необходимо в течение трех банковских дней внести
                                предоплату за тур в размере не менее 30% от его общей стоимости.
                                <br><br>В случае не поступления предоплаты в указанный срок, бронь будет
                                аннулирована.
                                <br><br>Остаток по туру можно вносить по любому удобному для Вас графику. <br>При
                                этом полная оплата счета должна быть произведена не менее, чем за 14
                                дней до заезда<br>(в отдельных случаях не менее, чем за 30 дней до заезда)
                                <br><br><strong>
                                    В случае повышения цен на путевки объектом размещения, Вам будет
                                    предложено доплатить за тур полную его стоимость в течение трех
                                    банковских дней для сохранения первоначальной стоимости тура. <br><br>Если Вы не
                                    произведете доплату в указанный срок, стоимость тура в неоплаченной его
                                    части будет пересчитана по новым ценам.
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Когда и какие документы выдаются при бронировании тура?
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                При поступлении оплаты на наш расчетный счет Вам будет отправлен
                                электронный кассовый чек.<br>
                                После полной оплаты тура Вам будет отправлен ваучер на заселение.
                            </p>
                            <p><strong>В ваучере будут прописаны:</strong></p>
                            <ul>
                                <li>фамилии проживающих, их количество; если есть дети, то указывается их
                                    возраст;</li>
                                <li>категория номера, количество дней пребывания;</li>
                                <li>даты проживания;</li>
                                <li>тип питания и другие, входящие в стоимость услуги.</li>
                            </ul>
                            <p>
                                На нашем сайте Вы можете скачать Договор-оферту.<br>
                                По отдельному запросу Вам будут предоставлены оригиналы Договора и
                                акта выполненных работ.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Какие услуги входят в стоимость путевки?
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ознакомиться с перечнем услуг, входящих в стоимость путевки можно на
                                странице каждого объекта, вкладка «ОПИСАНИЕ»
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Как изменить подтвержденный и оплаченный заказ.
                            </button>
                        </h2>
                    </div>

                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Все изменения допускаются только в письменном виде. <br><br>
                                При необходимости внести изменения в подтвержденный или оплаченный
                                заказ (изменение сроков пребывания, дат заезда или выезда, количества
                                туристов) свяжитесь с менеджером агентства. <br><br>
                                Менеджер сообщит Вам о наличии либо отсутствии возможности внести
                                требуемые изменения. <br><br>
                                После предварительного согласования с менеджером агентства необходимо
                                отправить письменную заявку на изменение заказа. В ответ Вам будет
                                направлен новый счет, с внесенными в него соответствующими
                                корректировками. Предыдущий счет будет аннулирован, а произведенная
                                Вами ранее оплата будет зачтена в счет оплаты нового счета.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Как я могу отменить заказ
                            </button>
                        </h2>
                    </div>

                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Отмена заказа, не оплаченного в течение трех банковских дней происходит
                                автоматически. <br>Вы получите уведомление об аннуляции Вашего заказа. <br><br>
                                В случае необходимости отменить уже оплаченный заказ, Вы должны
                                отправить на наш e-mail письменное уведомлении об аннуляции. В ответ Вы
                                получите форму заявки на возврат денежных средств. Все поля заявки
                                обязательны к заполнению. Для возврата потребуются полные реквизиты
                                Вашей карты (только номера карты недостаточно). <br><br><strong>Средства могут быть
                                    возвращены только тому лицу, от которого они поступили.</strong>
                                <br><br>Обратите внимание, что при поздней аннуляции заказа (менее 14 дней до
                                заезда) в некоторых случаях возможно взимание штрафа.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingEight">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Могу ли я заехать раньше или выехать позже срока, указанного в ваучере
                            </button>
                        </h2>
                    </div>

                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Заселение в номер производится в день, указанный в ваучере с учетом расчетного часа
                                (указано в ваучере). Досрочный заезд допускается исключительно при наличии свободных
                                мест за дополнительную плату по расценкам отеля(санатория) согласно правил объекта
                                размещения, оплата производится в кассе отеля(санатория). При заезде позднее даты,
                                указанной в ваучере, стоимость путевки не компенсируется. Если Вы опаздываете более,
                                чем на полсуток (от расчетного часа) обязательно проинформируйте об этом менеджера
                                агентства заранее для сохранения за Вами забронированного номера.
                            </p>

                            <p>
                                Выезд из отеля(санатория) осуществляется в день окончания тура, указанного в ваучере,
                                не позднее расчетного часа, установленного отелем. В день выезда после наступления
                                расчетного часа, Вы обязаны освободить номер и произвести все расчеты с
                                отелем(санаторием) за дополнительные услуги. Продлить путевку можно только при
                                наличии свободных номеров по согласованию с объектом размещения за
                                дополнительную плату. Оплата производится в кассе отеля(санатория).
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingNine">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                Как заказать трансфер
                            </button>
                        </h2>
                    </div>

                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Если Вам требуется трансфер, Вы можете указать это в Вашей заявке либо
                                написать позже на наш e-mail. <br><br>
                                Для заказа трансфера нам необходимо не менее, чем за один рабочий день
                                до Вашего прибытия получить следующую информацию: <br><br>
                                Фамилию, дату прибытия, номер рейса, время прибытия; телефон, по
                                которому водитель сможет с Вами связаться по прилету; количество
                                прибывающих с Вами туристов, если есть дети – указать их возраст, а так же
                                необходимость в автокресле; указать куда требуется трансфер. <br><br>
                                Менеджер свяжется с Вами и проинформирует о способах оплаты и
                                стоимости заказанной услуги. Стоимость услуги определяется классом
                                заказанного авто, его вместимостью и длительностью поездки. <br><br>
                                За сутки до прилета с Вами свяжется водитель для координации дальнейших
                                действий. <br><br>
                                С расценками на трансфер можно ознакомиться , перейдя по ссылке.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection