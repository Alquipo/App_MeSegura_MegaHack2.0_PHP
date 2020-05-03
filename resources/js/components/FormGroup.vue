<template>

	<b-form-group
                id="'input-group-' + index"
                >
      <b-row align-v="start">
       <label class="label-form" v-html="this.labeltext"></label>
      </b-row>
       <b-row align-v="center">
	   <b-form-input
	      required
	      v-model="field"
	      v-bind:placeholder="this.placeholder"
	      v-bind:type="this.type"
	      v-bind:name="this.name"
        v-bind:style="{marginTop: '3rem'}"
	    ></b-form-input>
      </b-row>
	</b-form-group>
  
</template>

<script>
export default {

  name: 'form-group',
  props: ['index', 'name', 'type', 'placeholder', 'labeltext'],
  data () {
    return {
    	value: ''
    }
  },
  	computed: {
        	field: {
          	get() {
            	return this.value;
         	},
         	set(value)
         	{
         		this.$emit('input', value);
         	}
  		}
	}
};
</script>

<style lang="css" scoped>
.label-form{
        font-size: 2em;
        color: #8D8C88;
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;

    }

</style>