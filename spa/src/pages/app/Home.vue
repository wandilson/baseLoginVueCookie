<template>
	<appTpl id="home">

		<div class="home col-8 mx-auto py-5 mt-5">
			<h1>Dashboard</h1>
			<div class="card">
			<div class="card-body">
				<h3>Hello: {{ user }}</h3>
			</div>
			</div>
		</div>
	</appTpl>
</template>

<script>

import appTpl from '@/theme/AppTpl'
import User from '@/apis/User';

export default {
	name: 'home',
	data() {
		return {
			user: null
		}
	},	
	components: {
		appTpl
	},
	mounted() {
		User.user().then(response => {
			this.user = response.data;
		})
		.catch(error => {
			console.log(error.response.data.errors);
		});
	}
}
</script>

<style>

</style>