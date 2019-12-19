<script>
    // TODO: Separate spinner to another component

    import VueRecaptcha from 'vue-recaptcha';
    import { required, minLength, maxLength, email } from 'vuelidate/lib/validators'

    export default {
        data: () => ({
            loading: true,
            hotels: [],
            datepicker: {
                required: true,
                mondayFirst: true,
                disabledDates: {
                    to: new Date(Date.now() - 86400000), // Disable all dates up to day before now
                }
            },
            submitStatus: null,

            hotel: null,
            room: null,
            arrival: new Date(),
            departure: new Date(Date.now() + 86400000), // Day after now
            payer: { first_name: null, last_name: null, phone_number: null, email: null },
            comment: null,
            tourists: [
                { first_name: null, last_name: null, date_of_birth: null },
            ],
        }),
        validations: {
            hotel: {
                required
            },
            room: {
                required
            },
            arrival: {
                required
            },
            departure: {
                required
            },
            payer: {
                first_name: {
                    required
                },
                last_name: {
                    required
                },
                phone_number: {
                    required,
                    minLength: minLength(10)
                },
                email: {
                    required,
                    email
                }
            },
            tourists: {
                required,
                minLength: minLength(1),
                $each: {
                    first_name: {
                        required
                    },
                    last_name: {
                        required
                    },
                    date_of_birth: {
                        required,
                        minLength: minLength(10),
                        maxLength: maxLength(10)
                    }
                }
            },
        },
        created() {
            this.getHotels()
        },
        methods: {
            customFormatter(date) {
                return dayjs(date).format('DD.MM.YYYY')
            },
            getHotels() {
                this.loading = true;

                axios.get('/api/hotels')
                    .then(response => {
                        this.hotels = response.data.data
                    })
                    .finally(() => {
                        this.loading = false
                    })
            },
            addTourist() {
                this.tourists.push({first_name: null, last_name: null, date_of_birth: null})
            },
            removeTourist() {
                this.tourists.pop()
            },
            async storeOrder() {
                this.$v.$touch();
                if (this.$v.$invalid) {
                    this.submitStatus = 'ERROR'
                } else {
                    // Submit logic
                    const order = {
                        hotel_id: this.hotel.id,
                        room_id: this.room,
                        arrival: dayjs(this.arrival).format('YYYY-MM-DD'),
                        departure: dayjs(this.departure).format('YYYY-MM-DD'),
                        payer: this.payer,
                        comment: this.comment,
                        tourists: this.tourists,
                    };
                    try {
                        await axios.post('/hotels/order', order);
                        this.$toastr.s('Mister, everything seems ok, boss.')
                    } catch (e) {
                        this.$toastr.w(e.response.data.message);
                        return Promise.reject(e)
                    }
                    // TODO: Lodash
                    // TODO: Interceptors

                    this.submitStatus = 'PENDING';
                    setTimeout(() => {
                        this.submitStatus = 'OK'
                    }, 500)
                }
            }
        },
        components: { VueRecaptcha }
    }

</script>

