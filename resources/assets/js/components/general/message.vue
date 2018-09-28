
<template>
	<b-row class="message-container">
		<b-col>
			<b-alert 
				v-if="message"
				show 
				:variant="variant ? variant : 'info'"
			>
				{{message}}
			</b-alert>
		</b-col>
	</b-row>
</template>

<script>
	export default{
		computed: {
			message () {
				return this.$store.state.message;
			},
			variant() {
				return this.$store.state.variant;
			}
		}
	}
</script>