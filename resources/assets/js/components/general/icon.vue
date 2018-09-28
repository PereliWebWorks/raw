<template>
	<i :class="'fas fa-' + type"></i>
</template>

<script>
	export default{
		props: {
			type: {required: true}
		}
	}
</script>