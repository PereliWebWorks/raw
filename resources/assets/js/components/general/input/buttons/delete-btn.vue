<template>
	<span>
		<b-button :variant="'danger'" @click="click">
			<icon 
				v-if="!showConfirmation"
				:type="'trash-alt'" />
			<span v-else>Delete?</span>
		</b-button>
		
	</span>
</template>

<script>
	export default{
		props: ['route', 'resource_id', 'resource_type', 'resource_name', 'succeed', 'fail'],
		data: function(){
			return {
				showConfirmation: false
			}
		},
		methods: {
			click(){
				if (!this.showConfirmation){
					this.showConfirmation = true;
				}
				else{
					console.log('deleting');
					this.showConfirmation = false;
					axios.delete(this.route)
					.then(response => {
						var message = `
							${this.humanize(this.resource_type)} ${this.humanize(this.resource_name)} deleted
						`;
						this.$store.commit('setMessage', {message: message, variant: 'success'});
						if (this.succeed) this.succeed(this.resource_id);
					})
					.catch(error => {
						console.log(error);
					})
				}
			}
		}
	}
</script>