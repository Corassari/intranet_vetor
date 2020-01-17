<template>
    <button :type="buttonType"  :class="buttonClass" :disabled='buttonDisabled'>{{ buttonText }}</button>
</template>

<script>
export default {
    props:{
        buttonType:{
            type:String
        },
        buttonClass:{
            default:'btn btn-primary',
            type:String
        },
        buttonText:{
            default:'ENVIAR',
            type:String
        },
        buttonDisabled:{
            dafault:false
        }
    }
}
</script>