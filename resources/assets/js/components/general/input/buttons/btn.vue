<template>
	<span v-bind:class="['btn', 'btn-' + type]"><slot>Default</slot></span>
</template>

<script>
	export default {
		props: {
			'type': {
				default: 'dark'
			}
		}
	}
</script>