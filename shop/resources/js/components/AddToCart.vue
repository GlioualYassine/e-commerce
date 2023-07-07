<template>
    <div>
        <button class="btn btn-warning" @click.prevent="addProductToCart()">
             Add To Cart
        </button>
    </div>
</template>

<script>
    export default {
        data()
        {
            return {

            }
        },
        props : ['product_id',"user_id"],
        methods:{
           async addProductToCart(){
                if(this.user_id==0){
                    this.$toast.error('You Need to login, To add this product in Cart')
                    setTimeout(this.$toast.clear, 0);
                }
                let response = await axios.post('/cart',{
                    'product_id':this.product_id,
                    'user_id':this.user_id
                });
                console.log(response.data)
                if(response.data.message != null){
                    this.$toast.success('item added to the cart'),
                    setTimeout(this.$toast.clear, 0);
                    eventBus.emit('changeItCart', response.data.count);
                }

            },
        }
    }
</script>
