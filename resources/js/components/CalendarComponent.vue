<template>
    <div class="row">
        <div class="col-md-8">
            <h4>Agenda</h4>
            <hr/>
            <header class="calendar-header">
                <div class="row mt-5">
                    <div class="col-md-2">
                        <button class="btn btn-transparent">
                            <i class="fa fa-chevron-left fa-2x"></i>
                        </button>
                    </div>
                    <div class="col-md-8 text-center">
                        <div class="row">
                            <div class="col-md-12"><h5>{{ year }}</h5></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><h3 class="title">{{ month }}</h3></div>
                        </div>
                    </div>
                    <div class="col-md-2 text-right">
                        <button class="btn btn-transparent">
                            <i class="fa fa-chevron-right fa-2x"></i>
                        </button>
                    </div>
                </div>
            </header>
            <section class="calendar-container">
                <div class="weekdays">
                    <div class="weekday">Seg</div>
                    <div class="weekday">Ter</div>
                    <div class="weekday">Qua</div>
                    <div class="weekday">Qui</div>
                    <div class="weekday">Sex</div>
                    <div class="weekday">Sáb</div>
                    <div class="weekday">Dom</div>
                </div>
                <div class="weekdays-numb">
                    <div v-for="day in monthdays.prev" :key="`weekday-last-month-${day}`" class="weekday-numb weekday-month-prev">{{ day }}</div>
                    <div v-for="day in monthdays.current" @click="handleSelectDay(day)" :key="`weekday-${day}`" :class="{ 'weekday-numb' : true, 'today': day === current_day.getDate(), 'selected': day_selected.date === day }">{{ day }}</div>
                    <div v-for="day in monthdays.next" :key="`weekday-next-${day}`" class="weekday-numb weekday-month-next">{{ day }}</div>
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <h4>Eventos</h4>
            <hr/>
            <section class="events">
                <div class="row mt-3">
                    <small v-if="day_selected.date === 0">{{ weekdays[current_day.getDay()-1] }}, {{ current_day.getDate() }} de {{ months[current_day.getMonth()] }} de {{ current_day.getFullYear() }}</small>
                    <small v-else>{{ day_selected.day }}, {{ day_selected.date }} de {{ day_selected.month }} de {{ day_selected.year }}</small>
                    <ul class="events-list py-3">
                        <li v-for="event in events">
                            <a href="#">
                                <h3>{{ event.title }}</h3>
                                <p>{{ event.datetime }} <strong>|</strong> {{ event.description }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'calendar-component',
        data () {
            return {
                year: new Date().getFullYear(),
                month: null,
                current_day: new Date(),
                months: [],
                weekdays: [],
                monthdays: {
                    prev: [],
                    current: [],
                    next: []
                },
                events: [{
                    title: 'Evento 1',
                    datetime: '22:00',
                    description: 'Descrição do evento 1'
                }],
                weekday: null,
                day_selected: {
                    day: null,
                    date: 0,
                    month: 0
                }
            }
        },
        created () {
            let first_month_day = new Date(this.current_day.getFullYear(), this.current_day.getMonth(), 1);
            let last_month_day = new Date(this.current_day.getFullYear(), this.current_day.getMonth() + 1, 0);
            let last_prev_month_day = new Date(this.current_day.getFullYear(), this.current_day.getMonth(), 0);
            this.months = [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ];

            this.weekdays = [
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sáb",
                "Dom"
            ];

            this.month = this.months[this.current_day.getMonth()];
            this.weekday = this.weekdays[first_month_day.getDay()-1];
            let last_days_prev_month = [];
            let a = last_month_day;

            for(let day = 1; day <= last_month_day.getDate(); day++)
                this.monthdays.current.push(day);

            for(let x = 0; x < first_month_day.getDay()-1; x++)
                last_days_prev_month.push(x);

            for(let y = last_prev_month_day.getDate(); y > last_prev_month_day.getDate()-last_days_prev_month.length; y--)
                this.monthdays.prev.push(y);

            for(let k = last_month_day.getDay(); k < this.weekdays.length; k++)
                this.monthdays.next.push(new Date(a.setDate(a.getDate() + 1)).getDate());

        },
        methods: {
            isToday: function (date) {
                let current_date = new Date();
                return current_date === date;
            },
            handleSelectDay: function (day) {
                let date = new Date(this.current_day.getFullYear(), this.current_day.getMonth(), day);
                this.day_selected = {
                    day: this.weekdays[date.getDay()-1 === -1 ? 6 : date.getDay()-1],
                    date: day,
                    month: this.months[date.getMonth()],
                    year: date.getFullYear()
                }

                console.log();

                this.events = [{
                    title: 'Evento 2',
                    datetime: '20:30',
                    description: 'Descrição do evento 2'
                }];
            }
        }
    }
</script>
