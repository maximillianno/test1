<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <textarea name="" id="" cols="30" rows="10" v-model="datamessages.join('\n')"></textarea>
                <input type="text" class="form-control" v-model="message">
          
                <button @click="sendMessage" class="btn btn-default text mb-1">Отправить</button>
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
                datamessages: [],
                message: '',


            }

        },
        mounted() {
            var socket = io('http://localhost:3000');
            socket.on("news-action:App\\Events\\NewMessage", function (data) {
                this.datamessages.push(data.message);
            }.bind(this));
            //чтобы не было пусто при открытии

        },
        methods:{
            sendMessage: function () {
                axios({
                    method: 'get',
                    url: '/start/socket-chat',
                    params: { message: this.message }
                }).then((response)=>{

                    //Тут он принимает данные из респонса, когда не стоит галочка принимать из редиса
                    this.message = "";

                });
            },


        }
    }
</script>
