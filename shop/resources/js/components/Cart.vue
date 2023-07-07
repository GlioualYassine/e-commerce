<template>
    <li class="nav-item">
       <a href="/cart" class="btn btn-warning">cart {{ itemCount }}   </a>
    </li>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                itemCount : ''
            }
        },
        methods:{
            async getCartItemOnPageLoad(){
                let response = await axios.post('/cart');
                this.itemCount = response.data.count;
            }
        },
        created(){
            this.getCartItemOnPageLoad()
        }

        }

</script>
