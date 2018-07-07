<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
            </div>
            <button @click="update" class="btn btn-default text mb-1">Обновить - {{ id }}</button>
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
                id: 0,


            }

        },
        mounted() {
            this.update();
        },
        methods:{
            update:    function () {
                axios.get('/start/data-chart').then((response)=>{

                    this.data = response.data;
                    this.id++

                });
            }
        }
    }
</script>
