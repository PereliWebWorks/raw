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
					groups: [{
						legend: 'Client Info',
						fields: [
							{
								type: "input",
								inputType: "text",
								label: "First",
								required: true
							},
							{
								type: "input",
								inputType: "text",
								label: "Last",
								required: true
							},
						]
					},
					]
				}
			}
		},
		components: {
			"vue-form-generator": VueFormGenerator.component
		}
	}
</script>