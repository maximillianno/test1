<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row form-group">
                    <div class="col-sm-4">
                        <select multiple="multiple"  class="form-control" v-model="usersSelect">
                            <option  v-for="user in users" :value="'news-action.' + user.id">
                                {{ user.email }}
                            </option>


                        </select>

                    </div>
                    <div class="col-sm-8">
                        <textarea name="" id="" rows="6" v-model="datamessages.join('\n')"></textarea>
                    </div>
                </div>

                <div class="form-group">


                    <input type="text" class="form-control" v-model="message">

                    <button @click="sendMessage" class="btn btn-default text mb-1">Отправить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data: function(){
            return {
                //Массив сообщений
                datamessages: [],
                message: "",
                //Пользователи для отправки
                usersSelect: [],


            }

        },
        props: [
            'users',
            'user'
        ],
        created() {
            var socket = io('http://localhost:3000');
            socket.on("news-action." + this.user.id + ":App\\Events\\PrivateMessage", function (data) {
                this.datamessages.push(data.message.user + ': ' + data.message.message);
            }.bind(this));
            socket.on("news-action.:App\\Events\\PrivateMessage", function (data) {
                this.datamessages.push(data.message.user + ': ' + data.message.message);
            }.bind(this));
            //чтобы не было пусто при открытии


        },
        methods:{
            sendMessage: function () {
                if (!this.usersSelect.length){
                    this.usersSelect.push('news-action.');

                }

                axios({
                    method: 'get',
                    url: '/start/socket-private',
                    params: { channels: this.usersSelect, message: this.message, user: this.user.email }
                }).then((response)=>{

                    //Тут он добавляет из респонса
                    // this.datamessages.push(this.user.email + ':' + this.message);
                    this.message = "";

                });
            },


        }
    }
</script>
