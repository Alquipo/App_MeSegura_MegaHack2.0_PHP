<template>
    <div>

         <b-form @submit="onSubmit" @reset="onReset" v-if="show">
        <transition name="fade" mode="out-in">
            <form-group 
              index="0"
              v-model="form.email"
              name="email"
              type="email"
              placeholder="digite seu e-mail"
              labeltext="Vamos começar, qual o seu email?"
              key="0"
              v-if="docIndex == 0">
              
            </form-group>

            <form-group 
                index="1"
              v-model="form.nome"
              name="nome"
              type="text"
              placeholder="digite seu nome"
              labeltext="Me diz, como gostaria de ser chamado?"
              key="1"
              v-if="docIndex == 1">
              
            </form-group>


        </transition>
            <p>Email{{ this.form.email }}</p>
            <p>Nome{{ this.form.nome }}</p>
            <b-button variant="secondary" @click="onClicaVolta">Volta</b-button>
            <b-button variant="secondary" @click="onClicaProximo">Próximo</b-button>

        </b-form>
    </div>
</template>

<script>
    import FormGroup from './FormGroup'

    export default {
        data: function() {
            return {
                form: {
                    nome: '',
                    email: '',
                    password: '',
                    saldo: '',
                    idade: ''
                },
                docIndex:0,
                show: false
            };
        },
        components: {
            FormGroup
        },
        mounted() {
            this.show = true;
             return console.log('Component mounted.');
        },
         methods: {
          onSubmit(evt) {
            evt.preventDefault()
            alert(JSON.stringify(this.form))
          },
          onReset(evt) {
            evt.preventDefault()
            // Reset our form values
            this.form.email = ''
            this.form.nome = ''
            this.form.password = ''
            this.form.saldo = ''
            this.form.idade = ''
            // Trick to reset/clear native browser form validation state
            this.show = false
            this.$nextTick(() => {
              this.show = true
            })},
            onClicaProximo(evt){
                this.docIndex++;
            },
            onClicaVolta(evt){
                this.docIndex--;
            }
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

    .component-fade-enter-active, .component-fade-leave-active {
      transition: opacity .3s ease;
    }
    .component-fade-enter, .component-fade-leave-to
    /* .component-fade-leave-active em versões anteriores a 2.1.8 */ {
      opacity: 0;
    }
</style>