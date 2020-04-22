<template>
	<div id="appTpl">
		<Navbar></Navbar>
		
		<div class="container mt-5">
			<slot></slot>
		</div>
	</div>
</template>

<script>

import Navbar from '@/pages/app/components/Navbar'

export default {
	name: 'appTpl',
	components: {
		Navbar
	}
}
</script>

<style>

</style>