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

            <div class="pb-3">
                <a href="{{ route('tourists.howToBooking') }}" class="btn btn-primary mr-1">Как забронировать тур <i class="fas fa-link pl-1 fa-fw"></i></a>
                <a href="{{ route('tourists.howToPay') }}" class="btn btn-primary">Как оплатить <i class="fas fa-link pl-1 fa-fw"></i></a>
            </div>

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
                                При поступлении оплаты на наш расчетный счет, мы сообщим Вам об этом на
                                e-mail, Viber или WhatsApp.
                            </p>
                            <p>
                                Оплата, как правило, поступает на следующий банковский день .
                            </p>
                            <p>
                                Если Вы не получили на мобильный телефон или e-mail сообщение о
                                поступлении оплаты, свяжитесь с менеджером агентства, предварительно
                                отправив нам копию платежного документа.
                            </p>
                            <p><strong>
                                ВНИМАНИЕ !!! при оплате проверяйте реквизиты и название получателя
                                платежа, они должны совпадать с написанием в полученном Вами счете.
                            </strong></p>
                            <p><strong>
                                Если оплату производит лицо, не указанное в счете, в назначении платежа
                                обязательна ссылка на номер счета и указание фамилии лица, за которое
                                производится оплата.
                            </strong></p>
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
                                    банковских дней для сохранения первоначальной стоимости тура. Если Вы не
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
                            <p>После полной оплаты тура Вам будет отправлен ваучер на заселение.</p>
                            <p>В ваучере будут прописаны:</p>
                            <ul>
                                <li>фамилии проживающих, их количество; если есть дети, то указывается их возраст;</li>
                                <li>категория номера;</li>
                                <li>даты проживания; количество дней пребывания;</li>
                                <li>тип питания и другие, входящие в стоимость услуги;</li>
                                <li>расчетный час.</li>
                            </ul>
                            <p>На нашем сайте Вы можете скачать Договор-оферту.</p>
                            <p>
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
                <div class="card">
                    <div class="card-header" id="headingNine">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                Как добраться до Крыма
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                        <div class="card-body">
                            <p><strong>1 На самолете.</strong></p>
                            <p>В Крыму только один аэропорт принимает рейсы. Он находится в городе Симферополь, новый терминал
                            аэропорта принимает гостей с 2018 г. Время полета из Москвы в Симферополь составляет примерно 2 часа
                            40 мин.</p>
                            <p><strong>Билеты на самолет можно приобрести по <a href="{{ route('avia') }}">ссылке</a>.</strong></p>
                            <p>Прямо на территории аэропорта Вы можете сесть на автобус, троллейбус или воспользоваться услугами
                            частного такси, чтобы добраться до одной из автостанций в городе или же любой точки в самом
                            Симферополе.</p>
                            <p>Международный аэропорт «Симферополь» <a href="https://new.sipaero.ru" target="_blank">new.sipaero.ru</a></p>
                            <p><strong>2 На поезде.</strong></p>
                            <p>Доехать до Крыма на поезде пока невозможно, поскольку прямого ж/д сообщения с полуостровом не
                            существует (планируется с декабря 2019 г.)</p>
                            <p>На поезде можно доехать до Анапы или Краснодара. Далее можно купить билеты на автобус до разных
                            городов Крыма.</p>
                            <p><strong>3 На автобусе.</strong></p>
                            <p>Добраться в Крым автобусом можно из различных городов, расположенных на юге России, или из Москвы.
                            Если Вы живете в других регионах страны, то Вам лучше сначала доехать до Москвы, Анапы, Краснодара,
                            Ростова-на-Дону, а уже оттуда поехать в Крым.</p>
                            <p>Автовокзалы и автостанции Крыма <a href="http://krimavtotrans.info" target="_blank">krimavtotrans.info</a></p>
                            <p><strong>4 На машине.</strong></p>
                            <p>Двигаться в направлении Крыма следует по трассе А-290 до её пересечения с новой дорогой в Тамани,
                            которая ведет на Крымский мост. По всему пути следования, а также на самом мосту, установлены указатели
                            направления движения.</p>
                            <p>Проезд по мосту бесплатный. Протяжённость моста составляет 19 км. На данный момент по мосту разрешена
                            максимальная скорость движения 90 км/час</p>
                            <p>После проезда моста, следует держаться левого направления на ближайшей развилке, если требуемое
                            направление Симферополь и Черноморское побережье. Если направление Азов, нужно выбирать правое
                            направление и двигаться в сторону Курортного.</p>
                            <ul>
                                <li>Из Москвы можно добраться до Крыма примерно за 20 часов.</li>
                                <li>Из Питера до Крыма можно добраться за 30 часов.</li>
                                <li>Из Ростова можно добраться на машине до Крыма за 7-8 часов.</li>
                                <li>Из Перми до Крыма можно добраться за 35 часов.</li>
                            </ul>
                            <p>Официальный сайт Крымского моста <a href="http://www.most.life/" target="_blank">most.life</a></p>
                            <p>Единая транспортная дирекция <a href="http://transdir.ru/" target="_blank">transdir.ru</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection