
<template>
	<b-form @submit="submit">
		<b-form-group
			label="Nickname: "
			label-for="nickname"
		>
			<b-form-input 
				id="nickname"
				type="text"
				v-model="form.nickname"
				required
			/>
		</b-form-group>
		<b-form-group
			v-for="n in addressCount"
			:label="'Address ' + n + ':'"
			:label-for="'address-' + n"
		>
			<b-form-input 
				:id="'address-' + n"
				type="text"
				name="address[]"
				v-model="form.address[n-1]"
				required
			/>
		</b-form-group>
		<b-button-group class="mx-1">
			<b-btn @click="addressCount++">Add Address</b-btn>
			<b-btn @click="addressCount--">Remove Address</b-btn>
		</b-button-group>
		<br/>
		<b-form-group>
			<b-button type="submit" variant="primary">Submit</b-button>
		</b-form-group>
	</b-form>
</template>

<script>
	export default {
		data: function(){
			return {
				form: {
					nickname: '',
					address: []
				},
				addressCount: 1
			}
		},
		methods: {
			submit: function(event){
				event.preventDefault();
			}
		}
	}
</script>