<template>
<b-form v-on:submit="submit" v-on:reset="reset" v-if="show">
	<template v-if="groups">
		<b-card v-for="(group, groupName) in groups" :key="groupName">
			<b-form-group 
				horizontal
				:label="group.label ? group.label : humanize(groupName)"
				label-size="lg"
				label-class="font-weight-bold"
			>
				<template v-for="(field, fieldName) in group.fields">
					<v-field :name="fieldName" :field="field" v-model="form[fieldName]" />
				</template>
			</b-form-group>
		</b-card>
	</template>
	<template v-if="fields" v-for="(field, fieldName) in fields">
		<template v-if="field.multi">
			<transition-group name="fade">
				<v-field
					v-for="n in multiCounters[fieldName]"
					:key="n"
					:name="fieldName"
					:field="field"
					v-model="form[fieldName][n-1]"
					:label="field.label ? field.label + ' ' + n : fieldName + ' ' + n"
				/>
			</transition-group>	
				<b-button variant="primary" @click="multiCounters[fieldName]++">Add {{fieldName}}</b-button>
				<transition-group name="zoom">
					<b-button :key="multiCounters[fieldName] > 1" v-if="multiCounters[fieldName] > 1" variant="secondary" @click="multiCounters[fieldName]--">Remove {{fieldName}}</b-button>
				</transition-group>
		</template>
		<v-field 
			v-else
			:name="fieldName" 
			:field="field" 
			v-model="form[fieldName]" 
		/>
	</template>
	<b-form-group>
		<b-button type="submit" variant="primary">Submit</b-button>
		<b-button type="reset" variant="secondary">Reset</b-button>
	</b-form-group>
</b-form> 
</template>

<script>

	import field from './v-field';



	export default{
		props: {
			groups: {},
			fields: {},
			succeed: {default: false}, //Callbacks for succeeding and failing
			fail: {default: false},
			clearFieldsOnSuccess: {default: true},
			method: {
				default: 'post',
				validator: function(val){
					return ['post', 'get', 'delete', 'put'].indexOf(val) !== -1;
				}
			},
			route: {required: true},
			displayMessageOnSuccess: {default: false},
			displayMessageOnFail: {default: true},
			preFields: {},
			postFields: {}
		},
		data: function(){

			var data = {
				form: this.getInitializedForm(),
				show: true,
				multiCounters: this.getInitializeMultiCounters()
			}
			return data;
		},
		methods: {
			submit: function(e){
				e.preventDefault();
				console.log(this.form);
				axios[this.method](this.route, this.form)
				.then(response => {
					if (this.succeed){
						this.succeed(response);
					}
					if (this.clearFieldsOnSuccess){
						this.reset();
					}
					if (this.displayMessageOnSuccess){
						this.$store.commit('setMessage', {text: 'Item added!', variant: 'success'});
					}
				})
				.catch(error => {
					console.log(error.response);
					if (this.fail){
						this.fail(error.response);
					}
					if (this.displayMessageOnFail){
						var text = error.response.data.message;
						this.$store.commit('setMessage', {text: text, variant: 'danger'});
					}
				});
			},
			reset: function(){
				this.form = this.getInitializedForm();
				this.multiCounters = this.getInitializeMultiCounters();
				this.show = false;
				this.$nextTick(() => { this.show = true });
			},
			getInitializedForm: function(){
				var form = {};
				for (var name in this.fields){
					if (this.fields[name].multi){
						form[name] = [];
					}
				}
				return form;
			},
			getInitializeMultiCounters: function(){
				var counters = {};
				for (var name in this.fields){
					if (this.fields[name].multi){
						counters[name] = 1;
					}
				}
				return counters;
			}
		},
		components: {
			'v-field': field
		}
	}
</script>