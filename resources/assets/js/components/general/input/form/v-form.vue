<template>
<b-form v-on:submit="submit" v-on:reset="reset">
	<template v-if="groups">
		<b-card v-for="(group, groupName) in groups" :key="groupName">
			<b-form-group 
				horizontal
				:label="group.label ? group.label : humanize(groupName)"
				label-size="lg"
				label-class="font-weight-bold"
			>
				<template v-for="(field, fieldName) in group.fields">
					<v-field :name="fieldName" v-model="form[fieldName]" />
				</template>
			</b-form-group>
		</b-card>
	</template>
	<template v-if="fields" v-for="(field, fieldName) in fields">
		<v-field :name="fieldName" v-model="form[fieldName]" />
	</template>
	<b-form-group>
		<b-button type="submit" variant="primary">Submit</b-button>
	</b-form-group>
</b-form> 
</template>

<script>

	import field from './v-field';

	

	export default{
		props: ['groups', 'fields'],
		data: function(){
			return {
				form: {
					'foo': 'bar'
				}
			}
		},
		methods: {
			submit: function(e){
				e.preventDefault();
				console.log(this.form);
			},
			reset: function(){},

		},
		components: {
			'v-field': field
		}
	}
</script>