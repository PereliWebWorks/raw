


<template>
	<div>
		<h1>These are unauthorized Users</h1>
		<ul>
			<li v-for="(user, index) in unauthorized_user_list" :key="user.id">
				{{user.name}}
				<delete-btn @click.native="deleteUser(user.id, index)" />
				<approve-btn @click.native="approveUser(user.id, index)" />
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		props: ['unauthorized_user_list_init'],
		data: function() {
			return {
				unauthorized_user_list: this.unauthorized_user_list_init
			}
		},
		methods: {
			deleteUser: function(id, index){
				axios.delete(route('users.destroy', id))
				.then(r => {
					this.unauthorized_user_list.splice(index, 1);
				})
				.catch(e => {
					console.log(e);
				})
			},
			approveUser: function(id, index){
				axios.post(route('user_authorizations.store', {user_id: id}))
				.then(r => {
					this.unauthorized_user_list.splice(index, 1);
				})
				.catch(e => {
					console.log(e);
				})
			}
		}
	}
</script>