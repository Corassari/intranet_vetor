<template >
    <h4 
    class="alert" 
    :class="altClass">{{ alertMsg }}</h4>
</template>

<script>
    export default {
        props:['alertMsg','alertClass'],
        computed:{ 
            altClass(){
                return 'alert-'+ this.alertClass 
            }
        },
       /* mounted:function(){
            this.alertMsg = 'Aguarde...'
        }*/
    }
</script>