<template>
    <div class="container bg-white pb-4">
        <h3 class="pt-3 pb-3 mb-3 text-center bordered-bottom"><i class="fas fa-clipboard-list pr-2"></i> Заявка на бронирование</h3>

        <div v-if="loading" class="vh-100 d-flex justify-content-center">
            <div class="spinner align-self-center">
                <div class="cube1"></div>
                <div class="cube2"></div>
            </div>
        </div>

        <main v-if="!loading && hotels">
            <form @submit.prevent="storeOrder">
                <div class="form-group">
                    <label for="hotel">Отель</label>
                    <select class="form-control" :class="{ 'is-invalid': $v.hotel.$error }" id="hotel" name="hotel" v-model="hotel">
                        <option v-for="hotel in hotels" :key="hotel.id" :value="hotel">{{ hotel.name }}</option>
                    </select>

                    <div class="invalid-feedback" v-if="!$v.hotel.required">Поле обязательно для заполнения.</div>
                </div>

                <div v-if="hotel" class="form-group">
                    <label for="room">Номер</label>
                    <select class="form-control" :class="{ 'is-invalid': $v.room.$error }" id="room" name="room" v-model="room">
                        <option v-for="room in hotel.rooms" :key="room.id" :value="room.id">{{ room.name }}</option>
                    </select>

                    <div class="invalid-feedback" v-if="!$v.room.required">Поле обязательно для заполнения.</div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="arrival">Дата заезда</label>
                        <datepicker :required="datepicker.required"
                                    :monday-first="datepicker.mondayFirst"
                                    :format="customFormatter"
                                    :bootstrap-styling="true"
                                    :disabled-dates="datepicker.disabledDates"
                                    v-model="arrival"
                                    id="arrival"
                                    name="arrival">
                        </datepicker>

                        <div class="invalid-feedback" v-if="!$v.arrival.required">Поле обязательно для заполнения.</div>
                    </div>

                    <div class="form-group col">
                        <label for="departure">Дата выезда</label>
                        <datepicker :required="datepicker.required"
                                    :monday-first="datepicker.mondayFirst"
                                    :format="customFormatter"
                                    :bootstrap-styling="true"
                                    :disabled-dates="datepicker.disabledDates"
                                    v-model="departure"
                                    id="departure"
                                    name="departure">
                        </datepicker>

                        <div class="invalid-feedback" v-if="!$v.departure.required">Поле обязательно для заполнения.</div>
                    </div>
                </div>

                <h4 class="pt-3 pb-3 bordered-bottom mb-3">Плательщик</h4>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="payer_first_name">Имя</label>
                        <input type="text" class="form-control" :class="{ 'is-invalid': $v.payer.first_name.$error }" id="payer_first_name" v-model.trim="$v.payer.first_name.$model">

                        <div class="invalid-feedback" v-if="!$v.payer.first_name.required">Поле обязательно для заполнения.</div>
                    </div>

                    <div class="form-group col">
                        <label for="payer_last_name">Фамилия</label>
                        <input type="text" class="form-control" :class="{ 'is-invalid': $v.payer.last_name.$error }" id="payer_last_name" v-model.trim="$v.payer.last_name.$model">

                        <div class="invalid-feedback" v-if="!$v.payer.last_name.required">Поле обязательно для заполнения.</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="payer_phone_number">Телефон</label>
                        <input type="text" class="form-control" :class="{ 'is-invalid': $v.payer.phone_number.$error }" id="payer_phone_number" v-model.trim="$v.payer.phone_number.$model"/>

                        <div class="invalid-feedback" v-if="!$v.payer.phone_number.required">Поле обязательно для заполнения.</div>
                        <div class="invalid-feedback" v-if="!$v.payer.phone_number.minLength">Поле должно содержать не менее {{$v.payer.phone_number.$params.minLength.min}} символов.</div>
                    </div>

                    <div class="form-group col">
                        <label for="payer_email">Email</label>
                        <input type="text" class="form-control" :class="{ 'is-invalid': $v.payer.email.$error }" id="payer_email" v-model.trim="$v.payer.email.$model"/>

                        <div class="invalid-feedback" v-if="!$v.payer.email.required">Поле обязательно для заполнения.</div>
                        <div class="invalid-feedback" v-if="!$v.payer.email.email">Поле должно содержать email.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment">Комментарий</label>
                    <textarea class="form-control" id="comment" rows="3" v-model="comment"></textarea>
                </div>

                <h4 class="pt-3 pb-3 bordered-bottom mb-3">Туристы</h4>

                <template v-for="(tourist, index) in $v.tourists.$each.$iter">
                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label :for="`tourist_${index}_first_name`">Имя</label>
                            <input type="text" class="form-control" :class="{ 'is-invalid': tourist.first_name.$error }" :id="`tourist_${index}_first_name`" v-model.trim="tourist.first_name.$model">

                            <div class="invalid-feedback" v-if="!tourist.first_name.required">Поле обязательно для заполнения.</div>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label :for="`tourist_${index}_last_name`">Фамилия</label>
                            <input type="text" class="form-control" :class="{ 'is-invalid': tourist.last_name.$error }" :id="`tourist_${index}_last_name`" v-model.trim="tourist.last_name.$model">

                            <div class="invalid-feedback" v-if="!tourist.last_name.required">Поле обязательно для заполнения.</div>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label :for="`tourist_${index}_date_of_birth`">Дата рождения</label>
                            <input type="text" class="form-control" :class="{ 'is-invalid': tourist.date_of_birth.$error }" :id="`tourist_${index}_date_of_birth`" v-model.trim="tourist.date_of_birth.$model" placeholder="15.01.1985">

                            <div class="invalid-feedback" v-if="!tourist.date_of_birth.required">Поле обязательно для заполнения.</div>
                            <div class="invalid-feedback" v-if="!tourist.date_of_birth.minLength">Формат даты должен быть в виде 01.12.1980 (10 символов).</div>
                            <div class="invalid-feedback" v-if="!tourist.date_of_birth.maxLength">Формат даты должен быть в виде 01.12.1980 (10 символов).</div>
                        </div>
                    </div>
                </template>

                <p class="text-success" v-if="submitStatus === 'OK'">Благодарим за заявку! Копия отправлена на указанный вами Email.</p>
                <p class="text-danger" v-if="submitStatus === 'ERROR'">Пожалуйста заполните форму корректно.</p>
                <p v-if="submitStatus === 'PENDING'">Отправка...</p>

                <button type="submit" class="btn btn-success">Отправить заявку</button>
                <button @click.prevent="addTourist" class="btn btn-outline-success">Добавить туриста</button>
                <button v-if="Object.keys(tourists).length > 1" @click.prevent="removeTourist" class="btn btn-outline-primary">Убрать туриста</button>
            </form>
        </main>
    </div>
</template>
