<template>
    <div>


        <b-form @submit="onSubmit" @reset="onReset" v-if="show" v-bind:action="this.postRoute">    
            <b-container class="bv-example-row bv-example-row-flex-cols">
                <b-row align-v="start" style="min-height: 442px;">
                <transition name="slide-fade" mode="out-in">
                    
                        <!-- <form-group 
                          v-model="form.email"
                          name="email"
                          type="email"
                          placeholder="digite seu e-mail"
                          labeltext="Vamos começar, qual o seu email?"
                          key="0"
                          index="0"
                          v-if="docIndex == 0"
                          >
                          
                        </form-group> -->

                        <b-form-group
                            key="0"
                            index="0"
                            v-if="docIndex == 0"
                        >
                            <b-row align-v="start">
                                <label class="label-form">Vamos começar, qual o seu email?</label>
                            </b-row>
                           <b-row align-v="center">
                               <b-form-input
                                    
                                  required
                                  v-model="form.email"
                                  placeholder="digite seu e-mail"
                                  type="tel"
                                  name="email"
                                  class="input-form-control"
                                ></b-form-input>
                            </b-row>
                        </b-form-group>


                        <b-form-group
                            key="1"
                            index="1"
                            v-if="docIndex == 1"
                        >
                            <b-row align-v="start">
                                <label class="label-form">Agora, defina sua senha</label>
                            </b-row>
                           <b-row align-v="center">
                               <b-form-input
                                  required
                                  v-model="form.password"
                                  placeholder="digite sua senha"
                                  type="password"
                                  name="password"
                                  class="input-form-control"
                                ></b-form-input>
                            </b-row>
                        </b-form-group>

                        <b-form-group
                            key="2"
                            index="2"
                            v-if="docIndex == 2"
                        >
                            <b-row align-v="start">
                                <label class="label-form">Me diz, como gostaria que lhe chamássemos?</label>
                            </b-row>
                           <b-row align-v="center">
                               <b-form-input
                                  required
                                  v-model="form.nome"
                                  placeholder="digite sua nome"
                                  type="text"
                                  name="nome"
                                  class="input-form-control"
                                ></b-form-input>
                            </b-row>
                        </b-form-group>

                        <b-form-group
                            key="3"
                            index="3"
                            v-if="docIndex == 3"
                        >
                            <b-row align-v="start">
                                <label class="label-form">Quantos anos você?</label>
                            </b-row>
                           <b-row align-v="center">
                               <b-form-input
                                  required
                                  v-model="form.idade"
                                  placeholder="digite sua idade"
                                  type="text"
                                  name="idade"
                                  class="input-form-control"
                                ></b-form-input>
                            </b-row>
                        </b-form-group>

                        <b-form-group
                            key="4"
                            index="4"
                            v-if="docIndex == 4"
                        >
                            <b-row align-v="start">
                                <label class="label-form">Você pode, todo dia, fazer o controle das finanças pelo aplicativo e também pelo Whastapp</label>
                            </b-row>
                           <b-row align-v="center">
                               <b-form-input
                                  required
                                  v-model="form.celular"
                                  placeholder="número de celular"
                                  type="text"
                                  name="celular"
                                  class="input-form-control"
                                  v-mask="'(##) #####-####'" 
                                ></b-form-input>
                            </b-row>
                        </b-form-group>


        </transition>
        <b-container class="button-margin">
            <b-row align-h="between">
                <b-button variant="secondary" href="/login" v-if="docIndex == 0">Já tenho cadastro</b-button>
                <b-button variant="secondary" @click="onClicaVolta" v-if="docIndex > 0">Volta</b-button>
                <b-button variant="secondary" @click="onClicaProximo" v-if="docIndex < 4">Próximo</b-button>
                <b-button variant="primary" @click="onSubmit" v-if="docIndex == 4">Salvar</b-button>
            </b-row>
        </b-container>

        </b-form>
    </div>
</template>

<script>
    import FormGroup from './FormGroup'
    import {mask} from 'vue-the-mask'

    export default {
        name: 'form-cadastro',
        props: ['postRoute'],
        data: function() {
            return {
                form: {
                    nome: '',
                    email: '',
                    password: '',
                    celular: '',
                    idade: ''
                },
                docIndex:0,
                show: false
            };
        },
        components: {
            FormGroup,
            mask
        },
        mounted() {
            this.show = true;
             return console.log('Component mounted.');
        },
         methods: {
          onSubmit(evt) {
            evt.preventDefault();
            console.log(JSON.stringify(this.form));
            console.log(this.form)
            this.errors = {};
              axios.post('/user/register', this.form).then(response => {
                console.log('Message sent!');
              }).catch(error => {
                if (error.response.status === 422) {
                  this.errors = error.response.data.errors || {};
                }
              });
              console.log(this.errors);
          },
          onReset(evt) {
            evt.preventDefault()
            // Reset our form values
            this.form.email = ''
            this.form.nome = ''
            this.form.password = ''
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
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

    /* Animações de entrada e saída podem utilizar diferentes  */
/* funções de duração e de tempo.                          */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active em versões anteriores a 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

.button-margin{
    margin-top: 5rem;
}

.label-form{
        font-size: 2em;
        color: #8D8C88;
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;

    }

.input-form-control{
  margin-top: 3rem;
}
</style>