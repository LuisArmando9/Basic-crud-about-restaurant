<template>
    <div class="container">
        <!-----COUNTERS------>
        <div class="row">
            <div class="col-sm-5">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3>424</h3> 
                        <h5>Views</h5>
                    </div> 
                    <div class="icon">
                        <i class="fas fa-eye text-dark"></i>
                    </div> 
                    <a href="#" class="small-box-footer">
                        View details <i class="fas fa-lg fa-arrow-circle-right"></i>
                    </a> 
                    <div class="overlay d-none">
                        <i class="fas fa-2x fa-spin fa-sync-alt text-gray"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>424</h3> 
                        <h5>Views</h5>
                    </div> 
                    <div class="icon">
                        <i class="fas fa-eye text-dark"></i>
                    </div> 
                    <a href="#" class="small-box-footer">
                        View details <i class="fas fa-lg fa-arrow-circle-right"></i>
                    </a> 
                    <div class="overlay d-none">
                        <i class="fas fa-2x fa-spin fa-sync-alt text-gray"></i>
                    </div>
                </div>
            </div>
           
        </div>
        <!-----END COUNTERS------>

    </div>
   
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
