<template>
    <div>
         <b-form @submit="onSubmit" @reset="onReset" v-if="show" v-bind:action="this.postRoute">
        <transition name="slide-fade" mode="out-in">
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
              v-model="form.password"
              name="password"
              type="password"
              placeholder="digite sua senha"
              labeltext="Agora, defina sua senha"
              key="1"
              v-if="docIndex == 1">
            </form-group>
            <form-group 
                index="2"
              v-model="form.nome"
              name="nome"
              type="text"
              placeholder="digite seu nome"
              labeltext="Me diz, como gostaria de ser chamado?"
              key="2"
              v-if="docIndex == 2">
              
            </form-group>
            <form-group 
                index="3"
              v-model="form.idade"
              name="idade"
              type="number"
              placeholder="digite sua idade"
              labeltext="Quantos anos você tem?"
              key="3"
              v-if="docIndex == 3">
            </form-group>
            <form-group 
                index="4"
              v-model="form.celular"
              name="celular"
              type="text"
              placeholder="número de celular"
              labeltext="Você pode, todo dia, fazer o controle das finanças pelo aplicativo e também pelo Whastapp"
              key="4"
              v-if="docIndex == 4">
            </form-group>


        </transition>
            <p>Email{{ this.form.email }}</p>
            <p>Senha{{ this.form.senha }}</p>
            <p>Nome{{ this.form.nome }}</p>
            <p>Idade{{ this.form.idade }}</p>
            <p>Celular{{ this.form.celular }}</p>
            <b-button variant="secondary" @click="onClicaVolta">Volta</b-button>
            <b-button variant="secondary" @click="onClicaProximo" v-if="docIndex < 4">Próximo</b-button>
            <b-button variant="primary" @click="onSubmit" v-if="docIndex == 4">Salvar</b-button>

        </b-form>
    </div>
</template>

<script>
    import FormGroup from './FormGroup'

    export default {
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
            FormGroup
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
</style>