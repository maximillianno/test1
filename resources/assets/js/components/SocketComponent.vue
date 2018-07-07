<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
                <input type="checkbox" v-model="realtime">
                <input type="text" v-model="label">
                <input type="text" v-model="sale">
                <button @click="sendData" class="btn btn-default text mb-1">Обновить - {{ id }}</button>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart.js'
    export default {
        components: {
            LineChart
        },
        data: function(){
            return {
                data: [],
                label: "",
                sale: 500,
                realtime: false,
                id: 0,


            }

        },
        mounted() {
            var socket = io('http://localhost:3000');
            socket.on("news-action:App\\Events\\NewEvent", function (data) {
                this.data = data.result
            }.bind(this));
            // this.update();
        },
        methods:{
            sendData: function () {
                axios({
                    method: 'get',
                    url: '/start/socket-io',
                    params: { label: this.label, sale: this.sale, realtime: this.realtime }
                }).then((response)=>{

                    //Тут он принимает данные из респонса, когда не стоит галочка принимать из редиса
                    this.data = response.data;
                    this.id++

                });
            },
            update:    function () {
                axios.get('/start/socket-io').then((response)=>{

                    this.data = response.data;
                    this.id++

                });
            }

        }
    }
</script>
