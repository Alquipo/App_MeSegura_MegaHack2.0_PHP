<template>
    <div>
        
        <transition name="fade">
            <label class="label-form" v-if="show">Vamos começar, qual o seu email?</label>
        </transition>
    </div>
</template>

<script>
    module.exports =  {
        data: function() {
            return {
                show: false
            }
        },
        mounted() {
            this.show = true;
             return console.log('Component mounted.');
        }
    };
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
      transition: opacity 1.5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
      opacity: 0;
    }

    .label-form{
        font-size: 2em;
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;
    }
</style>