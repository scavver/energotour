@extends("layouts.app")

@section("title")
Способы оплаты
@endsection

@section("description")
Как оплатить путевку у туроператора Энерго-Тур.
@endsection

@section("content")
    <main>
        <div class="container pb-3">
            <h3 class="pt-3 pb-3 mb-3 bordered-bottom">Как оплатить</h3>

            <div class="card" style="border-radius: 0rem !important;">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills" style="font-weight: 400 !important;">
                        <li class="nav-item">
                            <a class="nav-link custom active" id="pills-cash-tab" data-toggle="pill" href="#pills-cash" role="tab" aria-controls="pills-cash" aria-selected="true">Наличными</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false">На расчетный счет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-card-tab" data-toggle="pill" href="#pills-card" role="tab" aria-controls="pills-card" aria-selected="false">Картой</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-pay-travel-tab" data-toggle="pill" href="#pills-pay-travel" role="tab" aria-controls="pills-pay-travel" aria-selected="false">Терминалы Pay.Travel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-qiwi-tab" data-toggle="pill" href="#pills-qiwi" role="tab" aria-controls="pills-qiwi" aria-selected="false">QIWI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-megafon-tab" data-toggle="pill" href="#pills-megafon" role="tab" aria-controls="pills-megafon" aria-selected="false">Салоны Мегафон</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-prom-tab" data-toggle="pill" href="#pills-prom" role="tab" aria-controls="pills-prom" aria-selected="false">ПромСвязьБанк</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-mkb-tab" data-toggle="pill" href="#pills-mkb" role="tab" aria-controls="pills-mkb" aria-selected="false">МКБ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Cash -->
                        <div class="tab-pane fade show active" id="pills-cash" role="tabpanel" aria-labelledby="pills-cash-tab">
                            <p>Оплата наличными возможна в офисе компании в г.Симферополь, бул. Франко 6-а, оф.4</p>

                            <div class="py-2">
                                <div class="iframe">
                                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad1f97bda4c57e9efc8c336f016da7290050e876449fe92ef563ad629bcc0ef39&amp;source=constructor" width="100%" height="350" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- Account -->
                        <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                            <p>Оплатить счет можно в любом банке РФ, либо из Вашего личного кабинета банка, в котором Вы обслуживаетесь.</p>

                            <p>При оплате  счета в банке, в графе «Назначение платежа»:</p>

                            <ol>
                                <li>необходимо обязательно указывать номер полученного Вами счета на оплату.</li>
                                <li>если Вы вносите предоплату по нескольким счетам одновременно, следует указать суммы перечислений по каждому из счетов.</li>
                                <li>если Вы производите оплату за другое лицо, необходимо указывать фамилию туриста, за которого осуществляется платеж.</li>
                            </ol>

                            <p>Например: «Оплата за туруслуги по сч.№ 642 за Иванова А.Я.»</p>
                        </div>
                        <!-- Card -->
                        <div class="tab-pane fade" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                            <p>К оплате принимаются банковские карты Visa, MasterCard, Maestro и МИР.</p>

                            <p>Полные реквизиты Вашей банковской карты передаются в банк-эквайер по защищенному протоколу в зашифрованном виде. <br>Информация защищена в соответствии с международным стандартом безопасности при работе с банковскими картами PCI DSS 3.2.</p>

                            <p>При выборе данного способа оплаты, менеджер вместе со счетом отправляет Вам ссылку для оплаты пластиковой картой.</p>

                            <p>Пройдите по ссылке, заполните открывшуюся форму:</p>

                            <div class="pb-3">
                                <a href="{{ asset('images/howToPay-01.jpg') }}" data-toggle="lightbox" class="text-center">
                                    <img src="{{ asset('images/howToPay-01.jpg') }}" class="img-fluid rounded" width="40%">
                                </a>
                            </div>

                            <p>Комиссия – 1,15%</p>

                            <p>В случае необходимости возврата денежных средств, ранее оплаченных данным способом - возврат осуществляется  на личный расчетный счет клиента  за вычетом следующих удержаний:  0,9%  банковские расходы по переводу денежных средств на карту клиента.</p>

                            <p>По всем возникающим техническим вопросам просьба обращаться в службу поддержки по телефону: +7 495 995-58-78</p>

                            <p>Ссылка для обратной связи: <a href="http://pay.travel/site/contacts" target="_blank">http://pay.travel/site/contacts</a></p>
                        </div>
                        <!-- Pay.Travel -->
                        <div class="tab-pane fade" id="pills-pay-travel" role="tabpanel" aria-labelledby="pills-pay-travel-tab">
                            <p>Широкая сеть платежных терминалов позволяет произвести оплату туров в 50-ти регионах России. <br>При оплате счета  частными  лицами  через  терминал  Pay Travel комиссия не взимается.</p>

                            <p><strong>Как оплатить тур через терминалы PAY.TRAVEL</strong></p>
                            <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура. <br>В этом случае Вы получите счет, номер для оплаты через терминал Pay Travel и инструкцию по оплате.</p>

                            <p><strong>Комиссия с плательщика не взимается!</strong></p>
                            <ol>
                                <li>выберите любой из ближайших к Вам терминалов Pay Travel.</li>
                                <li>выберите кнопку «Pay.travel.Оплата по счету».</li>
                                <li>в появившемся окне введите 13-значный номер, полученный вместе со счетом, и нажмите кнопку «далее»</li>
                                <li>внесите требуемую сумму и нажмите «Оплатить»</li>
                                <li>в случае, если Вы  оплатите больше, чем указано, оставшуюся сумму Вы можете перечислить на номер мобильного телефона.</li>
                                <li>сохраните чек до подтверждения оплаты.</li>
                            </ol>
                            <p>
                                Если у Вас возникли сложности при совершении оплаты, обращайтесь по телефону: +7 (495) 995 58 78 или по электронной почте: info@pay.travel
                                или задайте Ваш вопрос на сайте через форму обратной связи: <a href="http://pay.travel/site/contacts" target="_blank">http://pay.travel/site/contacts</a>.
                            </p>

                            <p>В случае необходимости возврата денежных средств, ранее оплаченных через платежную систему Pay Travel - возврат осуществляется  на личный расчетный счет клиента  за вычетом следующих удержаний: 0,7% -вычет за перевод средств  через платежную систему  Pay Travel (денежные средства списываются во время оплаты платежа через терминал)  и  0,9%  банковские расходы по переводу денежных средств на карту клиента.</p>
                        </div>
                        <!-- QIWI -->
                        <div class="tab-pane fade" id="pills-qiwi" role="tabpanel" aria-labelledby="pills-qiwi-tab">
                            <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура. <br>В этом случае Вы получите счет и инструкцию с номером для оплаты.</p>

                            <p><strong>Для оплаты данной заявки наличными через QIWI Терминалы:</strong></p>

                            <ol>
                                <li>Найдите ближайший QIWI терминал;</li>
                                <li>В терминале выберите раздел «ПОИСК» или «ОПЛАТА УСЛУГ»;</li>
                                <li>Найдите оператора «Аппекс. Платежный сервис»;</li>
                                <li>Введите 13-значный номер для оплаты, нажмите «Продолжить»;</li>
                                <li>Проверьте правильность введения данных;</li>
                                <li>Внесите требуемую сумму;</li>
                                <li>Получите и сохраните квитанцию. Максимальная сумма платежа в пользу оператора «Аппекс / Pay.Travel» не может превышать 15 000 рублей.В случаях, если сумма заказа более 15 000 — примите оплату в несколько частей.Чек выбивается на каждый платеж (на все платежи по 15 000 и на остаток по счету)</li>
                            </ol>

                            <p><strong>Для оплаты данной заявки c помощью QIWI Wallet:</strong></p>

                            <ol>
                                <li>Перейдите на сайт QIWI;</li>
                                <li>В строку поиска введите наименование получателя «АППЕКС»;</li>
                                <li>Выберете получателя / Нажмите кнопку «АППЕКС»;</li>
                                <li>Введите номер заказа и сумму.</li>
                            </ol>

                            <p>QIWI Wallet легко пополнить без комиссии в QIWI Терминалах и терминалах партнеров, банковскими картами, в салонах сотовой связи, супермаркетах, банкоматах или через интернет- банк.Совершать платежи вы можете не только со счета QIWI Wallet, но и банковской картой, наличными, а также со счета мобильного телефона.Если у вас нет QIWI Wallet, зарегистрируйте его на сайте или в любом из приложений QIWI Wallet за минуту. Если у вас возникли сложности при совершении оплаты, Вы можете получить консультацию по телефону +7 495 995-58-78</p>

                            <p>Комиссия с плательщика 2%.</p>

                            <p>В случае необходимости возврата денежных средств, ранее оплаченных через QIWI- возврат осуществляется  на личный расчетный счет клиента  за вычетом следующих удержаний: 0,9%  банковские расходы по переводу денежных средств на карту клиента.</p>
                        </div>
                        <!-- Megafon -->
                        <div class="tab-pane fade" id="pills-megafon" role="tabpanel" aria-labelledby="pills-megafon-tab">
                            <p>Внимание! Оплата возможна только через сотрудника в салоне связи Мегафон.</p>

                            <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура. <br>В этом случае Вы получите счет и инструкцию с номером для оплаты.</p>

                            <p><strong>Для оплаты данной заявки в салонах связи Мегафон Вам необходимо:</strong></p>

                            <ol>
                                <li>Выбрать любой из ближайших к Вам салонов Мегафон;</li>
                                <li>Сообщить продавцу следующую информацию: оператор по приему платежей "Аппекс" номер для оплаты заявки XXXXXXXXXXXXX</li>
                                <li>Сотрудник салона перед оплатой должен передать Вам на подпись пречек - для проверки информации по Вашему платежу. В пречеке должна присутствовать надпись: «АППЕКС», а также номер заявки и сумма платежа.</li>
                                <li>Внесите необходимую сумму;</li>
                                <li>Получите чек, подтверждающий платеж.</li>
                            </ol>

                            <p>При оплате заказа в салонах сотовой связи «Мегафон» комиссия не взимается.Если сумма платежа больше 15 000 руб. необходимо предъявить паспорт того, кто непосредственно производит оплату.</p>

                            <p>Комиссия – 0.8%</p>

                            <p>В случае необходимости возврата денежных средств, ранее оплаченных данным способом - возврат осуществляется на личный расчетный счет клиента за вычетом следующих удержаний: 0,9% банковские расходы по переводу денежных средств на карту клиента.</p>

                            <p>Если у вас возникли сложности при совершении оплаты, Вы можете получить консультацию по телефону +7 495 995-58-78</p>
                        </div>
                        <!-- Prom -->
                        <div class="tab-pane fade" id="pills-prom" role="tabpanel" aria-labelledby="pills-prom-tab">
                            <!-- Отделения -->
                            <h4 class="pb-2">Оплата в отеделениях "ПромсвязьБанк"</h4>

                            <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура.<br>В этом случае Вы получите счет и инструкцию с номером для оплаты.</p>

                            <p><strong>Для оплаты данной заявки в отделениях Промсвязьбанка Вам необходимо:</strong></p>

                            <ol>
                                <li>Распечатать Квитанцию для оплаты;</li>
                                <li>
                                    Заполнить Квитанцию, указав:
                                    <ul>
                                        <li>данные Плательщика (Ф.И.О.)</li>
                                        <li>номер для оплаты XXXXXXXXXXXXX</li>
                                        <li>актуальную дату платежа</li>
                                        <li>сумму к оплате, которая будет актуальна на дату платежа</li>
                                    </ul>
                                    Требования к заполнению Квитанции:
                                    <ul>
                                        <li>корректно и без ошибок заполнить Ф.И.О. Плательщика;</li>
                                        <li>номер для оплаты указать строго без пробелов и дефисов;</li>
                                        <li>дата квитанции должна совпадать с датой оплаты.</li>
                                    </ul>
                                </li>
                                <li>В случае оплаты заявки не одним из туристов, потребуется предъявить операционисту заполненную «Анкету выгодоприобретателя». Анкету можно заполнить заблаговременно (просмотреть порядок заполнения анкеты) (форма Анкеты и порядок заполнения прилагается к данному счету);</li>
                                <li>Выбрать любое из ближайших к Вам <a href="https://www.psbank.ru/Office" target="_blank">отделений Промсвязьбанка;</a></li>
                                <li>Предоставить операционисту заполненные Квитанцию, Анкету и паспорт, при оплате суммы свыше 15 000 руб.</li>
                                <li>Передать кассиру необходимую сумму к оплате.</li>
                                <li>Получить у операциониста документы, подтверждающие совершение платежа.</li>
                            </ol>

                            <p>Важно: оплату производить СТРОГО в отделениях Промсвязьбанка по коду операции 6082.Запрещается проводить оплату по данной квитанции через другие банки.</p>

                            <p>Комиссия – 0.8%</p>

                            <p>В случае необходимости возврата денежных средств, ранее оплаченных данным способом - возврат осуществляется на личный расчетный счет клиента за вычетом следующих удержаний: 0,9% банковские расходы по переводу денежных средств на карту клиента.</p>

                            <p>Если у вас возникли сложности при совершении оплаты, Вы можете получить консультацию по телефону +7 495 995-58-78</p>

                            <!-- Интернет-банкинг -->
                            <h4 class="py-3">Интернет-банк "ПромсвязьБанк"</h4>

                            <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура. <br>В этом случае Вы получите счет и инструкцию с номером для оплаты.</p>

                            <p><strong>Для оплаты данной заявки в интернет-банке Промсвязьбанка Вам необходимо:</strong></p>

                            <ol>
                                <li>Авторизоваться на <a href="https://www.psbank.ru/" target="_blank">сайте Банка</a>, используя Ваш логин и пароль;</li>
                                <li>Из разделе «Платежи и переводы» перейти в «Товары и услуги», далее - раздел «Туризм», «Прочие туристические компании». Среди доступных для оплаты наименований выбрать - «Центр бронирования на Кольской»</li>
                                <li>Ввести номер для оплаты XXXXXXXXXXXXX и сумму к оплате (номер счета вводится строго без дефисов и пробелов).</li>
                                <li>Произвести оплату</li>
                            </ol>

                            <p>Комиссия – 0.8%</p>

                            <p>В случае необходимости возврата денежных средств, ранее оплаченных данным способом - возврат осуществляется на личный расчетный счет клиента за вычетом следующих удержаний: 0,9% банковские расходы по переводу денежных средств на карту клиента.</p>

                            <p>Если у вас возникли сложности при совершении оплаты, Вы можете получить консультацию по телефону +7 495 995-58-78</p>
                        </div>
                        <!-- MKB -->
                        <div class="tab-pane fade" id="pills-mkb" role="tabpanel" aria-labelledby="pills-mkb-tab">
                            <!-- Налик -->
                            <h4 class="pb-2">Оплата наличными в терминалах Московского Кредитного Банка (МКБ)</h4>
                             <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура. <br>В этом случае Вы получите счет и инструкцию с номером для оплаты.</p>

                            <ol>
                                <li>Выберите любой из ближайших к Вам терминал <a href="https://mkb.ru/about/address/atm" target="_blank">ОАО «МКБ»</a>;</li>
                                <li>В терминале выбрать раздел «Другие услуги»;</li>
                                <li>Выбрать кнопку «Pay.Travel. Оплата по счету»;</li>
                                <li>Далее «Pay.Travel. Оплата по счету наличными»;</li>
                                <li>Ввести 12 или 13-значный номер без дефисов, для оплаты заявки, нажать «Продолжить»;</li>
                                <li>Проверить правильность введенных данных;</li>
                                <li>Выбрать способ оплаты – наличные;</li>
                                <li>Внести требуемую сумму;</li>
                                <li>Получить и сохранить квитанцию.</li>
                            </ol>

                            <p>Комиссия – 0,8%</p>

                            <p>Если у вас возникли сложности при совершении оплаты, Вы можете получить консультацию по телефону +7 495 995-58-78</p>

                            <p>Внимание! При возврате денежных средств, оплаченных физическими лицами через платежные системы или банковской картой, банками удерживается комиссия за обслуживание.</p>
                            <!-- Карта -->
                            <h4 class="py-3">Оплата картами в терминалах Московского Кредитного Банка (МКБ) </h4>

                            <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура. <br>В этом случае Вы получите счет и инструкцию с номером для оплаты.</p>

                            <ol>
                                <li>Выберите любой из ближайших к Вам терминал <a href="https://mkb.ru/about/address/atm" target="_blank">ОАО «МКБ»</a>;</li>
                                <li>В терминале выбрать раздел «Другие услуги»;</li>
                                <li>Выбрать кнопку «Pay.Travel. Оплата по счету»;</li>
                                <li>Далее «Pay.Travel. Оплата по счету картой»;</li>
                                <li>Ввести 12 или 13-значный номер без дефисов, для оплаты заявки, нажать «Продолжить»;</li>
                                <li>Проверить правильность введенных данных;</li>
                                <li>Выбрать способ оплаты – банковская карта;</li>
                                <li>Вставить карту в терминал, ввести требуемые данные и произвести оплату;</li>
                                <li>Получить и сохранить квитанцию.</li>
                            </ol>

                            <p>Комиссия – 1,8%</p>

                            <p>Если у вас возникли сложности при совершении оплаты, Вы можете получить консультацию по телефону +7 495 995-58-78</p>

                            <p>Внимание! При возврате денежных средств, оплаченных физическими лицами через платежные системы или банковской картой, банками удерживается комиссия за обслуживание.</p>
                        </div>
                        <!-- Contact -->
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <p>Если Вы предпочитаете данный способ оплаты, сообщите об этом менеджеру при бронировании тура. <br>В этом случае Вы получите счет и инструкцию с номером для оплаты.</p>

                            <ol>
                                <li>Выберите любой из ближайших к Вам <a href="https://www.contact-sys.com/where" target="_blank">пунктов Contact</a>;</li>
                                <li>
                                    Оплата услуг доступна не во всех пунктах Contact.
                                    Уточните возможность оплаты в выбранном отделении, позвонив в круглосуточную справочную службу по телефону 8 800 200-42-42. Звонок по России бесплатный.
                                </li>
                                <li>
                                    Сообщите кассиру-операционисту следующую информацию:
                                    <ul>
                                        <li>оператор по приему платежей «Pay.Travel - оплата по счету» (код для сотрудников Contact - PAYS)</li>
                                        <li>номер для оплаты заявки</li>
                                    </ul>
                                </li>
                                <li>Передайте кассиру необходимую сумму к оплате;</li>
                                <li>Получите у операциониста чек, подтверждающий ваш платеж.</li>
                            </ol>

                            <p>Комиссия – 0,8%</p>

                            <p>Если у вас возникли сложности при совершении оплаты, Вы можете получить консультацию по телефону +7 495 995-58-78</p>

                            <p>Внимание! При возврате денежных средств, оплаченных физическими лицами через платежные системы или банковской картой, банками удерживается комиссия за обслуживание.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection