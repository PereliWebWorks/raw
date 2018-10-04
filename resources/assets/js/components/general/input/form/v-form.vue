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
		<v-field :name="fieldName" :field="field" v-model="form[fieldName]" />
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
			displayMessageOnFail: {default: true}
		},
		data: function(){
			return {
				form: {},
				show: true
			}
		},
		methods: {
			submit: function(e){
				e.preventDefault();
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
				this.form = {};
				this.show = false;
				this.$nextTick(() => { this.show = true });
			},

		},
		components: {
			'v-field': field
		}
	}
</script>