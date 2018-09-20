<template>
	<div class="form-group">
		<label v-bind:for="name">{{getLabel}}</label>
		<input class="form-control" :type="type" :id="name" :placeholder="placeholder" />
	</div>
</template>

<script>
	export default{
		//props: ['name', 'label', 'type', 'placeholder'],
		props: {
			name: {},
			label: {
				default: false
			},
			type: {
				default: 'text'
			},
			placeholder: {
				default: ''
			}
		},
		computed: {
			getLabel(){
				return this.label || this.name;
			}
		}
	}
</script>