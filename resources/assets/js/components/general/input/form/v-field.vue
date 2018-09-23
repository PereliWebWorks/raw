<template>
<b-form-group 
	:label="label ? label : humanize(name)"
	:label-for="id ? id : name"
>
	<date-picker
		v-if="type && type === 'date'"
		:id="id ? id : name"
		value="new Date()"
		:config="{format: 'MMMM Do, YYYY'}"
		:value="value"
		v-on:input="$emit('input', $event.target.value)"
	/>
	<b-form-input
		v-else
		:id="id ? id : name"
		:type="type ? type : 'text'"
		:value="value"
		v-on:input="$emit('input', $event)"
	/>
</b-form-group>
</template>

<script>


	export default{
		props: ['id', 'name', 'label', 'type', 'value', 'autocomplete_list'],
		data: function(){
			return {
				autocomplete_settings: {
					list: autocomplete_list ? autocomplete_list : null
				}
			}
		},
		components: {VueAwesomplete}
	}
</script>