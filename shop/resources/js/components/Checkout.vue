<template>
    <div>
        <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                        <div class="box">
                            <h3 class="box-title">Products in you cart</h3>
                            <div class="plan-selection" v-for="it in items" :key="it.id">
                                <div class="plan-data">
                                    <div class="data">

                                         <label for="question1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        </svg>

                                            {{ it.name }}</label>
                                    </div>

                                    <p class="plan-text">
                                        Quantity : {{ it.qty }}
                                    </p>
                                    <span class="plan-price">Price  ${{ it.sale_price }}</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">

                        <div class="widget">
                            <h4 class="widget-title">Order Summary</h4>
                            <div class="summary-block"  v-for="it in items" :key="it.id">
                                <div class="summary-content">
                                    <div class="summary-head"><h5 class="summary-title">{{ it.name }}</h5></div>
                                    <div class="summary-price">
                                        <p class="summary-text">
                                              $ {{ it.total }}
                                            </p>
                                        <span class="summary-small-text pull-right">
                                            Q    {{ it.qty }} x
                                            P    {{ it.sale_price }}

                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="summary-block">
                                <div class="summary-content">
                                   <div class="summary-head"> <h5 class="summary-title">Total</h5></div>
                                    <div class="summary-price">
                                        <p class="summary-text">${{ totalAmount }}</p>
                                        <span class="summary-small-text pull-right">1 month</span>
                                    </div>
                                    <div class="text-right">
                                        <hr>
                                        <button class="btn btn-warning">Place order</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        <div class="row">
            <div class="container mt-5 px-5">

<div class="mb-4">

    <h2>Confirm order and pay</h2>
<span>please make the payment, after that you can enjoy all the features and benefits.</span>

</div>

<div class="row">

<div class="col-md-8">


    <div class="card p-3">

        <h6 class="text-uppercase">Payment details</h6>
        <div class="inputbox mt-3"> <input type="text" name="name" v-model="name" class="form-control" required="required"> <span>Name on card</span> </div>


        <div class="row">

            <div class="col-md-6">

                <div class="inputbox mt-3 mr-2"> <input type="text" v-model="numcart" name="numcart" class="form-control" required="required"> <i class="fa fa-credit-card"></i> <span>Card Number</span>


                </div>


            </div>

            <div class="col-md-6">

                 <div class="d-flex flex-row">


                     <div class="inputbox mt-3 mr-2"> <input type="text" v-model="exp_year" name="name" class="form-control" required="required"> <span>Expiry year</span> </div>



                 </div>




                    <div class="d-flex flex-row">

                      <div class="inputbox mt-6 mr-2"> <input type="text" v-model="exp_mm" name="name" class="form-control" required="required"> <span>Expiry month</span> </div>
                   </div>
                   <div class="d-flex flex-row">
                      <div class="inputbox mt-3 mr-2"> <input type="text" name="name" v-model="cvv" class="form-control" required="required"> <span>CVC</span> </div>

                   </div>
            </div>

        </div>



        <div class="mt-4 mb-4">

            <h6 class="text-uppercase">Billing Address</h6>


            <div class="row mt-3">

                <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="name" v-model="street" class="form-control" required="required"> <span>Street Address</span> </div>


                </div>


                 <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="name" v-model="city" class="form-control" required="required"> <span>City</span> </div>


                </div>




            </div>


            <div class="row mt-2">

                <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" v-model="state" required="required"> <span>State/Province</span> </div>


                </div>


                 <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" v-model="zipcode" required="required"> <span>Zip code</span> </div>


                </div>




            </div>

        </div>

    </div>

    <div class="mt-4 mb-4 d-flex justify-content-between">


                <span>Previous step</span>


                <button @click.prevent="getuserinfo" class="btn btn-success px-3">Pay ${{totalAmount}}</button>




            </div>

</div>

<div class="col-md-4">

    <div class="card card-blue p-3 text-white mb-3">

       <span>You have to pay</span>
        <div class="d-flex flex-row align-items-end mb-3">
            <h1 class="mb-0 yellow">${{ totalAmount  }}</h1> <span>.99</span>
        </div>

        <span>Enjoy all the features and perk after you complete the payment</span>
        <a href="#" class="yellow decoration">Know all the features</a>

        <div class="hightlight">

            <span>100% Guaranteed support and update for the next 5 years.</span>


        </div>

    </div>

</div>

</div>


</div>
                        </div>
    </div>
</template>
<script>
import axios from 'axios';

    export default{
        data()
        {
            return {
                items : [],
                totalAmount : 0,
                name : '',
                numcart : '',
                exp_year : '',
                exp_mm : '',
                cvv : '',
                street : '',
                city : '',
                zipcode : '',
                state : ''
            }
        },
        methods:{
            async getCartItems(){
                let response = await axios.get('/getcartitem').then(e=>{
                    this.items = e.data
                    console.log(this.items)
                    for(let i in this.items)
                        this.totalAmount+=this.items[i].sale_price
                })

            },
            async getuserinfo()
            {
                let response = await axios.post('/payment',{
                    name : this.name,
                    numcart : this.numcart,
                    exp_year : this.exp_year,
                    exp_month : this.exp_mm,
                    cvv : this.cvv,
                    street : this.street,
                    state : this.state,
                    city : this.city,
                    zipcode : this.zipcode
                })
            }
        },
        created(){
            this.getCartItems()
        },

    }
</script>
<style>
   .card{
    border:none;
}

.form-control {
    border-bottom: 2px solid #eee !important;
    border: none;
    font-weight: 600
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #8bbafe;
    outline: 0;
    box-shadow: none;
    border-radius: 0px;
    border-bottom: 2px solid blue !important;
}



.inputbox {
    position: relative;
    margin-bottom: 20px;
    width: 100%
}

.inputbox span {
    position: absolute;
    top: 7px;
    left: 11px;
    transition: 0.5s
}

.inputbox i {
    position: absolute;
    top: 13px;
    right: 8px;
    transition: 0.5s;
    color: #3F51B5
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0
}

.inputbox input:focus~span {
    transform: translateX(-0px) translateY(-15px);
    font-size: 12px
}

.inputbox input:valid~span {
    transform: translateX(-0px) translateY(-15px);
    font-size: 12px
}

.card-blue{

    background-color: #492bc4;
}

.hightlight{

    background-color: #5737d9;
    padding: 10px;
    border-radius: 10px;
    margin-top: 15px;
    font-size: 14px;
}

.yellow{

    color: #fdcc49;
}

.decoration{

    text-decoration: none;
    font-size: 14px;
}

.btn-success {
    color: #fff;
    background-color: #492bc4;
    border-color:#492bc4;
}

.btn-success:hover {
    color: #fff;
    background-color:#492bc4;
    border-color: #492bc4;
}


.decoration:hover{

    text-decoration: none;
    color: #fdcc49;
}
</style>
