<template>
<b-form-group 
	:label="_label"
	:label-for="_id"
>
	<b-input-group class="input-group">
		<div class="form-field-container">

			<date-picker
				v-if="_type === 'date'"
				:id="_id"
				:config="datePickerConfig"
				:value="_required ? new Date() : null"
				v-on:input="$emit('input', $event)"
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


			<b-input-group-append v-if="_autocomplete_dropdown" :id="_id + '-dropdown-btn'">
				<b-btn  variant="info"><icon type="caret-down" /></b-btn>
			</b-input-group-append>
		</div>
		<div v-if="_help_text" class="help-text-container">
			<b-form-text>
				{{_help_text}}
			</b-form-text>
		</div>
	</b-input-group>
</b-form-group>
</template>

<script>

	/*
	var inputElement = Vue.component('input-element', {
		render: function(createElement){
			var id = this.field.id = this.name;
			var type = this.field.type ? this.field.type :
						this.name.toLowerCase() === 'email' ? 'email' :
						this.name.toLowerCase() === 'phone' ? 'phone' :
						'text';
			var required = 'required' in this.field && this.field.required === true;
			var label = this.field.label || this.humanize(this.name);
			if (required) label += ' *';
			var name = this.name;
			var autocomplete_list = this.field.autocomplete_list || false;
			var autocomplete_dropdown = this.field.autocomplete_dropdown || false;
			var help_text = this.field.help_text || false;
			var datePickerConfig = {
				format: 'MMMM Do, YYYY', 
				useCurrent: false,
				showClose: true,
				showClear: true
			}
			var value = this.value;
		},
		props: {
			field: {required: true},
			value: {},
			name: {required: true}
		}
	});
	*/

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
			name: {required: true},
			label: {}
		},
		computed: {
			_id: function(){return this.field.id || this.name;},
			_type: function(){
				if (this.field.type) return this.field.type;
				if (this.name.toLowerCase() === 'email') return 'email';
				if (this.name.toLowerCase() === 'phone') return 'tel';
				return 'text';
			},
			_label: function(){
				var l = this.label || this.field.label || this.name;
				l = this.humanize(l);
				if (this._required) l += ' *';
				return l;
			},
			_required: function(){return 'required' in this.field ? this.field.required : true},
			_name: function(){return this.name;},
			//_value: function(){return this.value;},
			_autocomplete_list: function(){return this.field.autocomplete_list;},
			_autocomplete_dropdown: function(){return !!this.field.autocomplete_dropdown},
			_help_text: function(){return this.field.help_text}
		},
		data: function(){
			return {
				datePickerConfig: {
					format: 'MMMM Do, YYYY', 
					useCurrent: false,
					showClose: true,
					showClear: true
				}
			}
		},
		mounted: function(){
			if (this._autocomplete_list){
				var element = $('#' + this._id).get(0);
				this.add_autocomplete(
					element, 
					{
						list: this._autocomplete_list,
						dropdown_btn: this._autocomplete_dropdown ? $('#' + this._id + '-dropdown-btn').get(0) : false
					}
				);
				if (this._autocomplete_dropdown){
					$(element).on('awesomplete-selectcomplete', (e) => {
						var text = e.originalEvent.text.value;
						this.$emit('input', text);
					});
				}
			}
			
		}
	}
</script>