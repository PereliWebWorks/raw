<template>
<b-form-group 
	:label="_label"
	:label-for="_id"
>
	<date-picker
		v-if="_type === 'date'"
		:id="_id"
		value="new Date()"
		:config="{format: 'MMMM Do, YYYY'}"
		:value="value"
		v-on:input="$emit('input', $event.target.value)"
		:required="_required"
	/>
	<b-form-input
		v-else
		:id="_id"
		:type="_type"
		:value="value"
		v-on:input="$emit('input', $event)"
		:required="_required"
	/>
</b-form-group>
</template>

<script>


	export default{
		props: {
			/*
			id: {default: false},
			name: {required: true},
			label: {default: false},
			type: {default: 'text'},
			value: {required: true},
			autocomplete_list: {default: false}
			*/
			value: {},
			field: {required: true},
			name: {required: true}
		},
		computed: {
			_id: function(){return this.field.id || this.name;},
			_type: function(){return this.field.type || 'text';},
			_label: function(){return this.label || this.humanize(this.name);},
			_required: function(){return !!this.field.required},
			_name: function(){return this.name;},
			//_value: function(){return this.value;},
			_autocomplete_list: function(){return this.field.autocomplete_list;}
		},
		mounted: function(){
			if (this._autocomplete_list){
				console.log(this._autocomplete_list);
				this.add_autocomplete(
					$('#' + this._id).get(0), 
					{list: this._autocomplete_list}
				);
			}
			
		}
	}
</script>