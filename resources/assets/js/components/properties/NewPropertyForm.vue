<template>
  <div class="panel-body">
    <vue-form-generator :schema="schema"></vue-form-generator>
  </div>
</template>

<script>

	import VueFormGenerator from "vue-form-generator";

	Vue.use(VueFormGenerator);

	export default{
		data: function(){
			return {
				schema: {
					fields: [
						{
							type: "input",
							inputType: "text",
							label: "Nickname",
							required: true
						},
						{
							type: "input",
							inputType: "text",
							label: "Address",
							required: true
						}
					]
				}
			}
		},
		components: {
			"vue-form-generator": VueFormGenerator.component
		}
	}
</script>