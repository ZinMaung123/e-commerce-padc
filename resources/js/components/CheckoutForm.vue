<template>
    <form :action="action_url" method="POST" class="col-2 border mt-3">
        <slot></slot>
        <!-- <div class="col-1 border mt-3"> -->
            <div class="form-group mt-3">
                <div class="btn btn-success" v-if="validCode">Valid cupon code</div>
                <label for="coupon">Coupon Code</label>
                <input name='cupon_code' 
                        @blur="checkCupon"
                        v-model="cuponCode"
                        type="text" class="form-control" id="coupon" aria-describedby="couponHelp">
                <small id="couponHelp" class="form-text text-muted">Please enter the coupon code to get great discounts.</small>
            </div>
            <div class="mb-3">
                Total : <span class="font-weight-bold text-success"> {{ total_price }} USD</span>
            </div>
            <button type="submit" class="btn btn-primary">Checkout</button>
        <!-- </div> -->
    </form>
</template>
<script>
export default {
    props : ['total_price', 'action_url'],
    data(){
        return {
            cuponCode : null,
            validCode : false
        }
    },
    methods : {
        checkCupon(){
            console.log('checking cupon:', this.cuponCode);

            axios.get(`/api/v1/cupon-code/${this.cuponCode}`)
                 .then((data) => {
                     if(data.data){
                         this.validCode = true;
                     }
                });
        }
    }
}
</script>