<template><span>
	<h3>Referrant Organizations</h3>
	<b-list-group>
		<b-list-group-item 
			v-for="org in referrant_orgs"
			:key="org.id"
			class="d-flex justify-content-between align-items-center"
		>
			{{humanize(org.name)}}
			<span class="d-flex justify-content-start">
				<edit-btn class="m-2" />
				<delete-btn 
					class="m-2" 
					:resource_id="org.id"
					:resource_type="'referrant organization'"
					:resource_name="org.name"
					:route="get_route('referrant_orgs.destroy', org.id)"
					:succeed="orgRemoved"
				/>
			</span>
		</b-list-group-item>
	</b-list-group>
</span></template>

<script>
	export default{
		props: ['referrant_orgs'],
		props: {
			referrant_orgs: {required: true}
		},
		methods: {
			orgRemoved(id){
				this.$store.commit('deleteData', {type: 'referrant_orgs', id: id});
			}
		}
	}
</script>