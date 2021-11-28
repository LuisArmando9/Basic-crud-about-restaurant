<template>
    <div class="container">
        <!-----COUNTERS------>
        <div class="row">
            <div class="col-sm-5">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3 v-text="customers"></h3> 
                        <h5>CLIENTES</h5>
                    </div> 
                    <div class="icon">
                        <i class="fas fa-user text-white"></i>
                    </div> 
                    <a href="/customer" class="small-box-footer">
                        Más detalles <i class="fas fa-lg fa-arrow-circle-right"></i>
                    </a> 
                    
                </div>
            </div>
            <div class="col-sm-5">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 v-text="orders"></h3> 
                        <h5>ORDENES</h5>
                    </div> 
                    <div class="icon">
                        <i class="fas fa-list text-white"></i>
                    </div> 
                   
                    <div class="overlay d-none">
                        <i class="fas fa-2x fa-spin fa-sync-alt text-gray"></i>
                    </div>
                    <a href="/order" class="small-box-footer">
                        Más detalles <i class="fas fa-lg fa-arrow-circle-right"></i>
                    </a> 
        
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="small-box bg-white p-2">
                   
                    <canvas id="status" ></canvas>
                </div>
            </div>
        </div>
        <!-----END COUNTERS------>
        <!-----------CHAR------------>
        <div class="row">
            <div class="col-md-9 bg-white">
                <canvas id="foods" ></canvas>
              
            </div>
             
        </div>
        <!-----------CHAR------------>
        <div class="row">
            <div class="col-md-9 bg-white">
                <canvas id="hours" ></canvas>
              
            </div>
             
        </div>
        

    </div>
   
</template>

<script>
    import bar from '../graphics/bar'
    import pie from '../graphics/pie'
    import line from '../graphics/line'
    export default {
        data(){
            return {
                orders:0,
                customers:0,
            };
        },

        methods: {
            
            async getGraphs(){
                var _this = this;
                setInterval(async function(){
                    const response =  await axios.get('/char');
                    _this.orders = response.data.orders;
                    _this.customers = response.data.customers;
                    var charBar = new bar(response.data.foods)
                    charBar.plot('foods')
                    var charPie = new pie(response.data.status);
                    charPie.plot("status")
                    console.log(response.data.hours);
                    var charLine = new line(response.data);
                    charLine.plot("hours");
                 
                }, 2000); 

            }
        },
        created(){
            this.getGraphs(); 
                   
        },
        mounted() {    
            
        },
        
    }
</script>
